@extends('layouts.site')

@section('title', 'Our Products')
@section('body-class', 'products-page')

@section('content')
    @php
        $products = config('site.products');
        $lineup = config('site.product_lineup');
        $categories = config('site.product_categories');
        $featuredIndex = 1;
        $featuredProduct = $products[$featuredIndex];
        $productTargets = ['Xenia' => 1, 'Avanza' => 1, 'Terios' => 2, 'Rush' => 2, 'Gran Max' => 3, 'Luxio' => 4, 'Ayla & Agya' => 5, 'Calya & Sigra' => 6, 'New Terios / Rush' => 2, 'New Calya' => 6, 'New Avanza / Xenia' => 1, 'Rocky & Raize' => 7, 'New Ayla / Agya' => 5, '2017 - New Terios / Rush' => 2, '2019 - Calya' => 6, '2021 - Rocky / Raize' => 7, '2021 - New Avanza / Xenia' => 1, '2023 - New Ayla / Agya' => 5];
        $productFacts = ['Xenia' => ['launch' => 'November 2005', 'type' => 'Passenger'], 'Avanza' => ['launch' => 'November 2005', 'type' => 'Passenger'], 'Terios' => ['launch' => 'November 2006', 'type' => 'Passenger'], 'Rush' => ['launch' => 'November 2006', 'type' => 'Passenger'], 'Gran Max' => ['launch' => 'November 2007', 'type' => 'Commercial / MPV'], 'Luxio' => ['launch' => 'January 2009', 'type' => 'Passenger / MPV'], 'Ayla & Agya' => ['launch' => 'December 2013', 'type' => 'Passenger'], 'Calya & Sigra' => ['launch' => 'July 2016', 'type' => 'Passenger / MPV'], 'New Terios / Rush' => ['launch' => 'December 2017', 'type' => 'Passenger'], 'New Calya' => ['launch' => 'November 2019', 'type' => 'Passenger / MPV'], 'New Avanza / Xenia' => ['launch' => 'November 2021', 'type' => 'Passenger'], 'Rocky & Raize' => ['launch' => 'March 2021', 'type' => 'Passenger'], 'New Ayla / Agya' => ['launch' => 'September 2023', 'type' => 'Passenger']];
    @endphp

    <div class="products-content">
        <section class="products-heading">
            <div class="container">
                <nav class="page-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span aria-hidden="true">&rsaquo;</span>
                    <span aria-current="page">Products</span>
                </nav>
                <div class="products-heading-row">
                    <div>
                        <span class="section-kicker">{{ config('site.company') }}</span>
                        <h1>Our Products</h1>
                    </div>
                    <a class="text-link" href="#product-range" data-show-all-products>View all products <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </section>

        <section class="container products-hero" aria-labelledby="products-hero-heading">
            <div class="products-hero-copy">
                <span class="section-kicker">CRAFTED IN MOTION</span>
                <h2 id="products-hero-heading">Seating for the<br><em>journey ahead.</em></h2>
                <p>Explore the automotive seats and interior components produced by PT. Fuji Seat Indonesia for various vehicle models and manufacturing needs.</p>
                <div class="products-hero-actions">
                    <a class="button button-primary" href="#product-range" data-show-all-products>Explore Products <span aria-hidden="true">&rarr;</span></a>
                    <a class="button button-secondary" href="{{ asset('assets/company-profile-fuji-seat-indonesia.pdf') }}" target="_blank" rel="noopener noreferrer"><span aria-hidden="true">&#8599;</span> Company Profile PDF</a>
                </div>
            </div>
            <figure class="products-hero-media">
                <img src="{{ asset('assets/images/seat-interior.jpg') }}" alt="Black automotive seats with red stitching inside a vehicle" width="741" height="359" fetchpriority="high">
                <figcaption><span>COMFORT &bull; SAFETY &bull; QUALITY</span><span aria-hidden="true">FOR A BETTER JOURNEY</span></figcaption>
                <div class="products-hero-promise"><span>OUR COMMITMENT</span><strong>Comfort, safety<br>and quality for<br>a better journey.</strong></div>
            </figure>
        </section>

        <section class="products-feature-section" id="featured-product" data-product-gallery data-initial-product="{{ $featuredIndex }}" role="region" aria-roledescription="carousel" aria-label="Featured vehicle seating">
            <div class="container product-showcase" data-product-reveal>
                <div class="product-visual">
                    <div class="product-gallery-frame">
                        <span class="products-image-label">THE SEATING COLLECTION</span>
                        @foreach ($products as $product)
                            <img class="product-gallery-image {{ $loop->index === $featuredIndex ? 'is-active' : '' }}"
                                data-gallery-image
                                data-product-name="{{ $product['name'] }}"
                                data-product-detail="{{ $product['detail'] }}"
                                data-product-target="{{ $productTargets[$product['name']] ?? 1 }}"
                                data-product-launch="{{ $product['massProduction'] ?? $productFacts[$product['name']]['launch'] }}"
                                data-product-vehicle-type="{{ $product['vehicleType'] ?? $productFacts[$product['name']]['type'] }}"
                                data-product-company="{{ $product['company'] ?? 'Fuji Seat Indonesia' }}"
                                data-product-production-status="{{ $product['productionStatus'] ?? 'Mass production' }}"
                                data-product-rotation-sprite="{{ asset('assets/images/'.$product['rotationSprite']) }}"
                                aria-hidden="{{ $loop->index === $featuredIndex ? 'false' : 'true' }}"
                                src="{{ asset('assets/images/'.$product['image']) }}"
                                alt="{{ $product['alt'] ?? $product['name'].' automotive seat assemblies' }}"
                                width="{{ $product['width'] ?? 350 }}" height="{{ $product['height'] ?? 280 }}" loading="lazy" decoding="async">
                        @endforeach
                        <div class="product-360-viewer" data-product-360 hidden tabindex="0" role="img" aria-label="Illustrative automotive seat, rotatable 360 degrees. Drag or use left and right arrow keys to rotate."></div>
                        <span class="product-360-hint" data-product-360-hint hidden>Drag to rotate 360&deg; &middot; Illustrative seat view</span>
                        <span class="products-image-caption">Seat assembly <span aria-hidden="true">&bull;</span> Fuji Seat Indonesia</span>
                    </div>
                    <div class="product-thumbnails" data-gallery-controls hidden aria-label="Choose a featured product">
                        @foreach ($products as $product)
                            <button type="button" data-gallery-dot="{{ $loop->index }}"
                                class="{{ $loop->index === $featuredIndex ? 'is-active' : '' }}"
                                aria-pressed="{{ $loop->index === $featuredIndex ? 'true' : 'false' }}"
                                aria-label="Show {{ $product['name'] }} seats">
                                <img src="{{ asset('assets/images/'.($product['thumbnail'] ?? $product['image'])) }}" alt="" width="{{ $product['width'] ?? 350 }}" height="{{ $product['height'] ?? 280 }}" loading="lazy" decoding="async">
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="product-feature-copy">
                    <span class="section-kicker">OUR PRODUCTS</span>
                    <h2 data-product-name>{{ $featuredProduct['name'] }}</h2>
                    <p class="products-feature-summary" data-product-detail>{{ $featuredProduct['description'] ?? $featuredProduct['detail'] }}</p>
                    <div class="products-milestone"><div class="products-facts"><div><span>Mass production</span><strong data-product-fact="launch">{{ $featuredProduct['massProduction'] ?? $productFacts[$featuredProduct['name']]['launch'] }}</strong></div><div><span>Vehicle type</span><strong data-product-fact="vehicle-type">{{ $featuredProduct['vehicleType'] ?? $productFacts[$featuredProduct['name']]['type'] }}</strong></div><div><span>Company</span><strong data-product-fact="company">{{ $featuredProduct['company'] ?? 'Fuji Seat Indonesia' }}</strong></div><div><span>Production status</span><strong data-product-fact="production-status">{{ $featuredProduct['productionStatus'] ?? 'Mass production' }}</strong></div></div></div>
                    <a class="button button-primary products-feature-link" data-product-link href="#product-1">View product <span aria-hidden="true">&rarr;</span></a>
                    <div class="product-gallery-controls" data-gallery-controls hidden>
                        <span class="product-position"><strong data-product-current>{{ str_pad((string) ($featuredIndex + 1), 2, '0', STR_PAD_LEFT) }}</strong><span aria-hidden="true"> / </span><span>{{ str_pad((string) count($products), 2, '0', STR_PAD_LEFT) }}</span></span>
                        <div class="products-gallery-buttons">
                            <button type="button" data-gallery-previous aria-label="Previous product"><span aria-hidden="true">&larr;</span></button>
                            <button type="button" data-gallery-next aria-label="Next product"><span aria-hidden="true">&rarr;</span></button>
                            <button class="gallery-pause" type="button" data-gallery-pause aria-pressed="false" aria-label="Pause automatic product slideshow">Pause</button>
                        </div>
                    </div>
                    <span class="products-sr-only" data-gallery-announcement aria-live="polite"></span>
                </div>
            </div>
        </section>

        <div class="products-catalog" data-product-catalog>
            <section class="container products-range" id="product-range" aria-labelledby="product-range-heading">
                <div class="products-section-heading" data-product-reveal>
                    <div><span class="section-kicker">VEHICLE LINEUP</span><h2 id="product-range-heading">Our Products for Various Vehicle Models</h2></div>
                    <p>High-quality automotive seats and interior components for a wide range of vehicle models.</p>
                </div>
                <div class="products-filter-bar">
                    <div class="product-filters" role="group" aria-label="Filter products and categories" hidden>
                        @foreach (['all' => 'All', 'passenger' => 'Passenger Vehicle', 'commercial' => 'Commercial Vehicle', 'seat-assy' => 'Seat Assy', 'components' => 'Components', 'interior' => 'Interior Parts'] as $filter => $label)
                            <button type="button" data-product-filter="{{ $filter }}" class="{{ $loop->first ? 'is-active' : '' }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}" aria-controls="vehicle-products category-products">{{ $label }}</button>
                        @endforeach
                    </div>
                    <p class="products-result-count" data-filter-count role="status">{{ count($lineup) }} vehicle programs &middot; {{ count($categories) }} categories</p>
                </div>
                <div class="product-grid" id="vehicle-products" data-catalog-group>
                    @foreach ($lineup as $product)
                        <article class="product-card" id="product-{{ $loop->iteration }}" data-catalog-item data-product-category="seat-assy {{ $product['vehicle_type'] }}" data-product-reveal>
                            <div class="products-card-heading">
                                <span class="product-number">{{ $product['year'] }}</span>
                                <span class="products-card-type">START OF PRODUCTION</span>
                            </div>
                            <h3>{{ $product['name'] }}</h3>
                            <div class="product-image"><img src="{{ asset('assets/images/'.$product['image']) }}" alt="Vehicle from the {{ $product['name'] }} seating program" width="800" height="520" loading="lazy" decoding="async"></div>
                            <p data-item-description>{{ $product['detail'] }}</p>
                            <a class="products-card-link" data-item-details href="{{ asset('assets/images/'.$product['image']) }}" aria-label="View details of {{ $product['name'] }}">View Details <span aria-hidden="true">&rarr;</span></a>
                        </article>
                    @endforeach
                    <article class="product-support-card" aria-label="Supporting various mobility needs">
                        <span class="section-kicker">FUJI SEAT INDONESIA</span>
                        <h3>Supporting<br>Various Mobility Needs</h3>
                        <p>Quality seats for a safer and more comfortable driving experience.</p>
                    </article>
                </div>
            </section>

            <section class="container products-categories" id="product-categories" aria-labelledby="components-heading" data-catalog-group>
                <div class="products-section-heading" data-product-reveal>
                    <div><span class="section-kicker">BEYOND THE FINISHED SEAT</span><h2 id="components-heading">Every component matters.</h2></div>
                    <p>Explore seat products, interior components, upholstery, and frame-related manufacturing parts.</p>
                </div>
                <div class="components-grid" id="category-products">
                    @foreach ($categories as $category)
                        <article class="component-card" data-catalog-item data-product-category="{{ $category['filters'] }}" data-product-reveal>
                            <div class="component-image"><img src="{{ asset('assets/images/'.$category['image']) }}" alt="{{ $category['alt'] }}" width="{{ $category['width'] }}" height="{{ $category['height'] }}" loading="lazy" decoding="async"></div>
                            <div class="products-category-copy">
                                <span class="products-category-number">CATEGORY / 0{{ $loop->iteration }}</span>
                                <h3>{{ $category['name'] }}</h3>
                                <p data-item-description>{{ $category['detail'] }}</p>
                                <a class="products-card-link" data-item-details href="{{ asset('assets/images/'.$category['image']) }}" aria-label="Learn more about {{ $category['name'] }}">Learn More <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </div>

        <section class="container products-contact-section" aria-labelledby="products-contact-heading">
            <div class="products-contact-banner" data-product-reveal>
                <div>
                    <span class="section-kicker">LET'S TALK ABOUT YOUR NEXT PROJECT</span>
                    <h2 id="products-contact-heading">Better journeys start<br>with a conversation.</h2>
                    <p>Contact us to learn how our seating solutions can support your next project.</p>
                </div>
                <div class="products-contact-actions">
                    <a class="button button-white" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">&rarr;</span></a>
                    <a class="products-profile-link" href="{{ asset('assets/company-profile-fuji-seat-indonesia.pdf') }}" target="_blank" rel="noopener noreferrer">Company Profile <span>PDF <span aria-hidden="true">&nearr;</span></span><span class="products-sr-only"> (opens in a new tab)</span></a>
                </div>
            </div>
        </section>

        <dialog class="products-detail-dialog" data-product-dialog aria-labelledby="product-dialog-title" aria-describedby="product-dialog-description">
            <button class="products-dialog-close" type="button" data-dialog-close aria-label="Close product details" autofocus><span aria-hidden="true">&times;</span></button>
            <div class="products-dialog-image"><img data-dialog-image alt="" width="350" height="280"></div>
            <div class="products-dialog-copy">
                <span class="section-kicker">FUJI SEAT INDONESIA</span>
                <h2 id="product-dialog-title" data-dialog-title></h2>
                <p id="product-dialog-description" data-dialog-description></p>
                <div class="products-dialog-actions">
                    <a class="button button-primary" href="{{ route('contact') }}">Contact Us <span aria-hidden="true">&rarr;</span></a>
                    <a class="text-link" data-dialog-image-link href="{{ asset('assets/images/'.$featuredProduct['image']) }}" target="_blank" rel="noopener noreferrer">View full image <span aria-hidden="true">&nearr;</span><span class="products-sr-only"> (opens in a new tab)</span></a>
                </div>
            </div>
        </dialog>
    </div>
@endsection
