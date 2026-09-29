@extends('layouts.site')

@section('title', 'Quality & Environment')
@section('body-class', 'about-page')

@section('content')
    <section class="about-banner about-banner-compact" aria-labelledby="quality-heading">
        <img class="about-banner-image" src="{{ asset('assets/images/production-assembly.jpg') }}" alt="Fuji Seat Indonesia quality control and assembly" width="1934" height="970" fetchpriority="high">
        <div class="container about-banner-inner">
            <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><a href="{{ route('about') }}">About Us</a><span aria-hidden="true">/</span><span aria-current="page">Quality &amp; Environment</span></nav>
            <div class="about-banner-copy">
                <span class="about-eyebrow">QUALITY &amp; ENVIRONMENT</span>
                <h1 id="quality-heading">Certified quality.<br>Responsible future.</h1>
                <p>Our commitment to ISO 9001 quality management and ISO 14001 environmental management systems.</p>
            </div>
            <span class="about-banner-caption">ISO 9001 Â· ISO 14001</span>
        </div>
    </section>
    <nav class="about-section-nav" aria-label="About Us sections">
        <div class="container">
            @foreach (config('about.sections') as $section)
                <a href="{{ route($section['route']) }}" @if (request()->routeIs($section['route']) || ($section['route'] === 'about.introduction' && request()->routeIs('about.company-profile', 'about.philosophy', 'about.basic-policy')) || ($section['route'] === 'about.plants' && request()->routeIs('about.manufacturing')) || ($section['route'] === 'about.certificates' && request()->routeIs('about.quality-environment'))) aria-current="page" @endif>{{ $section['title'] }}</a>
            @endforeach
        </div>
    </nav>
    <section class="standards-section" aria-labelledby="standards-heading">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">03</span><h2 id="standards-heading">Quality &amp; Environment</h2></div>
            <div class="standards-grid">
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
        </div>
    </section>
    <section class="about-connect" aria-labelledby="connect-heading">
        <div class="container about-connect-inner">
            <div><span class="section-kicker">LET'S CONNECT</span><h2 id="connect-heading">Start a conversation with us.</h2><p>Find our offices, explore our products, or discover opportunities to join our team.</p></div>
            <div class="about-connect-actions"><a class="button button-primary" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">â†’</span></a><a class="text-link" href="{{ route('career') }}">Explore Careers <span aria-hidden="true">â†—</span></a></div>
        </div>
    </section>
@endsection

