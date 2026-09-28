@extends('layouts.site')

@section('title', 'Home')

@section('content')
    <section class="hero-slider" data-slider aria-label="Fuji Seat Indonesia plants">
        @foreach (config('site.slides') as $slide)
            <div class="hero-slide {{ $loop->first ? 'is-active' : '' }}" data-slide style="background-image: url('{{ asset('assets/images/'.$slide['image']) }}')" aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
                <div class="hero-shade"></div>
                <div class="container hero-content">
                    <h1><span class="hero-welcome">WELCOME</span> <span>TO</span> PT. FUJI SEAT INDONESIA</h1>
                    <p>{{ $slide['title'] }}</p>
                </div>
            </div>
        @endforeach
        <button class="hero-arrow hero-previous" type="button" data-previous aria-label="Previous slide">❮</button>
        <button class="hero-arrow hero-next" type="button" data-next aria-label="Next slide">❯</button>
        <div class="hero-dots" aria-label="Choose a slide">
            @foreach (config('site.slides') as $slide)
                <button type="button" data-dot="{{ $loop->index }}" class="{{ $loop->first ? 'is-active' : '' }}" aria-label="Show {{ $slide['title'] }}"></button>
            @endforeach
        </div>
    </section>
    <section class="gallery-section" aria-label="Fuji Seat Indonesia gallery">
        <div class="container gallery-grid">
            @foreach (range(1, 8) as $number)
                <img src="{{ asset('assets/images/gallery-'.$number.'.jpg') }}" alt="Fuji Seat Indonesia gallery image {{ $number }}" loading="lazy">
            @endforeach
        </div>
    </section>
    <div class="tagline-bar">{{ config('site.tagline') }}</div>
    <div class="home-spacer" aria-hidden="true"></div>
@endsection
