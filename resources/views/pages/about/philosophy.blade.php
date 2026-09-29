@extends('layouts.site')

@section('title', 'Philosophy')
@section('body-class', 'about-page')

@section('content')
    <section class="about-banner about-banner-compact" aria-labelledby="philosophy-heading">
        <img class="about-banner-image" src="{{ asset('assets/images/production-team.jpg') }}" alt="Fuji Seat Indonesia production team" width="1889" height="1223" fetchpriority="high">
        <div class="container about-banner-inner">
            <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><a href="{{ route('about') }}">About Us</a><span aria-hidden="true">/</span><span aria-current="page">Philosophy</span></nav>
            <div class="about-banner-copy">
                <span class="about-eyebrow">OUR PHILOSOPHY</span>
                <h1 id="philosophy-heading">Earning admiration<br>through every seat.</h1>
                <p>As a member of Fuji Seat Group, we strive to earn the admiration of people worldwide through the development and manufacture of seats and interior accessories for innovative vehicles.</p>
            </div>
            <span class="about-banner-caption">PEOPLE. PRECISION. PROGRESS.</span>
        </div>
    </section>
    <nav class="about-section-nav" aria-label="About Us sections">
        <div class="container">
            @foreach (config('about.sections') as $section)
                <a href="{{ route($section['route']) }}" @if (request()->routeIs($section['route']) || ($section['route'] === 'about.introduction' && request()->routeIs('about.company-profile', 'about.philosophy', 'about.basic-policy')) || ($section['route'] === 'about.plants' && request()->routeIs('about.manufacturing')) || ($section['route'] === 'about.certificates' && request()->routeIs('about.quality-environment'))) aria-current="page" @endif>{{ $section['title'] }}</a>
            @endforeach
        </div>
    </nav>
    <section class="philosophy-section" aria-labelledby="philosophy-detail-heading">
        <div class="container philosophy-grid">
            <h2 id="philosophy-detail-heading">Philosophy</h2>
            <p>As a member of Fuji Seat Group, PT. FUJI SEAT INDONESIA strives to earn the admiration of people worldwide through the development and manufacture of seats and interior accessories for innovative vehicles.</p>
        </div>
    </section>
    <section class="philosophy-values" aria-labelledby="values-heading">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">01</span><h2 id="values-heading">Our Core Values</h2></div>
            <div class="values-grid">
                <article class="value-card">
                    <span class="value-number" aria-hidden="true">01</span>
                    <h3>Customer First</h3>
                    <p>We put the customer at the heart of every decision, striving to exceed expectations in quality and service.</p>
                </article>
                <article class="value-card">
                    <span class="value-number" aria-hidden="true">02</span>
                    <h3>Continuous Improvement</h3>
                    <p>Kaizen is embedded in our culture â€” we constantly seek better ways to design, build, and deliver.</p>
                </article>
                <article class="value-card">
                    <span class="value-number" aria-hidden="true">03</span>
                    <h3>Integrity &amp; Respect</h3>
                    <p>We act with honesty and transparency, respecting our employees, partners, and communities.</p>
                </article>
                <article class="value-card">
                    <span class="value-number" aria-hidden="true">04</span>
                    <h3>Innovation</h3>
                    <p>We embrace new technologies and ideas to create seating solutions that enhance every journey.</p>
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

