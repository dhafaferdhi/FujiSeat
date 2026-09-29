@extends('layouts.site')

@section('title', 'Manufacturing')
@section('body-class', 'about-page')

@section('content')
    <section class="about-banner about-banner-compact" aria-labelledby="manufacturing-heading">
        <img class="about-banner-image" src="{{ asset('assets/images/production-assembly.jpg') }}" alt="Fuji Seat Indonesia production assembly line" width="1934" height="970" fetchpriority="high">
        <div class="container about-banner-inner">
            <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><a href="{{ route('about') }}">About Us</a><span aria-hidden="true">/</span><span aria-current="page">Manufacturing</span></nav>
            <div class="about-banner-copy">
                <span class="about-eyebrow">OUR CAPABILITIES</span>
                <h1 id="manufacturing-heading">A closer look<br>at production.</h1>
                <p>From metal forming to seat assembly, see the people and equipment behind our products.</p>
            </div>
            <span class="about-banner-caption">STAMPING Â· WELDING Â· ASSEMBLY</span>
        </div>
    </section>
    <nav class="about-section-nav" aria-label="About Us sections">
        <div class="container">
            @foreach (config('about.sections') as $section)
                <a href="{{ route($section['route']) }}" @if (request()->routeIs($section['route']) || ($section['route'] === 'about.introduction' && request()->routeIs('about.company-profile', 'about.philosophy', 'about.basic-policy')) || ($section['route'] === 'about.plants' && request()->routeIs('about.manufacturing')) || ($section['route'] === 'about.certificates' && request()->routeIs('about.quality-environment'))) aria-current="page" @endif>{{ $section['title'] }}</a>
            @endforeach
        </div>
    </nav>
    <section class="manufacturing-section" aria-labelledby="manufacturing-detail-heading">
        <div class="container">
            <div class="section-heading">
                <div><span class="section-kicker">OUR CAPABILITIES</span><h2 id="manufacturing-detail-heading">A closer look at production.</h2></div>
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
    <section class="components-section" aria-labelledby="components-heading">
        <div class="container">
            <div class="section-heading">
                <div><span class="section-kicker">COMPONENTS</span><h2 id="components-heading">What goes into every seat.</h2></div>
                <p class="section-description">We manufacture and source high-quality components to ensure comfort, safety, and durability.</p>
            </div>
            <div class="components-grid">
                @foreach (config('site.components') as $component)
                    <figure class="component-card">
                        <div class="component-image"><img src="{{ asset('assets/images/'.$component['image']) }}" alt="{{ $component['alt'] }}" width="{{ $component['width'] }}" height="{{ $component['height'] }}" loading="lazy" decoding="async"></div>
                        <figcaption><span class="section-index">0{{ $loop->iteration }}</span><h3>{{ $component['name'] }}</h3><p>{{ $component['detail'] }}</p></figcaption>
                    </figure>
                @endforeach
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

