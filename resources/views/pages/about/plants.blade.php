@extends('layouts.site')

@section('title', 'Plants & Facilities')
@section('body-class', 'about-page about-detail-page plants-page')

@section('content')
    @php
        $plantSectionRoutes = ['about', 'about.introduction', 'about.group-companies', 'about.company-history', 'about.plants', 'about.products', 'about.customers', 'about.certificates', 'about.contact'];
        $sectionsByRoute = collect(config('about.sections'))->keyBy('route');
    @endphp
    <svg class="plants-icon-defs" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
        <symbol id="plants-icon-factory" viewBox="0 0 24 24"><path d="M2 21V9l6 3V8l6 4V4h5v17H2Zm4-4h2m3 0h2m3 0h2"/></symbol>
        <symbol id="plants-icon-gear" viewBox="0 0 24 24"><path d="m10 2-.5 2.1-2 .8-1.8-1.2-2 2 1.2 1.8-.8 2L2 10v4l2.1.5.8 2-1.2 1.8 2 2 1.8-1.2 2 .8L10 22h4l.5-2.1 2-.8 1.8 1.2 2-2-1.2-1.8.8-2L22 14v-4l-2.1-.5-.8-2 1.2-1.8-2-2-1.8 1.2-2-.8L14 2h-4Z"/><circle cx="12" cy="12" r="3"/></symbol>
        <symbol id="plants-icon-people" viewBox="0 0 24 24"><circle cx="9" cy="7" r="3"/><path d="M2 21v-3a7 7 0 0 1 14 0v3H2Zm14-16a3 3 0 0 1 0 6m2 3a6 6 0 0 1 4 6v1h-4"/></symbol>
        <symbol id="plants-icon-building" viewBox="0 0 24 24"><path d="M3 21V8l7-3v16m0-11 7-3v14m0-9 4 2v7H3M6 11h1m-1 4h1m6-2h1m-1 4h1"/></symbol>
        <symbol id="plants-icon-area" viewBox="0 0 24 24"><path d="M3 21V3h18v18H3Zm4-3 3-5 3 3 3-6 3 8H7ZM7 7h4"/></symbol>
        <symbol id="plants-icon-check" viewBox="0 0 24 24"><path d="m5 12 5 5L20 7"/></symbol>
        <symbol id="plants-icon-arrow" viewBox="0 0 24 24"><path d="M4 12h15m-6-6 6 6-6 6"/></symbol>
    </svg>

    <section class="plants-hero" aria-labelledby="plants-heading">
        <img class="plants-hero-photo" src="{{ asset('assets/images/hero-kiic.jpg') }}" alt="" fetchpriority="high">
        <div class="container plants-hero-inner">
            <div class="plants-hero-top">
                <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">&rsaquo;</span><a href="{{ route('about') }}">About Us</a><span aria-hidden="true">&rsaquo;</span><span aria-current="page">Plants &amp; Facilities</span></nav>
                <nav class="about-page-sections-nav" aria-label="About Us sections">
                    @foreach ($plantSectionRoutes as $sectionRoute)
                        <a href="{{ route($sectionRoute) }}" @if ($sectionRoute === 'about.plants') aria-current="page" @endif>{{ $sectionRoute === 'about' ? 'About Us' : $sectionsByRoute[$sectionRoute]['title'] }}</a>
                    @endforeach
                </nav>
            </div>
            <div class="plants-hero-grid">
                <div class="plants-hero-copy">
                    <span class="plants-kicker">Our Manufacturing Network</span>
                    <h1 id="plants-heading">PLANTS &amp; <span>FACILITIES</span></h1>
                    <p class="plants-hero-tagline">A Strong Foundation for a Better Driving Experience</p>
                    <p class="plants-hero-description">{{ $page['showcase_description'] }}</p>
                    <div class="plants-hero-stats" aria-label="Manufacturing network at a glance">
                        <div><svg aria-hidden="true"><use href="#plants-icon-factory"/></svg><strong>4</strong><span>Strategic Plants</span></div>
                        <div><svg aria-hidden="true"><use href="#plants-icon-people"/></svg><strong>2,000+</strong><span>Employees</span></div>
                        <div><svg aria-hidden="true"><use href="#plants-icon-gear"/></svg><strong>Integrated</strong><span>Manufacturing Process</span></div>
                    </div>
                </div>
                <div class="plants-network" aria-label="Four plants in Jakarta and Karawang">
                    <svg class="plants-network-lines" viewBox="0 0 600 270" preserveAspectRatio="none" aria-hidden="true"><path d="M115 60 C210 50 240 60 310 95 S405 105 465 160 M115 60 C205 95 220 180 260 210 M260 210 C325 175 400 180 465 160"/><circle cx="115" cy="60" r="7"/><circle cx="310" cy="95" r="7"/><circle cx="260" cy="210" r="7"/><circle cx="465" cy="160" r="7"/></svg>
                    @foreach ($page['featured_plants'] as $plant)
                        <div class="plants-network-site plants-network-site-{{ $loop->iteration }}">
                            <img src="{{ asset('assets/images/'.$plant['image']) }}" alt="" width="68" height="46" loading="lazy">
                            <span><strong>{{ str_replace(' Plant', '', $plant['title']) }}</strong><small>{{ $plant['location'] }}</small></span>
                        </div>
                    @endforeach
                    <aside class="plants-hero-quote"><span>Our Commitment</span><blockquote>“Connected<br>Facilities,<br>Stronger<br>Together”</blockquote><strong>FUJI SEAT</strong><small>IDEAS FOR ALL 2</small></aside>
                </div>
            </div>
        </div>
    </section>

    <div class="plants-content">
        <section class="container plants-locations" aria-labelledby="plants-locations-heading">
            <div class="plants-section-heading plants-locations-heading"><div><span class="plants-label">Our Locations</span><h2 id="plants-locations-heading">Our Plants</h2></div><p>Four strategically located plants with specialized roles work together to create high-quality automotive seats and components for a better tomorrow.</p></div>
            <div class="plants-card-grid">
                @foreach ($page['featured_plants'] as $plant)
                    <article class="plants-card">
                        <div class="plants-card-image"><img src="{{ asset('assets/images/'.$plant['image']) }}" alt="{{ $plant['alt'] }}" loading="lazy" decoding="async"><span>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span></div>
                        <div class="plants-card-body">
                            <h3>{{ $plant['title'] }}</h3>
                            <ul>@foreach ($plant['roles'] as $role)<li><svg aria-hidden="true"><use href="#plants-icon-gear"/></svg>{{ $role }}</li>@endforeach</ul>
                            <div class="plants-card-areas"><div><svg aria-hidden="true"><use href="#plants-icon-building"/></svg><span>Building Area<strong>{{ $plant['building_area'] }} m²</strong></span></div><div><svg aria-hidden="true"><use href="#plants-icon-area"/></svg><span>Surface Area<strong>{{ $plant['surface_area'] }} m²</strong></span></div></div>
                        </div>
                        <a class="plants-card-arrow" href="{{ route('about.contact') }}" aria-label="Contact {{ $plant['title'] }}"><svg aria-hidden="true"><use href="#plants-icon-arrow"/></svg></a>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="container plants-capabilities" aria-labelledby="plants-capabilities-heading">
            <div class="plants-section-heading"><div><span class="plants-label">Our Capabilities</span><h2 id="plants-capabilities-heading">Facility Capabilities</h2></div><p>Each plant has specialized capabilities with integrated processes to ensure high quality, efficiency, and flexibility in meeting customer needs.</p></div>
            <div class="plants-table-wrap"><table><thead><tr><th scope="col">Plant</th>@foreach ($page['capabilities'] as $capability)<th scope="col">{{ $capability }}</th>@endforeach</tr></thead><tbody>@foreach ($page['featured_plants'] as $plant)<tr><th scope="row">{{ $plant['title'] }}</th>@foreach ($page['capabilities'] as $key => $capability)<td>@if (in_array($key, $plant['capabilities'], true))<span class="plants-table-check" aria-label="Available"><svg aria-hidden="true"><use href="#plants-icon-check"/></svg></span>@else<span class="plants-table-empty" aria-label="Not listed">—</span>@endif</td>@endforeach</tr>@endforeach</tbody></table></div>
        </section>

        <section class="container plants-quality" aria-labelledby="plants-quality-heading">
            <div class="plants-section-heading"><div><span class="plants-label">Commitment to Quality</span><h2 id="plants-quality-heading">Quality Facilities</h2></div><p>Equipped with advanced equipment and comprehensive testing systems to ensure reliability, safety, and product durability.</p></div>
            <div class="plants-quality-grid">@foreach ($page['quality_facilities'] as $facility)<article class="plants-quality-card"><img src="{{ asset('assets/images/'.$facility['image']) }}" alt="{{ $facility['alt'] }}" loading="lazy" decoding="async"><div><h3>{{ $facility['title'] }}</h3><p>{{ $facility['description'] }}</p></div><a href="{{ route('about.manufacturing') }}" aria-label="Learn more about {{ $facility['title'] }}"><svg aria-hidden="true"><use href="#plants-icon-arrow"/></svg></a></article>@endforeach</div>
        </section>
    </div>

    <section class="plants-cta" aria-labelledby="plants-cta-heading"><img src="{{ asset('assets/images/production-assembly.jpg') }}" alt="" loading="lazy"><div class="container"><div><span class="plants-label">Together for a Better Mobility</span><h2 id="plants-cta-heading">Reliable Facilities. Superior Quality.</h2><p>Our plants and facilities are built on people, technology, and continuous improvement to deliver seating solutions for a better driving experience.</p></div><a class="button button-primary" href="{{ route('contact') }}">Contact Us <svg aria-hidden="true"><use href="#plants-icon-arrow"/></svg></a></div></section>
@endsection
