@extends('layouts.site')

@section('title', 'About Us')

@section('content')
    <section class="about-hero">
        <div class="container">
            <h1>About Us</h1>
            <p>{{ config('site.description') }}</p>
            <h2>Philosophy</h2>
            <p>As a member of the Daihatsu Group, PT. FUJI SEAT INDONESIA strives to earn the admiration of people worldwide through the development and manufacture of seats and interior accessories for innovative vehicles.</p>
        </div>
    </section>
    <section class="policy-section">
        <div class="container">
            <h2 class="centered-heading">Basic Policy</h2>
            <div class="policy-grid">
                <img src="{{ asset('assets/images/hero-kiic.jpg') }}" alt="Fuji Seat Indonesia Karawang plant" loading="lazy">
                <div class="policy-cards">
                    <article><h3>Satisfy Customer</h3><p>We strive to satisfy customer who love their Daihatsu vehicles.</p></article>
                    <article><h3>Our Business</h3><p>We structure our business around activities conceived to earn consumer trust.</p></article>
                    <article><h3>Committed</h3><p>Earth and every employee at PT. Fuji Seat Indonesia is committed to deepening understanding and building love and respect.</p></article>
                    <article><h3>Leader</h3><p>The concept of leading by example and achieving breakthrough progress comprise the foundation all we do.</p></article>
                </div>
            </div>
        </div>
    </section>
    <section class="history-section">
        <div class="container">
            <h2 class="centered-heading">Company History</h2>
            <div class="timeline">
                @foreach (config('site.history') as $item)
                    <article class="timeline-item">
                        <div class="timeline-events">@foreach ($item['events'] as $event)<p>{{ $event }}</p>@endforeach</div>
                        <div class="timeline-year">{{ $item['year'] }}</div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="standards-section">
        <div class="container">
            <article class="standard-card"><img src="{{ asset('assets/images/iso-9001.jpg') }}" alt="ISO 9001 certificate" loading="lazy"><div><h2>Kebijakan Mutu</h2><ol>@foreach (config('site.quality_policy') as $policy)<li>{{ $policy }}</li>@endforeach</ol></div></article>
            <article class="standard-card"><img src="{{ asset('assets/images/iso-14001.jpg') }}" alt="ISO 14001 certificate" loading="lazy"><div><h2>Kebijakan Lingkungan</h2><ol>@foreach (config('site.environment_policy') as $policy)<li>{{ $policy }}</li>@endforeach</ol></div></article>
        </div>
    </section>
@endsection
