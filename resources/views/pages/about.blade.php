@extends('layouts.site')

@section('title', 'About Us')
@section('body-class', 'about-overview-page')

@section('content')
    @php
        $journeySections = [
            ['title' => 'Introduction', 'description' => 'Learn about our background, people, and manufacturing focus.', 'route' => 'about.introduction', 'image' => 'plant-exterior.jpg', 'icon' => 'document', 'visual' => 'photo'],
            ['title' => 'Group Companies', 'description' => 'Discover the Fuji Seat Group network across Asia.', 'route' => 'about.group-companies', 'icon' => 'network', 'visual' => 'network'],
            ['title' => 'Company Milestones', 'description' => 'Key moments from our early beginnings through 2024.', 'route' => 'about.company-history', 'image' => 'plant-suryacipta-2.jpg', 'icon' => 'milestone', 'visual' => 'milestones'],
            ['title' => 'Certificates', 'description' => 'Quality, environmental, and safety records in the company profile.', 'route' => 'about.certificates', 'icon' => 'shield', 'visual' => 'certificates'],
            ['title' => 'Plants & Facilities', 'description' => 'Explore the four Indonesian plants and their capabilities.', 'route' => 'about.plants', 'image' => 'hero-kiic.jpg', 'icon' => 'factory', 'visual' => 'photo'],
            ['title' => 'Our Products', 'description' => 'Seats and components for seven vehicle groups.', 'route' => 'about.products', 'image' => 'seat-interior.jpg', 'icon' => 'seat', 'visual' => 'photo'],
            ['title' => 'Our Customers', 'description' => 'Supporting ADM and TMMIN vehicle programs.', 'route' => 'about.customers', 'icon' => 'people', 'visual' => 'customers'],
            ['title' => 'Contact Us', 'description' => 'Find contact details for our offices and plants.', 'route' => 'about.contact', 'image' => 'hero-sunter.jpg', 'icon' => 'mail', 'visual' => 'photo'],
        ];
    @endphp

    <svg class="about-overview-symbols" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="0" height="0">
        <defs>
            <symbol id="about-icon-document" viewBox="0 0 24 24"><path d="M6 3h8l4 4v14H6zM14 3v5h4M9 12h6m-6 4h6"/><path d="M3 6v15h12"/></symbol>
            <symbol id="about-icon-network" viewBox="0 0 24 24"><circle cx="12" cy="5" r="3"/><circle cx="5" cy="18" r="3"/><circle cx="19" cy="18" r="3"/><path d="M12 8v4m-7 3v-3h14v3"/></symbol>
            <symbol id="about-icon-milestone" viewBox="0 0 24 24"><path d="M5 21V3m0 1h13l-3 4 3 4H5M2 21h7m4 0h8m-4-4v4"/></symbol>
            <symbol id="about-icon-shield" viewBox="0 0 24 24"><path d="m12 2 8 3v6c0 5-4 8-8 11-4-3-8-6-8-11V5z"/><path d="m8 12 3 3 5-6"/></symbol>
            <symbol id="about-icon-factory" viewBox="0 0 24 24"><path d="M3 21V5h4v9l6-4v4l8-4v11zM3 5V2h4v3M7 18h1m4 0h1m4 0h1"/></symbol>
            <symbol id="about-icon-seat" viewBox="0 0 24 24"><rect x="5" y="2" width="6" height="4" rx="2"/><path d="m5 8 1 9h12a3 3 0 0 1 3 3H5a3 3 0 0 1-3-3V9a2 2 0 0 1 3-1Zm5-1 2 7h7M6 20v2m12-2v2"/></symbol>
            <symbol id="about-icon-people" viewBox="0 0 24 24"><circle cx="9" cy="7" r="3"/><path d="M2 21v-3a7 7 0 0 1 14 0v3zM17 4a3 3 0 0 1 0 6m2 4a6 6 0 0 1 3 5v2h-3"/></symbol>
            <symbol id="about-icon-mail" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m3 6 9 7 9-7M3 19l6-7m12 7-6-7"/></symbol>
            <symbol id="about-icon-globe" viewBox="0 0 120 120"><circle cx="60" cy="60" r="48"/><ellipse cx="60" cy="60" rx="24" ry="48"/><ellipse cx="60" cy="60" rx="48" ry="20"/><path d="M12 60h96M60 12v96"/></symbol>
        </defs>
    </svg>

    <nav class="about-overview-nav" aria-label="About Us sections">
        <div class="container">
            <a href="{{ route('about') }}" aria-current="page">Overview</a>
            @foreach ($journeySections as $section)
                <a href="{{ route($section['route']) }}">{{ $section['title'] }}</a>
            @endforeach
        </div>
    </nav>

    <section class="about-overview-hero" aria-labelledby="about-heading">
        <div class="about-overview-hero-media">
            <img class="about-overview-seat" src="{{ asset('assets/images/seat-interior.jpg') }}" alt="Fuji Seat automotive seats with black upholstery and red stitching" width="741" height="359" fetchpriority="high">
            <img class="about-overview-production" src="{{ asset('assets/images/production-assembly.jpg') }}" alt="" width="1934" height="970">
        </div>
        <div class="container about-overview-hero-inner">
            <nav class="about-overview-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a><span aria-hidden="true">&rsaquo;</span>
                <a href="{{ route('about') }}">About Us</a><span aria-hidden="true">&rsaquo;</span>
                <span aria-current="page">Overview</span>
            </nav>
            <div class="about-overview-hero-main">
                <div class="about-overview-hero-copy">
                    <span class="section-kicker">ABOUT US</span>
                    <h1 id="about-heading">PT. FUJI SEAT<br><span>INDONESIA</span></h1>
                    <p class="about-overview-tagline">{{ config('site.tagline') }}</p>
                    <p class="about-overview-intro">PT. Fuji Seat Indonesia manufactures automotive seats for PT. Astra Daihatsu Motor (ADM) and PT. Toyota Motor Manufacturing Indonesia (TMMIN), bringing people, precision, and care to every seat.</p>
                    <dl class="about-overview-stats">
                        <div>
                            <dt>Employees</dt>
                            <dd><svg aria-hidden="true"><use href="#about-icon-people"/></svg>2,000+</dd>
                        </div>
                        <div>
                            <dt>Seats per day</dt>
                            <dd><svg aria-hidden="true"><use href="#about-icon-seat"/></svg>2,000+</dd>
                        </div>
                        <div>
                            <dt>Plants in Indonesia</dt>
                            <dd><svg aria-hidden="true"><use href="#about-icon-factory"/></svg>Sunter, KIIC, <br>Suryacipta 1 &amp; 2</dd>
                        </div>
                    </dl>
                    <p class="about-overview-data-note">Workforce and capacity figures from our 2022 company profile.</p>
                </div>
                <aside class="about-overview-purpose" aria-label="Our purpose">
                    <span class="about-overview-purpose-label"><span aria-hidden="true">&#9671;</span> OUR PURPOSE</span>
                    <blockquote>&ldquo;Comfort,<br>Safety,<br>Quality<br>for a Better<br>Journey&rdquo;</blockquote>
                    <div class="about-overview-purpose-signature"><strong>FUJI SEAT</strong><span>IDEAS FOR ALL 2</span></div>
                </aside>
            </div>
        </div>
    </section>

    <section class="about-overview-journey" id="about-sections" aria-labelledby="sections-heading">
        <div class="container">
            <div class="about-overview-section-heading">
                <div><span class="section-kicker">EXPLORE OUR JOURNEY</span><h2 id="sections-heading">Explore Our Journey</h2></div>
                <p>Explore who we are &mdash; from our philosophy and company milestones to our products, facilities, and commitment to quality.</p>
            </div>
            <div class="about-journey-grid">
                @foreach ($journeySections as $section)
                    <a class="about-journey-card" href="{{ route($section['route']).($section['fragment'] ?? '') }}">
                        <div class="about-journey-visual about-journey-visual-{{ $section['visual'] }}">
                            @if (isset($section['image']))
                                <img src="{{ asset('assets/images/'.$section['image']) }}" alt="" loading="lazy" decoding="async">
                            @endif
                            @if ($section['visual'] === 'network')
                                <svg class="about-network-globe" aria-hidden="true" viewBox="0 0 120 120"><use href="#about-icon-globe"/></svg>
                                <div class="about-network-label" aria-hidden="true"><span>A CONNECTED GROUP</span><strong>FUJI SEAT<br>GROUP</strong></div>
                            @elseif ($section['visual'] === 'milestones')
                                <div class="about-milestones-preview" aria-hidden="true"><span>2005</span><span>2011</span><span>2024</span></div>
                            @elseif ($section['visual'] === 'certificates')
                                <img src="{{ asset('assets/images/iso-9001.jpg') }}" alt="ISO 9001" width="88" height="88" loading="lazy">
                                <img src="{{ asset('assets/images/iso-14001.jpg') }}" alt="ISO 14001" width="88" height="88" loading="lazy">
                            @elseif ($section['visual'] === 'customers')
                                <div class="about-customer-brand"><strong>DAIHATSU</strong><span>PT. Astra Daihatsu Motor</span></div>
                                <span class="about-customer-divider" aria-hidden="true"></span>
                                <div class="about-customer-brand"><strong>TOYOTA</strong><span>PT. Toyota Motor<br>Manufacturing Indonesia</span></div>
                            @endif
                            <span class="about-journey-number" aria-hidden="true">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="about-journey-copy">
                            <span class="about-journey-icon"><svg aria-hidden="true"><use href="#about-icon-{{ $section['icon'] }}"/></svg></span>
                            <h3>{{ $section['title'] }}</h3>
                            <p>{{ $section['description'] }}</p>
                            <span class="about-journey-arrow" aria-hidden="true">&rarr;</span>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="about-overview-related">
                <span>More about Fuji Seat</span>
                <a href="{{ route('about.philosophy') }}">Our Philosophy <span aria-hidden="true">&rarr;</span></a>
                <a href="{{ route('about.basic-policy') }}">Basic Policy <span aria-hidden="true">&rarr;</span></a>
                <a href="{{ route('about.manufacturing') }}">Manufacturing <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </section>

    <section class="about-overview-connect" aria-labelledby="connect-heading">
        <img src="{{ asset('assets/images/production-team.jpg') }}" alt="" width="1400" height="700" loading="lazy">
        <div class="container about-overview-connect-inner">
            <div>
                <span class="section-kicker">TOGETHER FOR A BETTER MOBILITY</span>
                <h2 id="connect-heading">Let's Build a Better Tomorrow</h2>
                <p>Through people, technology, and innovation, we continue to deliver automotive seating solutions that support comfort, safety, and a better driving experience.</p>
            </div>
            <a class="button button-white" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">&rarr;</span></a>
        </div>
    </section>
@endsection
