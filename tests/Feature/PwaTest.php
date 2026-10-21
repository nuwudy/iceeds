<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PwaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the manifest.json file exists and has valid PWA configurations.
     */
    public function test_manifest_file_is_valid_json_and_configured(): void
    {
        $manifestPath = public_path('manifest.json');
        $this->assertFileExists($manifestPath);

        $content = file_get_contents($manifestPath);
        $json = json_decode($content, true);

        $this->assertIsArray($json);
        $this->assertEquals('iCEEDS - Innovation Council for Exquisite Education & Development of Skills', $json['name']);
        $this->assertEquals('iCEEDS', $json['short_name']);
        $this->assertEquals('standalone', $json['display']);
        $this->assertEquals('#0197b2', $json['theme_color']);
        $this->assertNotEmpty($json['icons']);
    }

    /**
     * Test that the service worker file exists and contains essential lifecycle handlers.
     */
    public function test_service_worker_file_exists(): void
    {
        $swPath = public_path('sw.js');
        $this->assertFileExists($swPath);

        $content = file_get_contents($swPath);
        $this->assertStringContainsString("self.addEventListener('install'", $content);
        $this->assertStringContainsString("self.addEventListener('fetch'", $content);
        $this->assertStringContainsString("self.addEventListener('activate'", $content);
    }

    /**
     * Test that the homepage HTML includes the PWA manifest link and install button.
     */
    public function test_homepage_includes_pwa_elements(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('manifest.json', false);
        $response->assertSee('Install iCEEDS', false);
        $response->assertDontSee('pwaInstallBtnHeader', false);
        $response->assertSee('pwaInstallBtnMobile', false);
        $response->assertSee('pwaInstallFloatingBar', false);
        $response->assertSee('installIceedsPWA', false);
        $response->assertSee('beforeinstallprompt', false);
        $response->assertSee('appinstalled', false);
        $response->assertSee('storage/media/2026/10/iceeds-pwa-igaapf.webp', false);
        $response->assertSee('https://play.google.com/store/apps/details?id=com.nrichlearning.iceeds', false);
    }
}
