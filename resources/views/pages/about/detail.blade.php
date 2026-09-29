@extends('layouts.site')

@section('title', $page['title'])
@section('body-class', 'about-page about-detail-page')

@section('content')
    <section class="about-detail-hero @if ($pageKey === 'group-companies') about-group-hero @elseif ($pageKey === 'products') about-products-hero @elseif ($pageKey === 'milestones') about-milestones-hero @endif" aria-labelledby="about-detail-heading">
        <img src="{{ asset('assets/images/'.$page['image']) }}" alt="{{ $page['image_alt'] }}" fetchpriority="high">
        <div class="about-detail-hero-shade"></div>
        <div class="container about-detail-hero-content">
            <nav class="about-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">›</span><a href="{{ route('about') }}">About Us</a><span aria-hidden="true">›</span><span aria-current="page">{{ $page['title'] }}</span></nav>
            <nav class="about-page-sections-nav" aria-label="About Us sections">
                @foreach (config('about.sections') as $section)
                    <a href="{{ route($section['route']) }}" @if ($activeSection === $section['route']) aria-current="page" @endif>{{ $section['title'] }}</a>
                @endforeach
            </nav>
            <div class="about-detail-hero-copy">
                <span class="about-detail-eyebrow">{{ $page['eyebrow'] }}</span>
                <h1 id="about-detail-heading">@if ($pageKey === 'group-companies')Group <span class="about-group-heading-accent">Companies</span>@elseif ($pageKey === 'products')OUR <span class="about-group-heading-accent">PRODUCTS</span>@elseif ($pageKey === 'milestones')Company <span class="about-group-heading-accent">Milestones</span>@else{{ $page['headline'] }}@endif</h1>
                <p>{{ $page['description'] }}</p>
            </div>
            @if (!empty($page['quote']))
                <aside class="about-network-quote @if ($pageKey === 'products') about-products-quote @elseif ($pageKey === 'milestones') about-milestones-quote @endif"><span class="about-detail-eyebrow">{{ in_array($pageKey, ['products', 'milestones'], true) ? ($pageKey === 'products' ? 'OUR COMMITMENT' : 'OUR JOURNEY') : 'OUR GLOBAL NETWORK' }}</span><blockquote>“{{ $page['quote'] }}”</blockquote><strong>{{ $pageKey === 'group-companies' ? 'FUJI SEAT GROUP' : 'FUJI SEAT' }}</strong>@if ($pageKey === 'products')<small>IDEAS FOR ALL 2</small>@endif</aside>
            @endif
        </div>
    </section>

    <section class="about-detail-content @if ($pageKey === 'products') about-products-content @elseif ($pageKey === 'milestones') about-milestones-content @endif">
        @if ($pageKey === 'products')
            <section class="about-products-vehicle-section" aria-labelledby="about-vehicle-heading">
                <div class="container">
                    <div class="about-products-section-heading"><div><span class="about-detail-eyebrow">VEHICLE LINEUP</span><h2 id="about-vehicle-heading">{{ $page['vehicle_heading'] }}</h2></div><p>{{ $page['vehicle_intro'] }}</p></div>
                    <div class="about-products-vehicle-grid">
                        @foreach ($page['cards'] as $card)
                            <a class="about-products-vehicle-card" href="{{ route('products') }}" aria-label="{{ $card['title'] }} - view product catalog">
                                <h3>{{ $card['title'] }}</h3><div class="about-products-vehicle-image"><img src="{{ asset('assets/images/'.$card['image']) }}" alt="{{ $card['alt'] }}" loading="lazy"></div>
                                <span class="about-products-vehicle-arrow" aria-hidden="true">&rarr;</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="about-products-seat-section" aria-labelledby="about-seat-heading">
                <div class="container about-products-split">
                    <div class="about-products-copy"><span class="about-detail-eyebrow">SEAT ASSY</span><h2 id="about-seat-heading">{{ $page['seat_heading'] }}</h2><p>{{ $page['seat_intro'] }}</p></div>
                    <div class="about-products-seat-grid">
                        @foreach ($page['seat_assemblies'] as $seat)
                            <figure><div><img src="{{ asset('assets/images/'.$seat['image']) }}" alt="{{ $seat['alt'] }}" loading="lazy"></div><figcaption>{{ $seat['title'] }}</figcaption></figure>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="about-products-parts-section" aria-labelledby="about-parts-heading">
                <div class="container about-products-split">
                    <div class="about-products-copy"><span class="about-detail-eyebrow">SINGLE / ASSY PARTS</span><h2 id="about-parts-heading">{{ $page['parts_heading'] }}</h2><p>{{ $page['parts_intro'] }}</p></div>
                    <div class="about-products-parts-grid">
                        @foreach ($page['parts'] as $part)
                            <article><div class="about-products-part-image"><img src="{{ asset('assets/images/'.$part['image']) }}" alt="{{ $part['alt'] }}" loading="lazy"></div><div class="about-products-part-copy"><h3>{{ $part['title'] }}</h3><p>{{ $part['text'] }}</p><a href="{{ route('products') }}#category-products">Learn More <span aria-hidden="true">&rarr;</span></a></div></article>
                        @endforeach
                    </div>
                </div>
            </section>
        @elseif ($pageKey === 'milestones')
            <div class="container milestone-page-content">
                <section class="milestone-history" aria-labelledby="milestone-history-heading">
                    <div class="milestone-section-heading">
                        <div><span class="section-kicker">A TIMELINE OF PROGRESS</span><h2 id="milestone-history-heading">From a Strong Foundation to a Brighter Future</h2><p>Key milestones that mark our growth, expansion, and contribution to Indonesia's automotive industry.</p></div>
                        <aside><span>FUJI SEAT INDONESIA</span><strong>Nearly two decades<br>of continuous growth</strong></aside>
                    </div>
                    <div class="milestone-timeline-grid">
                        @foreach ($page['milestone_cards'] as $milestone)
                            <article class="milestone-card">
                                <strong class="milestone-year">{{ $milestone['year'] }}</strong>
                                <img src="{{ asset('assets/images/'.$milestone['image']) }}" alt="{{ $milestone['alt'] }}" loading="lazy">
                                <h3>{{ $milestone['title'] }}</h3>
                                <p>{{ $milestone['text'] }}</p>
                            </article>
                        @endforeach
                    </div>
                    <div class="milestone-timeline-track" aria-hidden="true">
                        @foreach ($page['milestone_cards'] as $milestone)
                            <span></span>
                        @endforeach
                    </div>
                </section>

                <section class="milestone-program-section" aria-labelledby="milestone-program-heading">
                    <div class="milestone-program-intro"><span class="section-kicker">OUR PRODUCT MILESTONES</span><h2 id="milestone-program-heading">Delivering Seats for Indonesia's Leading Vehicles</h2><p>Supporting Indonesia's automotive brands with high-quality seats and interior components.</p></div>
                    <div class="milestone-program-grid">
                        @foreach ($page['product_milestones'] as $program)
                            <article class="milestone-program-card"><img src="{{ asset('assets/images/'.$program['image']) }}" alt="{{ $program['alt'] }}" loading="lazy"><div><h3>{{ $program['name'] }}</h3><p>{{ $program['detail'] }}</p></div></article>
                        @endforeach
                    </div>
                </section>
            </div>
        @else
        <div class="container">
            @if (!empty($page['facts']))
                <div class="about-detail-facts">
                    @foreach ($page['facts'] as $fact)
                        <article><strong>{{ $fact['value'] }}</strong><span>{{ $fact['label'] }}</span></article>
                    @endforeach
                </div>
            @endif

            @if (!empty($page['cards']))
                <div class="about-detail-cards">
                    @foreach ($page['cards'] as $card)
                        <article class="about-detail-card">
                            <div class="about-detail-card-image"><img src="{{ asset('assets/images/'.$card['image']) }}" alt="{{ $card['alt'] }}" loading="lazy"></div>
                            <div class="about-detail-card-copy"><h2>{{ $card['title'] }}</h2><p>{{ $card['text'] }}</p></div>
                        </article>
                    @endforeach
                </div>
            @endif

            @if (!empty($page['network_sections']))
                <div class="about-network-sections">
                    @foreach ($page['network_sections'] as $networkSection)
                        <section class="about-network-region">
                            <div class="about-network-region-intro">
                                <span class="about-detail-eyebrow">{{ $networkSection['eyebrow'] }}</span>
                                <h2>@if (str_contains($networkSection['title'], '(Japan)')){{ str_replace(' (Japan)', '', $networkSection['title']) }} <span class="about-network-heading-accent">(Japan)</span>@else{{ str_replace(' (Overseas)', '', $networkSection['title']) }} <span class="about-network-heading-accent">(Overseas)</span>@endif</h2>
                                <p>{{ $networkSection['description'] }}</p>
                                <figure class="about-network-map"><span aria-hidden="true">{{ str_contains($networkSection['title'], '(Japan)') ? 'JAPAN' : 'ASIA' }}</span><img src="{{ asset('assets/images/'.$networkSection['map']) }}" alt="{{ $networkSection['map_alt'] }}" loading="lazy"></figure>
                            </div>
                            @if (!empty($networkSection['locations']))
                                <div class="about-network-location-grid">
                                    @foreach ($networkSection['locations'] as $index => $location)
                                        <article class="about-network-location-card">
                                            <span class="about-network-number">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                            <span class="about-network-factory" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 21V9l6 3V8l6 4V4h5v17H3Z"/><path d="M6 17h2m3 0h2m3 0h2m-2-9h2"/></svg></span>
                                            <h3>{{ $location['name'] }}</h3>
                                            <p><span aria-hidden="true">&#9679;</span>{{ $location['location'] }}</p>
                                        </article>
                                    @endforeach
                                </div>
                            @endif
                            @if (!empty($networkSection['countries']))
                                <div class="about-network-country-grid">
                                    @foreach ($networkSection['countries'] as $country)
                                        <article class="about-network-country-card">
                                            <header><span class="about-network-flag about-network-flag-{{ strtolower($country['code']) }}" aria-hidden="true"></span><h3>{{ $country['title'] }}</h3></header>
                                            <p class="about-network-company">{{ $country['company'] }}</p>
                                            <ul>@foreach ($country['locations'] as $location)<li><strong>{{ $location['name'] }}</strong><span>{{ $location['location'] }}</span></li>@endforeach</ul>
                                        </article>
                                    @endforeach
                                </div>
                            @endif
                        </section>
                    @endforeach
                </div>
            @endif

            @if (!empty($page['groups']))
                <div class="about-detail-groups">
                    @foreach ($page['groups'] as $group)
                        <section class="about-detail-group"><div><span class="about-detail-eyebrow">FUJI SEAT GROUP</span><h2>{{ $group['title'] }}</h2><p>{{ $group['description'] }}</p></div><ul>@foreach ($group['items'] as $item)<li>{{ $item }}</li>@endforeach</ul></section>
                    @endforeach
                </div>
            @endif

            @if (!empty($page['timeline']))
                <div class="about-detail-timeline">
                    @foreach ($page['timeline'] as $milestone)
                        <article><h2>{{ $milestone['year'] }}</h2><ul>@foreach ($milestone['events'] as $event)<li>{{ $event }}</li>@endforeach</ul></article>
                    @endforeach
                </div>
            @endif

            @if (!empty($page['offices']))
                <div class="about-detail-offices">
                    @foreach ($page['offices'] as $office)
                        <article><span class="about-detail-eyebrow">PT. FUJI SEAT INDONESIA</span><h2>{{ $office['title'] }}</h2><p>{{ $office['address'] }}</p><dl><div><dt>Telephone</dt><dd><a href="tel:{{ preg_replace('/\s+/', '', $office['phone']) }}">{{ $office['phone'] }}</a></dd></div><div><dt>Fax</dt><dd>{{ $office['fax'] }}</dd></div></dl></article>
                    @endforeach
                </div>
            @endif

            @if (!empty($page['body_title']))
                <section class="about-detail-copy"><span class="about-detail-eyebrow">FUJI SEAT INDONESIA</span><h2>{{ $page['body_title'] }}</h2>@foreach ($page['paragraphs'] as $paragraph)<p>{{ $paragraph }}</p>@endforeach</section>
            @endif

            @if (!empty($page['note']))
                <p class="about-detail-note">{{ $page['note'] }}</p>
            @endif

            <div class="about-detail-footer"><a class="button button-primary" href="{{ route('contact') }}">Talk to our team <span aria-hidden="true">&rarr;</span></a><a class="button button-outline" href="{{ route('about') }}">Return to About Us overview <span aria-hidden="true">&rarr;</span></a></div>
        </div>
        @endif
    </section>
    @if ($pageKey === 'milestones')
        <section class="milestone-bottom-cta" aria-labelledby="milestone-cta-heading">
            <div class="container"><div><span class="section-kicker">TOGETHER FOR A BETTER MOBILITY</span><h2 id="milestone-cta-heading">Let's Build a Better Tomorrow</h2><p>Through people, technology, and innovation, we continue to deliver automotive seating solutions that support comfort, safety, and a better driving experience.</p></div><a class="button button-primary" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">&rarr;</span></a></div>
        </section>
    @endif
@endsection
