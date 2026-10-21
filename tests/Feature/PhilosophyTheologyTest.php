<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhilosophyTheologyTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_philosophy_theology_hub_page(): void
    {
        $response = $this->get('/departments/philosophy-theology');
        $response->assertStatus(200);
        $response->assertSee('Department of', false);
        $response->assertSee('Philosophy &amp; Theology', false);
        $response->assertSee('Department of Philosophy');
        $response->assertSee('Department of Theology');
        $response->assertSee('Psychology');
        $response->assertSee('Sociology');
        $response->assertSee('Chamber of Islamic Studies');
        $response->assertSee('Chamber of Christian Studies');
        $response->assertSee('Chamber of Hindutva Studies');
    }

    public function test_can_render_department_of_philosophy_page(): void
    {
        $response = $this->get('/departments/philosophy');
        $response->assertStatus(200);
        $response->assertSee('Department of');
        $response->assertSee('Philosophy');
        $response->assertSee('Division of Psychology');
        $response->assertSee('Division of Sociology');
        $response->assertSee('Cognitive Science');
        $response->assertSee('Counselling Psychology');
        $response->assertSee('Applied Community Sociology');
    }

    public function test_can_render_department_of_theology_page_with_all_chambers(): void
    {
        $response = $this->get('/departments/theology');
        $response->assertStatus(200);
        $response->assertSee('Department of');
        $response->assertSee('Theology');
        $response->assertSee('Chamber of Islamic Studies');
        $response->assertSee('Chamber of Christian Studies');
        $response->assertSee('Chamber of Hindutva Studies');
        $response->assertSee('Usul al-Fiqh');
        $response->assertSee('Biblical Hermeneutics');
        $response->assertSee('Six Classical Darshanas');
        $response->assertSee('All Chambers Directory');
        $response->assertSee('Board of Studies &bull; Chamber of Hindutva Studies', false);
        $response->assertSee('Board of Studies &bull; Chamber of Islamic Studies', false);
        $response->assertSee('Board of Studies &bull; Chamber of Christian Studies', false);
        $response->assertSee('Dr. Raghavan Namboodiri');
        $response->assertSee('Prof. (Dr.) Aslam Farooqi');
        $response->assertSee('Rev. Dr. Samuel K. Thomas');
        $response->assertSee('Chairperson, Board of Studies');
        $response->assertSee('Member, Board of Studies');
    }

    public function test_aliases_load_appropriately(): void
    {
        $this->get('/departments/philosophy/psychology')->assertStatus(200)->assertSee('Psychology');
        $this->get('/departments/philosophy/sociology')->assertStatus(200)->assertSee('Sociology');
        $this->get('/departments/theology/islamic-studies')->assertStatus(200)->assertSee('Islamic Studies');
        $this->get('/departments/theology/christian-studies')->assertStatus(200)->assertSee('Christian Studies');
        $this->get('/departments/theology/hindutva-studies')->assertStatus(200)->assertSee('Hindutva Studies');
    }

    public function test_header_contains_philosophy_theology_dropdown(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Philosophy &amp; Theology', false);
        $response->assertSee('Dept. of Philosophy', false);
        $response->assertSee('Dept. of Theology', false);
        $response->assertSee('Chamber of Islamic Studies', false);
        $response->assertSee('Chamber of Christian Studies', false);
        $response->assertSee('Chamber of Hindutva Studies', false);
    }
}
