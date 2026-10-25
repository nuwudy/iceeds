<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseCatalogAndMediaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_courses_page_with_knowledge_partner_and_nsqf_catalog_data(): void
    {
        $response = $this->get('/courses');
        $response->assertStatus(200);

        // Header and branding
        $response->assertSee('ICEEDS Skill &amp; Vocational Course Catalog', false);
        $response->assertSee('Knowledge Partner Program', false);
        $response->assertSee('Unified Fee Schedule', false);
        $response->assertSee('Download Complete Unified Fee Schedule &amp; Syllabus (PDF)', false);

        // Category A: Govt. of India (NSDC) & Healthcare
        $response->assertSee('Govt. of India (NSDC) Certified Mind Training &amp; Counselling', false);
        $response->assertSee('Govt. of India (NSDC) Certified Spa Therapist', false);
        $response->assertSee('₹12,500');
        $response->assertSee('₹18,000');
        $response->assertSee('₹25,000');
        $response->assertSee('₹2,500 + Equal Instalments');

        // Category B: Teacher Training & Diplomas
        $response->assertSee('iCEEDS Diploma in Montessori TTC (MTTC)', false);
        $response->assertSee('iCEEDS AI Integrated Professional Diploma in MTTC', false);
        $response->assertSee('FICS International Diploma in Montessori TTC', false);
        $response->assertSee('₹35,000');
        $response->assertSee('₹40,000');

        // Category C: Psychology & Administration
        $response->assertSee('iCEEDS Diploma in Counselling Psychology', false);
        $response->assertSee('iCEEDS Diploma in Hospital Administration', false);
        $response->assertSee('₹8,500');

        // Category D: Short-Term Micro-Certifications
        $response->assertSee('PeacePulse - Stress Management', false);
        $response->assertSee('CharacterMap - Personality Trait Assessment', false);
        $response->assertSee('AngleMetrics - ATD Angle Assessment', false);
        $response->assertSee('₹1,200');

        // Category E: Distance Degree & Secondary Board Support
        $response->assertSee('BA English / B.Com (IGNOU)', false);
        $response->assertSee('BA Sociology / BA Arabic (SGOU)', false);
        $response->assertSee('NIOS 10th SSLC &amp; Plus Two (All Streams)', false);
        $response->assertSee('₹20,000 / Year');

        // NSQF Sectors & B.Voc
        $response->assertSee('NSQF Levels 2 to 6 Sector Qualification Packs', false);
        $response->assertSee('Vocational Degree Programs (B.Voc &amp; M.Voc Trades)', false);
        $response->assertSee('AMH/Q0101');

        // Compliance
        $response->assertDontSee('Autonomous Statutory Body');
        $response->assertSee('Indian Trusts Act, 1882');
    }

    public function test_courses_and_verification_pages_display_international_attestation_advisory(): void
    {
        $urls = ['/courses', '/verify'];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);

            // Title and core advisory copy
            $response->assertSee('International Recognition &amp; Embassy Attestation Advisory', false);
            $response->assertSee('General Feasibility');
            $response->assertSee('Student Due Diligence');
            $response->assertSee('Non-Guarantee Clause');
            $response->assertSee('AEDA0906222411677014E50');

            // Document A & Document B showcases
            $response->assertSee('Indian MEA &amp; SDM Delhi Authentication', false);
            $response->assertSee('UAE Embassy &amp; MOFA Digital Certificate', false);
            $response->assertSee('View Sample UAE Embassy Attestation (Back Page Preview)', false);
            $response->assertSee('attestationProofModal');
        }
    }

    public function test_can_download_unified_fee_schedule_pdf(): void
    {
        $response = $this->get('/courses/download-catalog-pdf');
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');

        $unifiedResponse = $this->get('/courses/download-unified-fee-schedule');
        $unifiedResponse->assertStatus(200);
        $unifiedResponse->assertHeader('content-type', 'application/pdf');
    }

    public function test_can_download_attestation_sample_pdf(): void
    {
        $response = $this->get('/attestation/download-sample-pdf');
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }

    public function test_can_download_syllabus_pdf(): void
    {
        $response = $this->get('/courses/diploma-in-counselling-psychology/download-syllabus');
        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }

    public function test_can_render_gallery_page(): void
    {
        $response = $this->get('/gallery');
        $response->assertStatus(200);
        $response->assertSee('Media & Social Gallery');
        $response->assertSee('Watch on YouTube');
        $response->assertSee('Official Videos (5)');
        $response->assertSee('View on Facebook');

        // Check Top Spotlight Video & Welcome Video Card
        $response->assertSee('What is iCEEDS?');
        $response->assertSee('video-project-27-zlvj2o.mp4');
        $response->assertSee('Welcome to iCEEDS: Skill for Growth, Future &amp; Life', false);
        $response->assertSee('welcome-to-iceeds-overview.webp');

        // Check 3 YouTube Videos
        $response->assertSee('utoVx8uhc00');
        $response->assertSee('Q6evOepcB2Q');
        $response->assertSee('K6rGVKLz3DI');
        $response->assertSee('iCEEDS APP LAUNCH 2026');
        $response->assertSee('Winners TTC Academy');
        $response->assertSee('Online Certificate Verification');

        // Check Official MP4 Video Card
        $response->assertSee('whatsapp-video-2026-10-25-at-85959-am-3dqsdf.mp4');
        $response->assertSee('iCEEDS &amp; IZZA Academy Certificate Conferment &amp; Student Felicitation', false);
        $response->assertDontSee('Hands-on Montessori Sensorial Apparatus in Action');

        // Check 4 Photographs
        $response->assertSee('Photographs &amp; Events (4)', false);
        $response->assertSee('dr-arunachalam-dr-aliyar-academic-delegation.webp');
        $response->assertSee('academic-board-of-studies-meeting.webp');
        $response->assertSee('nsdc-skill-india-certificate-specimen.webp');
        $response->assertSee('student-graduation-diploma-presentation.webp');
        $response->assertDontSee('convocation-counselling-psychology-ceremony.jpg');
        $response->assertDontSee('convocation-counselling-psychology-ceremony.webp');

        // Check Lightbox Modal presence
        $response->assertSee('photoLightboxModal');
        $response->assertSee('View Fullscreen');

        $response->assertDontSee('Autonomous Statutory Body');
    }

    public function test_site_wide_rebranding_compliance(): void
    {
        $urls = ['/', '/about', '/services', '/verify', '/courses', '/gallery'];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
            $response->assertDontSee('Autonomous Statutory Body');
            $response->assertSee('Indian Trusts Act, 1882');
        }
    }

    public function test_home_page_displays_institutional_documentary_video(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Check What is iCEEDS Spotlight Section below Hero
        $response->assertSee('What is iCEEDS?');
        $response->assertSee('video-project-27-zlvj2o.mp4');
        $response->assertSee('Skill for Growth. Skill for Future. Skill for Life.');
        $response->assertSee('homeSpotlightVideoPlayer');
        $response->assertSee('homeSpotlightPoster');
        $response->assertSee('playHomeSpotlightVideo');

        // Check Institutional Documentary Section
        $response->assertSee('video-project-26-1-euyqjz.mp4');
        $response->assertSee('Empowering India Through Accredited Skills &amp; Education', false);
        $response->assertSee('Institutional Documentary');
        $response->assertSee('homeDocVideo');
        $response->assertSee('homeDocPoster');
        $response->assertSee('playHomeDocVideo');
    }
}
