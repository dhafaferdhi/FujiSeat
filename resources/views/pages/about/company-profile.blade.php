@extends('layouts.site')

@section('title', 'Company Profile')
@section('body-class', 'about-page')

@section('content')
    <section class="about-banner about-banner-compact" aria-labelledby="company-profile-heading">
        <img class="about-banner-image" src="{{ asset('assets/images/plant-exterior.jpg') }}" alt="Fuji Seat Indonesia Suryacipta 1 manufacturing facility in Karawang" width="1862" height="806" fetchpriority="high">
        <div class="container about-banner-inner">
            <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><a href="{{ route('about') }}">About Us</a><span aria-hidden="true">/</span><span aria-current="page">Company Profile</span></nav>
            <div class="about-banner-copy">
                <span class="about-eyebrow">COMPANY PROFILE</span>
                <h1 id="company-profile-heading">Crafting comfort.<br>Moving forward.</h1>
                <p>Established in Indonesia in 2007, PT. Fuji Seat Indonesia is part of Fuji Seat Group and manufactures automotive seats and interior accessories for leading vehicle producers.</p>
            </div>
            <span class="about-banner-caption">KARAWANG Â· SURYACIPTA 1 PLANT</span>
        </div>
    </section>
    <nav class="about-section-nav" aria-label="About Us sections">
        <div class="container">
            @foreach (config('about.sections') as $section)
                <a href="{{ route($section['route']) }}" @if (request()->routeIs($section['route']) || ($section['route'] === 'about.introduction' && request()->routeIs('about.company-profile', 'about.philosophy', 'about.basic-policy')) || ($section['route'] === 'about.plants' && request()->routeIs('about.manufacturing')) || ($section['route'] === 'about.certificates' && request()->routeIs('about.quality-environment'))) aria-current="page" @endif>{{ $section['title'] }}</a>
            @endforeach
        </div>
    </nav>
    <section class="about-profile" aria-labelledby="profile-heading">
        <div class="container">
            <div class="about-grid">
                <div class="about-introduction">
                    <span class="section-kicker">COMPANY PROFILE</span>
                    <h2 id="profile-heading">Crafting comfort.<br>Moving forward.</h2>
                    <p>{{ config('site.description') }}</p>
                </div>
                <figure class="about-image"><img src="{{ asset('assets/images/production-assembly.jpg') }}" alt="Fuji Seat Indonesia employees assembling automotive seats" width="1934" height="970" loading="lazy"><figcaption>Our people. The care behind every seat.</figcaption></figure>
            </div>
        </div>
    </section>
    <section class="company-overview" aria-labelledby="overview-heading">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">01</span><h2 id="overview-heading">Company Overview</h2></div>
            <div class="overview-grid">
                <div class="overview-card">
                    <h3>Established</h3>
                    <p>2005 â€” Founded as Fuji Meiwa in Depok, later merged and grown into PT. Fuji Seat Indonesia.</p>
                </div>
                <div class="overview-card">
                    <h3>Production Capacity</h3>
                    <p>More than 2,000 seats per day across our four manufacturing plants in Sunter and Karawang.</p>
                </div>
                <div class="overview-card">
                    <h3>Workforce</h3>
                    <p>Approximately 2,000 employees dedicated to quality, safety, and continuous improvement.</p>
                </div>
                <div class="overview-card">
                    <h3>Customers</h3>
                    <p>PT. Astra Daihatsu Motor (ADM) and PT. Toyota Motor Manufacturing Indonesia (TMMIN).</p>
                </div>
            </div>
        </div>
    </section>
    <section class="history-section" aria-labelledby="milestones-heading">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">02</span><h2 id="milestones-heading">Company Milestones</h2></div>
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
    <section class="about-connect" aria-labelledby="connect-heading">
        <div class="container about-connect-inner">
            <div><span class="section-kicker">LET'S CONNECT</span><h2 id="connect-heading">Start a conversation with us.</h2><p>Find our offices, explore our products, or discover opportunities to join our team.</p></div>
            <div class="about-connect-actions"><a class="button button-primary" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">â†’</span></a><a class="text-link" href="{{ route('career') }}">Explore Careers <span aria-hidden="true">â†—</span></a></div>
        </div>
    </section>
@endsection

