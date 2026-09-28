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
                        <img src="{{ asset('assets/images/'.$slide['image']) }}" alt="{{ $slide['title'] }}" width="{{ $slide['width'] }}" height="{{ $slide['height'] }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}" fetchpriority="{{ $loop->first ? 'high' : 'auto' }}">
                        <figcaption>{{ $slide['title'] }}</figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <section class="production-feature" aria-labelledby="production-heading">
        <div class="container production-feature-grid">
            <figure class="production-feature-image">
                <img src="{{ asset('assets/images/production-assembly.jpg') }}" alt="Fuji Seat Indonesia employees assembling automotive seats on the production line" width="1934" height="970" loading="lazy">
                <figcaption><span>OUR PEOPLE, OUR CRAFT</span>Automotive seat assembly</figcaption>
            </figure>
            <div class="production-feature-content">
                <span class="section-kicker">INSIDE FUJI SEAT</span>
                <h2 id="production-heading">Made with care, built for every journey.</h2>
                <p>Our people bring precision and experience to every seat we produce for Indonesia’s automotive industry.</p>
                <a class="text-link" href="{{ route('about') }}">Discover our company <span aria-hidden="true">→</span></a>
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

    <section class="facilities-section" aria-labelledby="facilities-heading">
        <div class="container">
            <div class="section-heading">
                <div><span class="section-kicker">OUR LOCATIONS</span><h2 id="facilities-heading">Where we make it happen.</h2></div>
                <a class="text-link" href="{{ route('contact') }}">Find our locations <span aria-hidden="true">→</span></a>
            </div>
            <div class="facilities-grid">
                @foreach (config('site.offices') as $office)
                    <a class="facility-card" href="{{ route('contact') }}#office-{{ $loop->iteration }}">
                        <figure>
                            <div class="facility-image"><img src="{{ asset('assets/images/'.$office['image']) }}" alt="{{ $office['name'] }}" width="{{ $office['width'] }}" height="{{ $office['height'] }}" loading="lazy" decoding="async"></div>
                            <figcaption><span class="section-index">0{{ $loop->iteration }}</span><h3>{{ $office['name'] }}</h3><span class="facility-arrow" aria-hidden="true">↗</span></figcaption>
                        </figure>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <div class="tagline-bar">{{ config('site.tagline') }}</div>
@endsection
