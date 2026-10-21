<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestimonialsAndBlogTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adminUser = User::factory()->create([
            'name' => 'Dr. Administrator',
            'email' => 'admin@iceeds.com',
            'role' => 'admin',
            'is_approved' => true,
        ]);
    }

    public function test_public_testimonials_page_renders_successfully(): void
    {
        Testimonial::create([
            'name' => 'Fathima Rafeeq',
            'content' => 'The counselling psychology program transformed my clinical approach.',
            'rating' => 5,
            'role_or_course' => 'Diploma in Counselling Psychology',
            'is_approved' => true,
        ]);

        Testimonial::create([
            'name' => 'Pending Reviewer',
            'content' => 'Unapproved review should not appear on public page.',
            'rating' => 3,
            'is_approved' => false,
        ]);

        $response = $this->get(route('testimonials.index'));

        $response->assertStatus(200);
        $response->assertSee('What Our Students &amp; Partners Say', false);
        $response->assertSee('Fathima Rafeeq');
        $response->assertSee('The counselling psychology program transformed my clinical approach.');
        $response->assertDontSee('Pending Reviewer');
    }

    public function test_submission_with_4_or_5_stars_is_auto_approved(): void
    {
        $response = $this->post(route('testimonials.store'), [
            'name' => 'Arun Krishnan',
            'content' => 'Exceptional faculty and standard of evaluation for SEN courses.',
            'rating' => 5,
            'role_or_course' => 'SEN Educator',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('testimonials', [
            'name' => 'Arun Krishnan',
            'rating' => 5,
            'is_approved' => true,
        ]);
    }

    public function test_submission_with_less_than_4_stars_requires_admin_approval(): void
    {
        $response = $this->post(route('testimonials.store'), [
            'name' => 'Kavitha Pillai',
            'content' => 'Course content was good but portal interface could use additional video guides.',
            'rating' => 3,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('testimonials', [
            'name' => 'Kavitha Pillai',
            'rating' => 3,
            'is_approved' => false,
        ]);
    }

    public function test_submission_with_only_name_and_content_defaults_to_5_stars_and_approves(): void
    {
        // "just name and text box are enough"
        $response = $this->post(route('testimonials.store'), [
            'name' => 'Mohammed Sahal',
            'content' => 'Very satisfied with the verified certificate dispatch.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('testimonials', [
            'name' => 'Mohammed Sahal',
            'content' => 'Very satisfied with the verified certificate dispatch.',
            'rating' => 5,
            'is_approved' => true,
        ]);
    }

    public function test_admin_can_view_testimonials_and_toggle_approval(): void
    {
        $unapproved = Testimonial::create([
            'name' => 'Ramesh Babu',
            'content' => 'Need faster response on exam schedules.',
            'rating' => 3,
            'is_approved' => false,
        ]);

        // Unauthenticated access fails
        $this->get(route('admin.testimonials.index'))->assertRedirect(route('login'));

        // Admin access succeeds
        $response = $this->actingAs($this->adminUser)->get(route('admin.testimonials.index'));
        $response->assertStatus(200);
        $response->assertSee('Testimonials Moderation', false);
        $response->assertSee('Ramesh Babu');

        // Toggle approval
        $toggleResponse = $this->actingAs($this->adminUser)
            ->post(route('admin.testimonials.toggle-approval', $unapproved->id));

        $toggleResponse->assertRedirect();
        $this->assertTrue($unapproved->fresh()->is_approved);

        // Delete testimonial
        $delResponse = $this->actingAs($this->adminUser)
            ->delete(route('admin.testimonials.destroy', $unapproved->id));

        $delResponse->assertRedirect();
        $this->assertDatabaseMissing('testimonials', ['id' => $unapproved->id]);
    }

    public function test_public_blog_index_and_show_pages(): void
    {
        $post = BlogPost::create([
            'title' => 'The National Skills Qualifications Framework and iCEEDS',
            'slug' => 'nsqf-and-iceeds',
            'excerpt' => 'An in-depth analysis of skill qualifications in India.',
            'content' => "## Executive Summary\n\nSkill certifications play a pivotal role in today's workforce.\n\n- Point 1\n- Point 2",
            'category' => 'Skill Ecosystem',
            'author_name' => 'Academic Board of Studies',
            'reading_time' => 4,
            'status' => 'published',
            'published_at' => now(),
        ]);

        $draft = BlogPost::create([
            'title' => 'Internal Draft Notes',
            'slug' => 'internal-draft-notes',
            'content' => 'Draft only',
            'status' => 'draft',
        ]);

        // Index page
        $indexResponse = $this->get(route('blog.index'));
        $indexResponse->assertStatus(200);
        $indexResponse->assertSee('The National Skills Qualifications Framework and iCEEDS');
        $indexResponse->assertDontSee('Internal Draft Notes');

        // Show page
        $showResponse = $this->get(route('blog.show', $post->slug));
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Executive Summary');
        $showResponse->assertSee('Skill Ecosystem');
        $showResponse->assertSee('Notice on Certification Authority');

        // Draft page should be 404
        $draftResponse = $this->get(route('blog.show', $draft->slug));
        $draftResponse->assertStatus(404);
    }

    public function test_admin_can_manage_blog_posts(): void
    {
        $this->actingAs($this->adminUser);

        // Admin blog index
        $indexResponse = $this->get(route('admin.blog.index'));
        $indexResponse->assertStatus(200);

        // Create new post
        $storeResponse = $this->post(route('admin.blog.store'), [
            'title' => 'New Vocational Training Framework 2026',
            'excerpt' => 'Summary of new guidelines.',
            'content' => 'Detailed article content regarding vocational training.',
            'category' => 'Policy & Governance',
            'author_name' => 'Prof. K. Narayanan',
            'reading_time' => 6,
            'status' => 'published',
        ]);

        $storeResponse->assertRedirect(route('admin.blog.index'));
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New Vocational Training Framework 2026',
            'slug' => 'new-vocational-training-framework-2026',
            'status' => 'published',
        ]);

        $post = BlogPost::where('slug', 'new-vocational-training-framework-2026')->first();

        // Edit post
        $updateResponse = $this->put(route('admin.blog.update', $post->id), [
            'title' => 'Updated Vocational Training Framework 2026',
            'excerpt' => 'Updated excerpt.',
            'content' => 'Updated content text.',
            'category' => 'Policy & Governance',
            'author_name' => 'Prof. K. Narayanan',
            'reading_time' => 7,
            'status' => 'published',
        ]);

        $updateResponse->assertRedirect(route('admin.blog.index'));
        $this->assertEquals('Updated Vocational Training Framework 2026', $post->fresh()->title);

        // Delete post
        $deleteResponse = $this->delete(route('admin.blog.destroy', $post->id));
        $deleteResponse->assertRedirect(route('admin.blog.index'));
        $this->assertDatabaseMissing('blog_posts', ['id' => $post->id]);
    }

    public function test_home_page_displays_testimonials_and_blog_highlights(): void
    {
        Testimonial::create([
            'name' => 'Deepak Varma',
            'content' => 'Verified diploma recognized by international skill development bodies.',
            'rating' => 5,
            'role_or_course' => 'Corporate Executive',
            'is_approved' => true,
        ]);

        BlogPost::create([
            'title' => 'Emerging Trends in Allied Health Sciences',
            'slug' => 'emerging-trends-allied-health',
            'excerpt' => 'Vocational education in allied healthcare.',
            'content' => 'Healthcare skills need continuous evolution.',
            'category' => 'Allied Health',
            'author_name' => 'Dr. A B Aliyar',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSee('Candidate &amp; Alumni Testimonials', false);
        $response->assertSee('Deepak Varma');
        $response->assertSee('Latest Insights &amp; Publications', false);
        $response->assertSee('Emerging Trends in Allied Health Sciences');
    }
}
