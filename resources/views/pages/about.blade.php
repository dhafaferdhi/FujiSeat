@extends('layouts.site')

@section('title', 'About Us')

@section('content')
    <section class="about-hero">
        <div class="container">
            <nav class="page-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">About Us</span></nav>
            <div class="about-grid">
                <div class="about-introduction">
                    <span class="section-kicker">{{ config('site.company') }}</span>
                    <h1>About Us</h1>
                    <p>{{ config('site.description') }}</p>
                    <nav class="section-navigation" aria-label="About us sections">
                        <a href="#basic-policy">Basic Policy <span aria-hidden="true">↗</span></a>
                        <a href="#company-history">Company History <span aria-hidden="true">↗</span></a>
                    </nav>
                </div>
                <figure class="about-image"><img src="{{ asset('assets/images/about.jpg') }}" alt="Compass on a world map" width="1400" height="900"></figure>
            </div>
        </div>
    </section>
    <section class="philosophy-section">
        <div class="container philosophy-grid">
            <h2>Philosophy</h2>
            <p>As a member of the Daihatsu Group, PT. FUJI SEAT INDONESIA strives to earn the admiration of people worldwide through the development and manufacture of seats and interior accessories for innovative vehicles.</p>
        </div>
    </section>
    <section class="policy-section" id="basic-policy">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">01</span><h2>Basic Policy</h2></div>
            <div class="policy-grid">
                <figure class="policy-image"><img src="{{ asset('assets/images/hero-kiic.jpg') }}" alt="Fuji Seat Indonesia Karawang plant" width="1400" height="827" loading="lazy"></figure>
                <div class="policy-cards">
                    <article><span class="policy-number" aria-hidden="true">01</span><h3>Satisfy Customer</h3><p>We strive to satisfy customer who love their Daihatsu vehicles.</p></article>
                    <article><span class="policy-number" aria-hidden="true">02</span><h3>Our Business</h3><p>We structure our business around activities conceived to earn consumer trust.</p></article>
                    <article><span class="policy-number" aria-hidden="true">03</span><h3>Committed</h3><p>Earth and every employee at PT. Fuji Seat Indonesia is committed to deepening understanding and building love and respect.</p></article>
                    <article><span class="policy-number" aria-hidden="true">04</span><h3>Leader</h3><p>The concept of leading by example and achieving breakthrough progress comprise the foundation all we do.</p></article>
                </div>
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
    <section class="standards-section">
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
@endsection
