<?php

namespace Tests\Feature;

use App\Models\MediaFile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaLibraryTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('public');

        $this->admin = User::create([
            'name' => 'Dr. V. B. M. Riyas',
            'email' => 'drvbmriyas@gmail.com',
            'password' => Hash::make('riyas.chairman@123'),
        ]);
    }

    public function test_admin_login_screen_renders(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('Media Library & Administration', false);
        $response->assertSee('Sign In to Dashboard');
        $response->assertSee('drvbmriyas@gmail.com');
    }

    public function test_admin_can_authenticate_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'drvbmriyas@gmail.com',
            'password' => 'riyas.chairman@123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($this->admin);
    }

    public function test_admin_cannot_authenticate_with_invalid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'drvbmriyas@gmail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_unauthenticated_user_cannot_access_media_library(): void
    {
        $response = $this->get('/admin/media');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_access_media_library(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/media');
        $response->assertStatus(200);
        $response->assertSee('Media Manager');
        $response->assertSee('Upload New Media');
    }

    public function test_admin_can_upload_image(): void
    {
        $file = UploadedFile::fake()->create('campus_banner.jpg', 500, 'image/jpeg');

        $response = $this->actingAs($this->admin)->post('/admin/media/upload', [
            'file' => $file,
            'title' => 'Main Campus Banner',
            'alt_text' => 'iCEEDS Main Campus',
        ]);

        $response->assertRedirect(route('admin.media'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('media_files', [
            'title' => 'Main Campus Banner',
            'file_name' => 'campus_banner.jpg',
            'file_type' => 'image',
        ]);

        $media = MediaFile::where('file_name', 'campus_banner.jpg')->first();
        $this->assertNotNull($media);
        Storage::disk('public')->assertExists($media->file_path);
    }

    public function test_admin_can_upload_pdf(): void
    {
        $file = UploadedFile::fake()->create('course_syllabus.pdf', 500, 'application/pdf');

        $response = $this->actingAs($this->admin)->post('/admin/media/upload', [
            'file' => $file,
            'title' => 'Diploma in Counselling Psychology Syllabus',
        ]);

        $response->assertRedirect(route('admin.media'));
        $this->assertDatabaseHas('media_files', [
            'file_name' => 'course_syllabus.pdf',
            'file_type' => 'pdf',
        ]);

        $media = MediaFile::where('file_name', 'course_syllabus.pdf')->first();
        Storage::disk('public')->assertExists($media->file_path);
    }

    public function test_admin_can_upload_audio_and_video(): void
    {
        $audio = UploadedFile::fake()->create('welcome_podcast.mp3', 1000, 'audio/mpeg');
        $video = UploadedFile::fake()->create('convocation_highlight.mp4', 3000, 'video/mp4');

        $response = $this->actingAs($this->admin)->post('/admin/media/upload', [
            'files' => [$audio, $video],
        ]);

        $response->assertRedirect(route('admin.media'));
        $this->assertDatabaseHas('media_files', [
            'file_name' => 'welcome_podcast.mp3',
            'file_type' => 'audio',
        ]);
        $this->assertDatabaseHas('media_files', [
            'file_name' => 'convocation_highlight.mp4',
            'file_type' => 'video',
        ]);
    }

    public function test_admin_can_delete_media(): void
    {
        $file = UploadedFile::fake()->create('temporary_photo.png', 200, 'image/png');
        $path = $file->store('media', 'public');

        $media = MediaFile::create([
            'title' => 'Temporary Photo',
            'file_name' => 'temporary_photo.png',
            'file_path' => $path,
            'file_type' => 'image',
            'mime_type' => 'image/png',
            'file_size' => 1024,
            'extension' => 'png',
        ]);

        Storage::disk('public')->assertExists($path);

        $response = $this->actingAs($this->admin)->delete(route('admin.media.destroy', $media));
        $response->assertRedirect(route('admin.media'));

        $this->assertDatabaseMissing('media_files', ['id' => $media->id]);
        Storage::disk('public')->assertMissing($path);
    }
}
