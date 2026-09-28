@extends('layouts.site')

@section('title', 'Contact Us')

@section('content')
    <section class="detail-page-header">
        <div class="container">
            <nav class="page-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">Contact Us</span></nav>
            <span class="section-kicker">OUR LOCATIONS</span>
            <h1>Contact Us</h1>
            <p class="page-introduction">Connect with our head office in Jakarta and our manufacturing facilities in Karawang.</p>
        </div>
    </section>
    <section class="contact-section">
        <div class="container">
            <div class="head-office-grid" id="office-1">
                <figure class="head-office-photo"><img src="{{ asset('assets/images/contact.jpg') }}" alt="Aerial view of the Fuji Seat Indonesia head office and Sunter plant in Jakarta" width="1400" height="827"><figcaption>Jakarta · Head Office &amp; Sunter Plant</figcaption></figure>
                <div class="head-office-details">
                    <span class="section-kicker">JAKARTA</span>
                    <h2>HEAD OFFICE & SUNTER PLANT</h2>
                    <dl class="office-information"><dt>Address</dt><dd>{{ config('site.offices.0.address') }}</dd><dt>Telephone</dt><dd>{{ config('site.offices.0.telephone') }}</dd></dl>
                    <a class="text-link" href="{{ config('site.offices.0.map') }}" target="_blank" rel="noopener noreferrer">Get directions <span aria-hidden="true">↗</span></a>
                    <details class="location-map"><summary>View location map</summary><iframe title="Map of Head Office and Sunter Plant" src="https://www.google.com/maps?q={{ urlencode(config('site.offices.0.address')) }}&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></details>
                </div>
            </div>
            <div class="section-heading branch-heading"><div><span class="section-kicker">KARAWANG</span><h2>Our manufacturing locations</h2></div></div>
            <div class="office-grid">
                @foreach (array_slice(config('site.offices'), 1) as $office)
                    <article class="office-card" id="office-{{ $loop->iteration + 1 }}">
                        <div class="office-photo"><img src="{{ asset('assets/images/'.$office['image']) }}" alt="{{ $office['name'] }}" width="{{ $office['width'] }}" height="{{ $office['height'] }}" loading="lazy" decoding="async"></div>
                        <div class="office-card-content">
                            <span class="section-index">0{{ $loop->iteration + 1 }}</span>
                            <h3>{{ $office['name'] }}</h3>
                            <dl class="office-information"><dt>Address</dt><dd>{{ $office['address'] }}</dd><dt>Telephone</dt><dd>{{ $office['telephone'] }}</dd></dl>
                            <a class="text-link" href="{{ $office['map'] }}" target="_blank" rel="noopener noreferrer">Get directions <span aria-hidden="true">↗</span></a>
                            <details class="location-map"><summary>View location map</summary><iframe title="Map of {{ $office['name'] }}" src="https://www.google.com/maps?q={{ urlencode($office['address']) }}&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></details>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
