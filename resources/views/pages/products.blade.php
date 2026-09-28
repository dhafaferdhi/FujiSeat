@extends('layouts.site')

@section('title', 'Products')

@section('content')
    <section class="detail-page-header">
        <div class="container">
            <nav class="page-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">Products</span></nav>
            <div class="detail-title-row">
                <div><span class="section-kicker">{{ config('site.company') }}</span><h1>Our Products</h1></div>
                <a class="text-link" href="#product-range">View all products <span aria-hidden="true">↓</span></a>
            </div>
        </div>
    </section>
    <section class="product-gallery-section" data-product-gallery aria-label="Product gallery">
        <div class="container product-showcase">
            <div class="product-visual">
                <div class="product-gallery-frame">
                    @foreach (config('site.products') as $product)
                        <img class="product-gallery-image {{ $loop->first ? 'is-active' : '' }}" data-gallery-image data-product-name="{{ $product['name'] }}" data-product-detail="{{ $product['detail'] }}" src="{{ asset('assets/images/'.$product['image']) }}" alt="{{ $product['name'] }} car seats" width="350" height="280">
                    @endforeach
                </div>
                <div class="product-thumbnails">
                    @foreach (config('site.products') as $product)
                        <button type="button" data-gallery-dot="{{ $loop->index }}" class="{{ $loop->first ? 'is-active' : '' }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}" aria-label="Show {{ $product['name'] }} seats"><img src="{{ asset('assets/images/'.$product['image']) }}" alt="" width="350" height="280"></button>
                    @endforeach
                </div>
            </div>
            <div class="product-feature-copy">
                <span class="product-feature-label">Our Products</span>
                <h2 data-product-name>{{ config('site.products.0.name') }}</h2>
                <p data-product-detail>{{ config('site.products.0.detail') }}</p>
                <a class="text-link" data-product-link href="#product-1">View product <span aria-hidden="true">↗</span></a>
                <div class="product-gallery-controls">
                    <span class="product-position"><strong data-product-current>01</strong> / {{ str_pad((string) count(config('site.products')), 2, '0', STR_PAD_LEFT) }}</span>
                    <button type="button" data-gallery-previous aria-label="Previous product"><span aria-hidden="true">←</span></button>
                    <button type="button" data-gallery-next aria-label="Next product"><span aria-hidden="true">→</span></button>
                    <button class="gallery-pause" type="button" data-gallery-pause aria-pressed="false" aria-label="Pause automatic product slideshow">Pause</button>
                </div>
            </div>
        </div>
    </section>
    <section class="product-list-section" id="product-range">
        <div class="container">
            <div class="detail-section-heading"><span class="section-index" aria-hidden="true">01</span><h2>Our Products</h2></div>
            <div class="product-grid">
                @foreach (config('site.products') as $product)
                    <article class="product-card" id="product-{{ $loop->iteration }}">
                        <div class="product-image"><img src="{{ asset('assets/images/'.$product['image']) }}" alt="{{ $product['name'] }} car seats" width="350" height="280" loading="lazy"></div>
                        <div class="product-body">
                            <span class="product-number">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <h2>{{ $product['name'] }}</h2>
                            <p>{{ $product['detail'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
