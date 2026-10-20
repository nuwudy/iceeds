<?php

namespace Tests\Feature;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_unauthenticated_user_cannot_access_dashboard()
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_unapproved_user_cannot_login()
    {
        $unapproved = User::factory()->create([
            'email' => 'pending@iceeds.com',
            'password' => bcrypt('secret123'),
            'role' => 'staff',
            'is_approved' => false,
        ]);

        $response = $this->post(route('admin.login.submit'), [
            'email' => 'pending@iceeds.com',
            'password' => 'secret123',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_approved_admin_can_access_dashboard_and_sections()
    {
        $admin = User::factory()->create([
            'email' => 'admin@iceeds.com',
            'role' => 'admin',
            'is_approved' => true,
        ]);

        // Seed sample records to ensure full blade loops render with real data
        Certificate::create([
            'student_name' => 'SAMPLE STUDENT',
            'certificate_code' => 'TEST-001',
            'course' => 'TEST COURSE',
            'issue_date' => '2026-10-18',
        ]);
        \App\Models\MediaFile::create([
            'title' => 'Test Image',
            'file_name' => 'test.jpg',
            'file_path' => 'media/test.jpg',
            'disk' => 'public',
            'file_type' => 'image',
            'mime_type' => 'image/jpeg',
            'file_size' => 1024,
            'extension' => 'jpg',
        ]);
        \App\Models\ContactInquiry::create([
            'name' => 'Jane Inquirer',
            'email' => 'jane@example.com',
            'subject' => 'Course Information',
            'message' => 'Please provide syllabus details.',
        ]);

        $this->actingAs($admin);

        $response = $this->get(route('admin.dashboard'));
        $response->assertOk();
        $response->assertSee('Admin Portal');
        $response->assertSee('Total Certificates');
        $response->assertSee('SAMPLE STUDENT');
        $response->assertSee('Test Image');
        $response->assertSee('Jane Inquirer');

        $response = $this->get(route('admin.certificates.index'));
        $response->assertOk();
        $response->assertSee('Certificate Registry');

        $response = $this->get(route('admin.users.index'));
        $response->assertOk();
        $response->assertSee('User & Staff Management');
    }

    public function test_staff_user_cannot_access_user_management()
    {
        $staff = User::factory()->create([
            'email' => 'staff@iceeds.com',
            'role' => 'staff',
            'is_approved' => true,
        ]);

        $this->actingAs($staff);

        $response = $this->get(route('admin.users.index'));
        $response->assertForbidden();
    }

    public function test_approved_user_can_create_and_manage_certificates()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_approved' => true,
        ]);

        $this->actingAs($admin);

        // Store a new certificate
        $certData = [
            'certificate_code' => 'ICEEDS-2026-9999',
            'student_name' => 'Johnathan Doe',
            'course' => 'Advanced Diploma in Artificial Intelligence',
            'issue_date' => '2026-10-18',
        ];

        $response = $this->post(route('admin.certificates.store'), $certData);
        $response->assertRedirect(route('admin.certificates.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('certificates', [
            'certificate_code' => 'ICEEDS-2026-9999',
            'student_name' => 'JOHNATHAN DOE',
            'course' => 'ADVANCED DIPLOMA IN ARTIFICIAL INTELLIGENCE',
        ]);

        // Verify that public verification page can query this certificate
        $verifyResponse = $this->get('/verify?code=ICEEDS-2026-9999');
        $verifyResponse->assertOk();
        $verifyResponse->assertSee('JOHNATHAN DOE');
        $verifyResponse->assertSee('ICEEDS-2026-9999');

        // Verify API endpoint works too
        $apiResponse = $this->getJson('/api/v1/verify/ICEEDS-2026-9999');
        $apiResponse->assertOk();
        $apiResponse->assertJson([
            'verified' => true,
            'data' => [
                'certificate_code' => 'ICEEDS-2026-9999',
                'student_name' => 'JOHNATHAN DOE',
            ],
        ]);
    }

    public function test_admin_can_add_user_and_toggle_approval()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_approved' => true,
        ]);

        $this->actingAs($admin);

        // 1. Add staff user
        $response = $this->post(route('admin.users.store'), [
            'name' => 'Cert Verifier Staff',
            'email' => 'verifier@iceeds.com',
            'password' => 'StaffPass123!',
            'password_confirmation' => 'StaffPass123!',
            'role' => 'staff',
            'is_approved' => '1',
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $response->assertSessionHas('success');

        $newUser = User::where('email', 'verifier@iceeds.com')->first();
        $this->assertNotNull($newUser);
        $this->assertEquals('staff', $newUser->role);
        $this->assertTrue((bool)$newUser->is_approved);

        // 2. Toggle approval (suspend)
        $toggleResponse = $this->post(route('admin.users.toggle-approval', $newUser));
        $toggleResponse->assertRedirect();
        $this->assertFalse((bool)$newUser->fresh()->is_approved);

        // 3. Toggle back (approve)
        $toggleResponse2 = $this->post(route('admin.users.toggle-approval', $newUser));
        $toggleResponse2->assertRedirect();
        $this->assertTrue((bool)$newUser->fresh()->is_approved);
    }

    public function test_admin_can_view_and_manage_contact_inquiries()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_approved' => true,
        ]);

        $inquiry = \App\Models\ContactInquiry::create([
            'name' => 'Dr. Robert Specialist',
            'email' => 'robert@specialist.org',
            'phone' => '+91 99999 88888',
            'subject' => 'Certification Inquiries',
            'message' => 'We would like to verify qualifications for our clinical team.',
        ]);

        $this->actingAs($admin);

        // 1. Can view inquiries index
        $response = $this->get(route('admin.inquiries.index'));
        $response->assertOk();
        $response->assertSee('Public Inquiries & Messages', false);
        $response->assertSee('Dr. Robert Specialist');
        $response->assertSee('Certification Inquiries');

        // 2. Can view single inquiry details
        $response = $this->get(route('admin.inquiries.show', $inquiry));
        $response->assertOk();
        $response->assertSee('Dr. Robert Specialist');
        $response->assertSee('We would like to verify qualifications for our clinical team.');
        $response->assertSee('Reply by Email');

        // 3. Can delete an inquiry
        $deleteResponse = $this->delete(route('admin.inquiries.destroy', $inquiry));
        $deleteResponse->assertRedirect(route('admin.inquiries.index'));
        $this->assertDatabaseMissing('contact_inquiries', [
            'id' => $inquiry->id,
        ]);
    }
}
