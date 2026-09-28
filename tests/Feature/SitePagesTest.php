<?php

namespace Tests\Feature;

use Tests\TestCase;

class SitePagesTest extends TestCase
{
    public function test_every_page_renders_its_original_content(): void
    {
        $pages = [
            '/' => 'HEAD OFFICE - SUNTER PLANT',
            '/about-us' => 'Kebijakan Lingkungan',
            '/products' => 'Calya &amp; Sigra',
            '/career' => 'fujiseatindonesiapt@gmail.com',
            '/contact-us' => 'Karawang Suryacipta 2 Plant',
        ];

        foreach ($pages as $url => $text) {
            $this->get($url)->assertOk()->assertSee($text, false);
        }
    }

    public function test_original_image_assets_are_available_locally(): void
    {
        foreach (['logo.png', 'hero-sunter.jpg', 'product-1.jpg', 'career.jpg', 'iso-9001.jpg'] as $image) {
            $this->assertFileExists(public_path('assets/images/'.$image));
        }
    }
}
