@extends('layouts.site')

@section('title', 'Company History')
@section('body-class', 'about-page')

@section('content')
    <section class="about-banner about-banner-compact" aria-labelledby="company-history-heading">
        <img class="about-banner-image" src="{{ asset('assets/images/plant-exterior.jpg') }}" alt="Fuji Seat Indonesia manufacturing facility" width="1862" height="806" fetchpriority="high">
        <div class="container about-banner-inner">
            <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><a href="{{ route('about') }}">About Us</a><span aria-hidden="true">/</span><span aria-current="page">Company History</span></nav>
            <div class="about-banner-copy">
                <span class="about-eyebrow">OUR HISTORY</span>
                <h1 id="company-history-heading">Two decades<br>of growth.</h1>
                <p>From our founding in 2005 to today â€” key milestones in our journey as a trusted automotive seat manufacturer.</p>
            </div>
            <span class="about-banner-caption">2005 â€” 2024</span>
        </div>
    </section>
    <nav class="about-section-nav" aria-label="About Us sections">
        <div class="container">
            @foreach (config('about.sections') as $section)
                <a href="{{ route($section['route']) }}" @if (request()->routeIs($section['route']) || ($section['route'] === 'about.introduction' && request()->routeIs('about.company-profile', 'about.philosophy', 'about.basic-policy')) || ($section['route'] === 'about.plants' && request()->routeIs('about.manufacturing')) || ($section['route'] === 'about.certificates' && request()->routeIs('about.quality-environment'))) aria-current="page" @endif>{{ $section['title'] }}</a>
            @endforeach
        </div>
    </nav>
    <section class="history-section" aria-labelledby="history-heading">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">02</span><h2 id="history-heading">Company History</h2></div>
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

