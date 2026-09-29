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
                    <a class="button button-primary" href="{{ route('about') }}">Explore Our Company <span aria-hidden="true">→</span></a>
                    <a class="button button-secondary" href="{{ route('products') }}"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg> View Our Products</a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        <div><strong>2,000+</strong><span>Employees</span></div>
                    </div>
                    <div class="hero-stat">
                        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        <div><strong>2,000+</strong><span>Seats per day</span></div>
                    </div>
                    <div class="hero-stat">
                        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 21h18"/><path d="M5 21V7l8-4v18"/><path d="M19 21V11l-6-4"/></svg>
                        <div><strong>Sunter, KIIC,</strong><span>Surya Cipta Plant</span></div>
                    </div>
                </div>
                <div class="hero-controls">
                    <span class="hero-count"><span data-current>01</span> / {{ str_pad((string) count(config('site.slides')), 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="hero-slide-label">Head Office – Sunter Plant</span>
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
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <section class="production-feature" aria-labelledby="production-heading">
        <div class="container production-feature-grid">
            <figure class="production-feature-image">
                <img src="{{ asset('assets/images/production-assembly.jpg') }}" alt="Fuji Seat Indonesia employees assembling automotive seats on the production line" width="1934" height="970" loading="lazy">
                <figcaption>
                    <span class="video-play" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
                    <span class="video-text"><strong>Watch Our Manufacturing Process</strong>See how we create quality seats for a better journey.</span>
                </figcaption>
            </figure>
            <div class="production-feature-content">
                <span class="section-kicker">INSIDE FUJI SEAT</span>
                <h2 id="production-heading">Made with care, built for every journey.</h2>
                <p>From advanced manufacturing facilities to strict quality control, PT. Fuji Seat Indonesia is committed to delivering automotive seating solutions that support comfort, safety, and a better driving experience.</p>
            </div>
        </div>
    </section>

    <section class="home-cards" aria-label="Quick links">
        <div class="container home-cards-grid">
            <a class="home-card" href="{{ route('about.company-profile') }}">
                <div class="home-card-image"><img src="{{ asset('assets/images/plant-exterior.jpg') }}" alt="Fuji Seat Indonesia company" width="1862" height="806" loading="lazy"></div>
                <div class="home-card-body">
                    <span class="home-card-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 21h18"/><path d="M5 21V7l8-4v18"/><path d="M19 21V11l-6-4"/></svg></span>
                    <h3>Our Company</h3>
                    <p>Learn about our history, philosophy, and milestones.</p>
                    <span class="home-card-link">Learn More <span aria-hidden="true">→</span></span>
                </div>
            </a>
            <a class="home-card" href="{{ route('contact') }}">
                <div class="home-card-image"><img src="{{ asset('assets/images/hero-kiic.jpg') }}" alt="Fuji Seat Indonesia plants and facilities" width="1400" height="827" loading="lazy"></div>
                <div class="home-card-body">
                    <span class="home-card-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></span>
                    <h3>Plants &amp; Facilities</h3>
                    <p>Explore our Sunter, KIIC, and Surya Cipta plants.</p>
                    <span class="home-card-link">Explore Facilities <span aria-hidden="true">→</span></span>
                </div>
            </a>
            <a class="home-card" href="{{ route('products') }}">
                <div class="home-card-image"><img src="{{ asset('assets/images/product-1.jpg') }}" alt="Fuji Seat Indonesia products" width="350" height="280" loading="lazy"></div>
                <div class="home-card-body">
                    <span class="home-card-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg></span>
                    <h3>Our Products</h3>
                    <p>High-quality seats and components for leading automotive brands.</p>
                    <span class="home-card-link">View Products <span aria-hidden="true">→</span></span>
                </div>
            </a>
            <a class="home-card" href="{{ route('about.manufacturing') }}">
                <div class="home-card-image"><img src="{{ asset('assets/images/process-stamping.jpg') }}" alt="Fuji Seat Indonesia manufacturing process" width="2012" height="980" loading="lazy"></div>
                <div class="home-card-body">
                    <span class="home-card-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg></span>
                    <h3>Manufacturing Process</h3>
                    <p>Modern technology and integrated production systems.</p>
                    <span class="home-card-link">See Our Process <span aria-hidden="true">→</span></span>
                </div>
            </a>
            <a class="home-card" href="{{ route('about.company-profile') }}">
                <div class="home-card-image"><img src="{{ asset('assets/images/production-team.jpg') }}" alt="Fuji Seat Indonesia customers" width="1889" height="1223" loading="lazy"></div>
                <div class="home-card-body">
                    <span class="home-card-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
                    <h3>Our Customers</h3>
                    <p>Trusted by leading automotive manufacturers.</p>
                    <span class="home-card-link">View Customers <span aria-hidden="true">→</span></span>
                </div>
            </a>
        </div>
    </section>

    <div class="tagline-bar">{{ config('site.tagline') }}</div>
@endsection
