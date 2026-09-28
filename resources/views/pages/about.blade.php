@extends('layouts.site')

@section('title', 'About Us')
@section('body-class', 'about-page')

@section('content')
    <section class="about-banner" aria-labelledby="about-heading">
        <img class="about-banner-image" src="{{ asset('assets/images/plant-exterior.jpg') }}" alt="Fuji Seat Indonesia Suryacipta 1 manufacturing facility in Karawang" width="1862" height="806" fetchpriority="high">
        <div class="container about-banner-inner">
            <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">About Us</span></nav>
            <div class="about-banner-copy">
                <span class="about-eyebrow">PEOPLE. PRECISION. PROGRESS.</span>
                <h1 id="about-heading">Get to know<br>Fuji Seat Indonesia.</h1>
                <p>From our people to our production floor, discover the company behind every seat.</p>
                <div class="about-banner-actions">
                    <a class="button button-white" href="{{ route('products') }}">View Products <span aria-hidden="true">→</span></a>
                    <a class="button button-secondary" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">↗</span></a>
                </div>
            </div>
            <a class="about-explore" href="#company-profile"><span class="about-explore-icon" aria-hidden="true">↓</span>Explore our company</a>
            <span class="about-banner-caption">KARAWANG · SURYACIPTA 1 PLANT</span>
        </div>
    </section>
    <nav class="about-section-nav" aria-label="About us sections">
        <div class="container">
            <a href="#company-profile">Company Profile</a>
            <a href="#philosophy">Philosophy</a>
            <a href="#basic-policy">Basic Policy</a>
            <a href="#manufacturing">Manufacturing</a>
            <a href="#company-history">Our History</a>
            <a href="#quality-environment">Quality &amp; Environment</a>
        </div>
    </nav>
    <section class="about-profile" id="company-profile" aria-labelledby="profile-heading">
        <div class="container">
            <div class="about-grid">
                <div class="about-introduction">
                    <span class="section-kicker">COMPANY PROFILE</span>
                    <h2 id="profile-heading">Crafting comfort.<br>Moving forward.</h2>
                    <p>{{ config('site.description') }}</p>
                    <a class="button button-profile-download" href="{{ asset('assets/company-profile-fuji-seat-indonesia.pdf') }}" download><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 3v12m-5-5 5 5 5-5M5 16v5h14v-5"/></svg><span>Download Company Profile<small>PDF · 12.1 MB</small></span></a>
                </div>
                <figure class="about-image"><img src="{{ asset('assets/images/production-assembly.jpg') }}" alt="Fuji Seat Indonesia employees assembling automotive seats" width="1934" height="970" loading="lazy"><figcaption>Our people. The care behind every seat.</figcaption></figure>
            </div>
        </div>
    </section>
    <section class="philosophy-section" id="philosophy">
        <div class="container philosophy-grid">
            <h2>Philosophy</h2>
            <p>As a member of the Daihatsu Group, PT. FUJI SEAT INDONESIA strives to earn the admiration of people worldwide through the development and manufacture of seats and interior accessories for innovative vehicles.</p>
        </div>
    </section>
    <section class="policy-section" id="basic-policy">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">01</span><h2>Basic Policy</h2></div>
            <div class="policy-grid">
                <figure class="policy-image"><img src="{{ asset('assets/images/production-team.jpg') }}" alt="Fuji Seat Indonesia employees working on seat upholstery" width="1889" height="1223" loading="lazy"></figure>
                <div class="policy-cards">
                    <article><span class="policy-number" aria-hidden="true">01</span><h3>Satisfy Customer</h3><p>We strive to satisfy customer who love their Daihatsu vehicles.</p></article>
                    <article><span class="policy-number" aria-hidden="true">02</span><h3>Our Business</h3><p>We structure our business around activities conceived to earn consumer trust.</p></article>
                    <article><span class="policy-number" aria-hidden="true">03</span><h3>Committed</h3><p>Earth and every employee at PT. Fuji Seat Indonesia is committed to deepening understanding and building love and respect.</p></article>
                    <article><span class="policy-number" aria-hidden="true">04</span><h3>Leader</h3><p>The concept of leading by example and achieving breakthrough progress comprise the foundation all we do.</p></article>
                </div>
            </div>
        </div>
    </section>
    <section class="manufacturing-section" id="manufacturing" aria-labelledby="manufacturing-heading">
        <div class="container">
            <div class="section-heading">
                <div><span class="section-kicker">OUR CAPABILITIES</span><h2 id="manufacturing-heading">A closer look at production.</h2></div>
                <p class="section-description">From metal forming to seat assembly, see the people and equipment behind our products.</p>
            </div>
            <div class="process-grid">
                @foreach (config('site.processes') as $process)
                    <figure class="process-card">
                        <div class="process-image"><img src="{{ asset('assets/images/'.$process['image']) }}" alt="{{ $process['alt'] }}" width="{{ $process['width'] }}" height="{{ $process['height'] }}" loading="lazy" decoding="async"></div>
                        <figcaption><span class="section-index">0{{ $loop->iteration }}</span><h3>{{ $process['name'] }}</h3><p>{{ $process['detail'] }}</p></figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>
    <section class="history-section" id="company-history">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">02</span><h2>Company History</h2></div>
            <div class="timeline">
                @foreach (config('site.history') as $item)
                    <article class="timeline-item">
                        <div class="timeline-events">
                            @foreach ($item['events'] as $event)
                                <p>{{ $event }}</p>
                            @endforeach
                        </div>
                        <div class="timeline-year">{{ $item['year'] }}</div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="standards-section" id="quality-environment">
        <div class="container standards-grid">
            <article class="standard-card">
                <div class="standard-heading">
                    <img src="{{ asset('assets/images/iso-9001.jpg') }}" alt="ISO 9001 certificate" width="128" height="128" loading="lazy">
                    <h2>Kebijakan Mutu</h2>
                </div>
                <ol>
                    @foreach (config('site.quality_policy') as $policy)
                        <li>{{ $policy }}</li>
                    @endforeach
                </ol>
            </article>
            <article class="standard-card">
                <div class="standard-heading">
                    <img src="{{ asset('assets/images/iso-14001.jpg') }}" alt="ISO 14001 certificate" width="128" height="128" loading="lazy">
                    <h2>Kebijakan Lingkungan</h2>
                </div>
                <ol>
                    @foreach (config('site.environment_policy') as $policy)
                        <li>{{ $policy }}</li>
                    @endforeach
                </ol>
            </article>
        </div>
    </section>
    <section class="about-connect" aria-labelledby="connect-heading">
        <div class="container about-connect-inner">
            <div><span class="section-kicker">LET’S CONNECT</span><h2 id="connect-heading">Start a conversation with us.</h2><p>Find our offices, explore our products, or discover opportunities to join our team.</p></div>
            <div class="about-connect-actions"><a class="button button-primary" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">→</span></a><a class="text-link" href="{{ route('career') }}">Explore Careers <span aria-hidden="true">↗</span></a></div>
        </div>
    </section>
@endsection
