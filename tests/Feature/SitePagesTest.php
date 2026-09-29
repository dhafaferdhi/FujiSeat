<?php

namespace Tests\Feature;

use Tests\TestCase;

class SitePagesTest extends TestCase
{
    public function test_every_page_renders_its_original_content(): void
    {
        $pages = [
            '/' => 'HEAD OFFICE - SUNTER PLANT',
            '/about-us' => 'Explore who we are',
            '/about-us/company-profile' => 'Crafting comfort',
            '/about-us/philosophy' => 'Earning admiration',
            '/about-us/basic-policy' => 'Satisfy Customer',
            '/about-us/manufacturing' => 'A closer look at production',
            '/about-us/company-history' => 'Company Milestones',
            '/about-us/quality-environment' => 'Kebijakan Lingkungan',
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

        foreach (config('site.products') as $product) {
            $this->assertFileExists(public_path('assets/images/'.$product['rotationSprite']));
        }
    }

    public function test_terios_and_rush_generations_have_distinct_rotation_images(): void
    {
        $products = collect(config('site.products'))->keyBy('name');
        $rotationSprites = [
            $products['Terios']['rotationSprite'],
            $products['Rush']['rotationSprite'],
            $products['2017 - New Terios / Rush']['rotationSprite'],
        ];

        $this->assertCount(3, array_unique($rotationSprites));
    }

    public function test_plants_page_uses_company_profile_facilities(): void
    {
        $response = $this->get(route('about.plants'));

        $response->assertOk()
            ->assertSee('Facility Capabilities')
            ->assertSee('Quality Facilities')
            ->assertSee('Sunter Plant')
            ->assertSee('KIIC Plant')
            ->assertSee('Surya Cipta-1 Plant')
            ->assertSee('Surya Cipta-2 Plant')
            ->assertSee('19,380 m²')
            ->assertSee('plant-profile-kiic.jpg')
            ->assertSee('facility-accuracy-tools.jpg');

        foreach (config('about.pages.plants.featured_plants') as $plant) {
            $this->assertFileExists(public_path('assets/images/'.$plant['image']));
        }
    }
}
