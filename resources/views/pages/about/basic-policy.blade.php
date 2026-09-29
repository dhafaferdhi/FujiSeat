@extends('layouts.site')

@section('title', 'Basic Policy')
@section('body-class', 'about-page')

@section('content')
    <section class="about-banner about-banner-compact" aria-labelledby="basic-policy-heading">
        <img class="about-banner-image" src="{{ asset('assets/images/production-team.jpg') }}" alt="Fuji Seat Indonesia employees working on seat upholstery" width="1889" height="1223" fetchpriority="high">
        <div class="container about-banner-inner">
            <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><a href="{{ route('about') }}">About Us</a><span aria-hidden="true">/</span><span aria-current="page">Basic Policy</span></nav>
            <div class="about-banner-copy">
                <span class="about-eyebrow">BASIC POLICY</span>
                <h1 id="basic-policy-heading">Our commitment<br>to excellence.</h1>
                <p>Four guiding principles shape every decision we make and every seat we produce.</p>
            </div>
            <span class="about-banner-caption">SATISFY Â· STRUCTURE Â· COMMIT Â· LEAD</span>
        </div>
    </section>
    <nav class="about-section-nav" aria-label="About Us sections">
        <div class="container">
            @foreach (config('about.sections') as $section)
                <a href="{{ route($section['route']) }}" @if (request()->routeIs($section['route']) || ($section['route'] === 'about.introduction' && request()->routeIs('about.company-profile', 'about.philosophy', 'about.basic-policy')) || ($section['route'] === 'about.plants' && request()->routeIs('about.manufacturing')) || ($section['route'] === 'about.certificates' && request()->routeIs('about.quality-environment'))) aria-current="page" @endif>{{ $section['title'] }}</a>
            @endforeach
        </div>
    </nav>
    <section class="policy-section" aria-labelledby="policy-heading">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">01</span><h2 id="policy-heading">Basic Policy</h2></div>
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
    <section class="about-connect" aria-labelledby="connect-heading">
        <div class="container about-connect-inner">
            <div><span class="section-kicker">LET'S CONNECT</span><h2 id="connect-heading">Start a conversation with us.</h2><p>Find our offices, explore our products, or discover opportunities to join our team.</p></div>
            <div class="about-connect-actions"><a class="button button-primary" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">â†’</span></a><a class="text-link" href="{{ route('career') }}">Explore Careers <span aria-hidden="true">â†—</span></a></div>
        </div>
    </section>
@endsection

