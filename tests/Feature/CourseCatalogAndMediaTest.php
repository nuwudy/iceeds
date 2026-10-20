<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseCatalogAndMediaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_courses_page_with_pdf_catalog_data(): void
    {
        $response = $this->get('/courses');
        $response->assertStatus(200);
        $response->assertSee('ICEEDS Skill & Vocational Course Catalog', false);
        $response->assertSee('Master Qualification Pack & Academic Program Directory', false);
        $response->assertSee('8 Target Sectors');
        $response->assertSee('230+ Certified Roles');
        $response->assertSee('NSQF Level 2 to 6');
        $response->assertSee('B.Voc & M.Voc');
        $response->assertSee('Download Complete Course List (PDF)');
        $response->assertSee('Apparel, Made-Ups & Home Furnishings Sector');
        $response->assertSee('AMH/Q0101');
        $response->assertSee('Beauty & Wellness Sector');
        $response->assertSee('BWS/Q0101');
        $response->assertSee('Food Processing Sector');
        $response->assertSee('Electronics System Design & Manufacturing');
        $response->assertSee('Information Technology & IT-Enabled Services');
        $response->assertSee('Healthcare & Allied Medical Sciences');
        $response->assertSee('Management, Security, Training & Professional Services');
        $response->assertSee('Vocational Degree Programs (B.Voc & M.Voc Trades)', false);
        $response->assertSee('₹25,000');
        $response->assertSee('₹27,500');
        $response->assertDontSee('Autonomous Statutory Body');
    }

    public function test_can_download_catalog_pdf(): void
    {
        $response = $this->get('/courses/download-catalog-pdf');
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
        $response->assertSee('Follow on Instagram');
        $response->assertSee('View on Facebook');
        $response->assertSee('YouTube Videos (16:9)');
        $response->assertSee('Instagram Reels (9:16)');
        $response->assertSee('Facebook Highlights');
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

    public function test_police_verification_modal_and_document_accessible(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('policeDocModal');
        $response->assertDontSee('Download PDF');
        $response->assertDontSee('Download Official PDF');
        $response->assertSee('openPoliceDocModal');
        $response->assertSee('Certified English Translation');
        $response->assertSee('Subhash Babu K.C.');

        $this->assertFileExists(public_path('storage/media/2026/10/police-report-i-ceeds-1-oeew2l.pdf'));
        $this->assertFileExists(public_path('storage/media/2026/10/kerala-police-document-yhgf2l.pdf'));
        $this->assertFileExists(public_path('images/verification/kerala-police-original.jpg'));

        $pdfResponse = $this->get('/storage/media/2026/10/police-report-i-ceeds-1-oeew2l.pdf');
        $pdfResponse->assertStatus(200);
    }
}
