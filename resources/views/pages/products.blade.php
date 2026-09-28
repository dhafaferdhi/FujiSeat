@extends('layouts.site')

@section('title', 'Products')

@section('content')
    <div class="page-title"><div class="container"><h1>Our Products</h1></div></div>
    <section class="product-gallery-section" data-product-gallery aria-label="Product gallery">
        <div class="container product-gallery-frame">
            <button type="button" data-gallery-previous aria-label="Previous product">❮</button>
            @foreach (config('site.products') as $product)
                <img class="product-gallery-image {{ $loop->first ? 'is-active' : '' }}" data-gallery-image src="{{ asset('assets/images/'.$product['image']) }}" alt="{{ $product['name'] }} car seats" loading="lazy">
            @endforeach
            <button type="button" data-gallery-next aria-label="Next product">❯</button>
        </div>
        <div class="product-thumbnails container">
            @foreach (config('site.products') as $product)
                <button type="button" data-gallery-dot="{{ $loop->index }}" class="{{ $loop->first ? 'is-active' : '' }}" aria-label="Show {{ $product['name'] }} seats"><img src="{{ asset('assets/images/'.$product['image']) }}" alt=""></button>
            @endforeach
        </div>
    </section>
    <section class="product-list-section">
        <div class="container product-grid">
            @foreach (config('site.products') as $product)
                <article class="product-card">
                    <div class="product-image"><img src="{{ asset('assets/images/'.$product['image']) }}" alt="{{ $product['name'] }} car seats" loading="lazy"></div>
                    <div class="product-body"><h2>{{ $product['name'] }}</h2><p>{{ $product['detail'] }}</p></div>
                </article>
            @endforeach
        </div>
    </section>
    <div class="product-spacer" aria-hidden="true"></div>
@endsection
