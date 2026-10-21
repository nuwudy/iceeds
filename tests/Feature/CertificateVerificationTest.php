<?php

namespace Tests\Feature;

use App\Models\Certificate;
use App\Models\ContactInquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CertificateVerificationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed a sample certificate matching the user's required test case
        Certificate::create([
            'id' => 1017,
            'student_name' => 'NISHAJ N',
            'first_name' => 'NISHAJ',
            'last_name' => 'N',
            'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
            'issue_date' => '2024-08-07',
            'certificate_code' => 'EDP/TVM24/DCP/065',
        ]);
    }

    public function test_can_render_home_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Elevate Your Skills with');
        $response->assertSee('Accredited Certifications');
        $response->assertSee('Indian Trusts Act, 1882');
        $response->assertSee('Academic Board of Studies');
        $response->assertSee('Dr. A B ALIYAR');
        $response->assertSee('Dr. P. ARUNACHALAM');
    }

    public function test_can_render_about_page(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('About iCEEDS');
        $response->assertSee('Indian Trusts Act, 1882');
        $response->assertSee('Academic Board of Studies');
        $response->assertSee('National Skill Development Corporation');
        $response->assertSee('Malappuram');
        $response->assertSee('Chennai');
    }

    public function test_can_render_services_page(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Our Services & Programs', false);
        $response->assertSee('Vocational &amp; Professional Courses', false);
        $response->assertSee('Accredited Certifications');
        $response->assertSee('Academic Board of Studies');
        $response->assertSee('Customized Corporate Training');
    }

    public function test_can_render_contact_page(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Get in Touch with iCEEDS');
        $response->assertSee('Corporate Office');
        $response->assertSee('Central Administrative Office');
        $response->assertSee('Plot No:90, 3rd Cross Street');
        $response->assertSee('Malappuram');
        $response->assertSee('lettertoiceeds@gmail.com');
    }

    public function test_can_submit_contact_form(): void
    {
        $payload = [
            'name' => 'Dr. Jane Doe',
            'email' => 'jane.doe@example.com',
            'phone' => '+91 98765 43210',
            'subject' => 'Institutional Affiliation',
            'message' => 'We are interested in affiliating our institution to offer accredited iCEEDS counselling psychology diplomas.',
        ];

        $response = $this->post('/contact', $payload);
        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_inquiries', [
            'name' => 'Dr. Jane Doe',
            'email' => 'jane.doe@example.com',
            'subject' => 'Institutional Affiliation',
        ]);
    }

    public function test_can_verify_known_certificate_via_query_param_on_home(): void
    {
        $response = $this->get('/?code=EDP/TVM24/DCP/065');
        $response->assertStatus(200);
        $response->assertSee('NISHAJ N');
        $response->assertSee('EDP/TVM24/DCP/065');
        $response->assertSee('iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY');
        $response->assertSee('Official Digital Credential Verified');
    }

    public function test_can_verify_known_certificate_via_dedicated_verify_page(): void
    {
        $response = $this->get('/verify?code=edp/tvm24/dcp/065');
        $response->assertStatus(200);
        $response->assertSee('NISHAJ N');
        $response->assertSee('EDP/TVM24/DCP/065');
        $response->assertSee('Official Digital Credential Verified');
    }

    public function test_can_verify_demo_sample_record_without_using_real_student_data(): void
    {
        $response = $this->get('/verify?code=ICEEDS/SAMPLE/2026/01');
        $response->assertStatus(200);
        $response->assertSee('JOHN DOE (SAMPLE RECORD)');
        $response->assertSee('ICEEDS/SAMPLE/2026/01');
        $response->assertSee('Official Digital Credential Verified');
    }

    public function test_shows_not_found_for_invalid_certificate_code(): void
    {
        $response = $this->get('/verify?code=INVALID/999/CODE');
        $response->assertStatus(200);
        $response->assertSee('Record Not Found');
        $response->assertSee('INVALID/999/CODE');
    }

    public function test_post_verify_form_redirects_to_clean_url(): void
    {
        $response = $this->post('/verify', [
            'code' => 'EDP/TVM24/DCP/065',
        ]);
        $response->assertRedirect('/verify?code=EDP%2FTVM24%2FDCP%2F065');
    }

    public function test_api_v1_verify_endpoint_returns_json_for_valid_certificate(): void
    {
        $response = $this->getJson('/api/v1/verify/EDP/TVM24/DCP/065');
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'verified' => true,
            'data' => [
                'certificate_code' => 'EDP/TVM24/DCP/065',
                'student_name' => 'NISHAJ N',
                'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
                'issue_date' => '2024-08-07',
            ],
        ]);

        $json = $response->json();
        $this->assertNotEmpty($json['data']['authenticity_hash']);
        $this->assertStringContainsString('iCEEDS', $json['data']['issuing_authority']);
    }

    public function test_api_v1_verify_endpoint_returns_404_for_invalid_certificate(): void
    {
        $response = $this->getJson('/api/v1/verify/NONEXISTENT/001');
        $response->assertStatus(404);
        $response->assertJson([
            'status' => 'error',
            'verified' => false,
        ]);
    }

    public function test_artisan_import_command_imports_all_records_with_zero_data_loss(): void
    {
        $this->artisan('app:import-certificates', ['--fresh' => true])
            ->assertSuccessful();

        $count = Certificate::count();
        $this->assertEquals(2875, $count, 'All 2,875 records must be preserved with zero data loss.');

        // Test sample from import
        $sample = Certificate::where('certificate_code', 'EDP/TVM24/DCP/065')->first();
        $this->assertNotNull($sample);
        $this->assertEquals('NISHAJ N', $sample->student_name);
        $this->assertEquals('iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY', $sample->course);
    }
}
