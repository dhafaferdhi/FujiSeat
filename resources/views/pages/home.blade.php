@extends('layouts.site')

@section('title', 'Home')

@section('content')
    <section class="home-hero" data-slider aria-label="Fuji Seat Indonesia plants">
        <div class="hero-layout">
            <div class="hero-content">
                <span class="hero-kicker">WELCOME TO</span>
                <h1>PT. FUJI SEAT<br><em>INDONESIA</em></h1>
                <p>{{ config('site.tagline') }}</p>
                <div class="hero-actions">
                    <a class="button button-primary" href="{{ route('products') }}">View Products <span aria-hidden="true">→</span></a>
                    <a class="button button-secondary" href="{{ route('about') }}">About Us</a>
                </div>
                <div class="hero-controls">
                    <span class="hero-count"><span data-current>01</span> / {{ str_pad((string) count(config('site.slides')), 2, '0', STR_PAD_LEFT) }}</span>
                    <button class="hero-arrow" type="button" data-previous aria-label="Previous slide"><span aria-hidden="true">←</span></button>
                    <button class="hero-arrow" type="button" data-next aria-label="Next slide"><span aria-hidden="true">→</span></button>
                    <div class="hero-dots" aria-label="Choose a slide">
                        @foreach (config('site.slides') as $slide)
                            <button type="button" data-dot="{{ $loop->index }}" class="{{ $loop->first ? 'is-active' : '' }}" aria-label="Show {{ $slide['title'] }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hero-media" aria-live="polite">
                @foreach (config('site.slides') as $slide)
                    <figure class="hero-slide {{ $loop->first ? 'is-active' : '' }}" data-slide aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
                        <img src="{{ asset('assets/images/'.$slide['image']) }}" alt="{{ $slide['title'] }}" width="1400" height="827">
                        <figcaption>{{ $slide['title'] }}</figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <section class="gallery-section" aria-label="Fuji Seat Indonesia gallery">
        <div class="container section-heading">
            <div>
                <span class="section-kicker">OUR PRODUCTS</span>
                <h2>Automotive seating</h2>
            </div>
            <a class="text-link" href="{{ route('products') }}">View all products <span aria-hidden="true">→</span></a>
        </div>
        <div class="container gallery-grid">
            @foreach (config('site.products') as $product)
                <a class="gallery-card" href="{{ route('products') }}#product-{{ $loop->iteration }}">
                    <figure>
                        <div class="gallery-image">
                            <img src="{{ asset('assets/images/gallery-'.$loop->iteration.'.jpg') }}" alt="{{ $product['name'] }} car seats" width="350" height="280" loading="lazy">
                        </div>
                        <figcaption class="gallery-caption">
                            <span>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <h3>{{ $product['name'] }}</h3>
                            <span class="gallery-arrow" aria-hidden="true">→</span>
                        </figcaption>
                    </figure>
                </a>
            @endforeach
        </div>
    </section>

    <div class="tagline-bar">{{ config('site.tagline') }}</div>
@endsection
