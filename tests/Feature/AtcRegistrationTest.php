<?php

namespace Tests\Feature;

use App\Models\AtcRegistration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AtcRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_atc_registration_page_renders_successfully(): void
    {
        $response = $this->get(route('atc.create'));

        $response->assertStatus(200);
        $response->assertSee('iCEEDS ATC Registration form');
        $response->assertSee('Name of Study Centre (CAPITAL LETTERS)');
        $response->assertSee('Name of Director/Manager');
        $response->assertSee('Contact Number');
        $response->assertSee('Official E-MAIL ID');
        $response->assertSee('Address of Study Centre (including PIN Code)');
        $response->assertSee('Your Course Name & Duration');
        $response->assertSee('Address of Director/Manager (including PIN Code)');
        $response->assertSee('Year of Establishment');
        $response->assertSee('Photograph of Director/Manager');
        $response->assertSee('DECLARATION');
    }

    public function test_atc_form_alias_redirects_to_registration(): void
    {
        $response = $this->get('/atc-form');
        $response->assertRedirect(route('atc.create'));
    }

    public function test_validation_fails_when_required_fields_are_missing(): void
    {
        $response = $this->post(route('atc.store'), []);

        $response->assertSessionHasErrors([
            'centre_name',
            'director_name',
            'contact_number',
            'email',
            'centre_address',
            'course_details',
            'director_address',
            'year_of_establishment',
            'director_photo',
            'declaration',
        ]);
        $this->assertEquals(0, AtcRegistration::count());
    }

    public function test_form_submits_successfully_with_photo_upload(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('director_profile.jpg', 600, 600);

        $response = $this->post(route('atc.store'), [
            'centre_name' => 'national institute of skill development',
            'director_name' => 'Dr. Ramesh Nair',
            'contact_number' => '+91 98470 12345',
            'office_number' => '0484 2345678',
            'email' => 'director@nisd.edu.in',
            'centre_address' => '123 Academic Block, MG Road, Ernakulam, Kerala - 682016',
            'course_details' => 'Diploma in Counselling Psychology (1 Year)',
            'director_address' => 'Rose Villa, Pipeline Road, Kochi, Kerala - 682025',
            'year_of_establishment' => '2019',
            'director_photo' => $file,
            'declaration' => '1',
        ]);

        $response->assertRedirect(route('atc.create'));
        $response->assertSessionHas('submission_success', true);
        $response->assertSessionHas('reference_no');

        $this->assertEquals(1, AtcRegistration::count());

        $record = AtcRegistration::first();
        // Check auto-capitalization of centre name
        $this->assertEquals('NATIONAL INSTITUTE OF SKILL DEVELOPMENT', $record->centre_name);
        $this->assertEquals('Dr. Ramesh Nair', $record->director_name);
        $this->assertEquals('+91 98470 12345', $record->contact_number);
        $this->assertEquals('0484 2345678', $record->office_number);
        $this->assertEquals('director@nisd.edu.in', $record->email);
        $this->assertEquals('pending', $record->status);
        $this->assertTrue($record->declaration_accepted);
        $this->assertStringStartsWith('ATC-', $record->reference_no);

        // Check file stored
        Storage::disk('public')->assertExists($record->director_photo_path);
    }

    public function test_guest_cannot_access_admin_atc_applications(): void
    {
        $response = $this->get(route('admin.atc.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_view_atc_applications_list_and_search(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_approved' => true,
        ]);

        $atc = AtcRegistration::create([
            'reference_no' => 'ATC-2026-TEST01',
            'centre_name' => 'CREATIVE ACADEMY',
            'director_name' => 'Prof. Anitha Menon',
            'contact_number' => '+91 99955 11223',
            'email' => 'anitha@creativeacademy.org',
            'centre_address' => 'Palakkad, Kerala - 678001',
            'course_details' => 'Special Education Needs (SEN) - 1 Year',
            'director_address' => 'Palakkad, Kerala',
            'year_of_establishment' => '2015',
            'director_photo_path' => 'atc_documents/test.jpg',
            'declaration_accepted' => true,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->get(route('admin.atc.index'));
        $response->assertStatus(200);
        $response->assertSee('ATC Registrations');
        $response->assertSee('CREATIVE ACADEMY');
        $response->assertSee('ATC-2026-TEST01');
        $response->assertSee('Prof. Anitha Menon');

        // Test search query
        $searchResponse = $this->actingAs($admin)->get(route('admin.atc.index', ['q' => 'CREATIVE']));
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee('ATC-2026-TEST01');
    }

    public function test_admin_can_view_single_atc_application(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_approved' => true,
        ]);

        $atc = AtcRegistration::create([
            'reference_no' => 'ATC-2026-TEST02',
            'centre_name' => 'GLOBAL LEARNING HUB',
            'director_name' => 'John Mathew',
            'contact_number' => '9847123456',
            'email' => 'john@globalhub.com',
            'centre_address' => 'Kottayam, Kerala - 686001',
            'course_details' => 'Diploma in Child Guidance',
            'director_address' => 'Kottayam, Kerala',
            'year_of_establishment' => '2020',
            'director_photo_path' => 'atc_documents/sample.jpg',
            'declaration_accepted' => true,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->get(route('admin.atc.show', $atc));
        $response->assertStatus(200);
        $response->assertSee('GLOBAL LEARNING HUB');
        $response->assertSee('John Mathew');
        $response->assertSee('ATC-2026-TEST02');
    }

    public function test_admin_can_update_status_and_admin_notes(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_approved' => true,
        ]);

        $atc = AtcRegistration::create([
            'reference_no' => 'ATC-2026-TEST03',
            'centre_name' => 'EXCELLENCE CAMPUS',
            'director_name' => 'Deepa Varma',
            'contact_number' => '9847000000',
            'email' => 'deepa@excellence.edu',
            'centre_address' => 'Calicut, Kerala - 673001',
            'course_details' => 'Diploma in Psychology',
            'director_address' => 'Calicut, Kerala',
            'year_of_establishment' => '2017',
            'director_photo_path' => 'atc_documents/test.jpg',
            'declaration_accepted' => true,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->put(route('admin.atc.update', $atc), [
            'status' => 'approved',
            'admin_notes' => 'Centre inspection completed successfully. MoU issued on 21 Oct 2026.',
        ]);

        $response->assertRedirect(route('admin.atc.show', $atc));
        $atc->refresh();
        $this->assertEquals('approved', $atc->status);
        $this->assertStringContainsString('inspection completed', $atc->admin_notes);
    }

    public function test_admin_can_export_csv(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'is_approved' => true,
        ]);

        AtcRegistration::create([
            'reference_no' => 'ATC-2026-TEST04',
            'centre_name' => 'METRO ACADEMY',
            'director_name' => 'Alex Thomas',
            'contact_number' => '9847999999',
            'email' => 'alex@metro.org',
            'centre_address' => 'Trivandrum, Kerala',
            'course_details' => 'Counselling Diploma',
            'director_address' => 'Trivandrum, Kerala',
            'year_of_establishment' => '2016',
            'director_photo_path' => 'atc_documents/test.jpg',
            'declaration_accepted' => true,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->get(route('admin.atc.export'));
        $response->assertStatus(200);
        $this->assertEquals('text/csv; charset=UTF-8', $response->headers->get('content-type'));
    }

    public function test_admin_can_delete_atc_application(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create([
            'role' => 'admin',
            'is_approved' => true,
        ]);

        $file = UploadedFile::fake()->image('director.jpg');
        $stored = $file->storeAs('atc_documents', 'director_del.jpg', 'public');

        $atc = AtcRegistration::create([
            'reference_no' => 'ATC-2026-DEL01',
            'centre_name' => 'DELETED CENTRE',
            'director_name' => 'Test Director',
            'contact_number' => '9847000111',
            'email' => 'del@centre.com',
            'centre_address' => 'Test Address',
            'course_details' => 'Course 1',
            'director_address' => 'Director Address',
            'year_of_establishment' => '2021',
            'director_photo_path' => $stored,
            'declaration_accepted' => true,
            'status' => 'pending',
        ]);

        Storage::disk('public')->assertExists($stored);

        $response = $this->actingAs($admin)->delete(route('admin.atc.destroy', $atc));
        $response->assertRedirect(route('admin.atc.index'));

        $this->assertDatabaseMissing('atc_registrations', ['id' => $atc->id]);
        Storage::disk('public')->assertMissing($stored);
    }
}
