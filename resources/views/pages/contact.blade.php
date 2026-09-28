@extends('layouts.site')

@section('title', 'Contact Us')

@section('content')
    <div class="page-title"><div class="container"><h1>Contact Us</h1></div></div>
    <section class="contact-section">
        <div class="container">
            <div class="head-office-grid">
                <iframe class="head-office-map" title="Map of Head Office and Sunter Plant" src="https://www.google.com/maps?q={{ urlencode(config('site.offices.0.address')) }}&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="head-office-details">
                    <h2>HEAD OFFICE & SUNTER PLANT</h2>
                    <strong>Address:</strong><p>{{ config('site.offices.0.address') }}</p>
                    <strong>Support Info:</strong><p>Telephone: {{ config('site.offices.0.telephone') }}<br>Map: <a href="{{ config('site.offices.0.map') }}" target="_blank" rel="noopener noreferrer">{{ config('site.offices.0.map') }}</a></p>
                    <img src="{{ asset('assets/images/contact.jpg') }}" alt="Head Office and Sunter Plant" loading="lazy">
                </div>
            </div>
            <h2 class="branch-heading">BRANCH OFFICE</h2>
            <div class="office-grid">
                @foreach (array_slice(config('site.offices'), 1) as $office)
                    <article class="office-card">
                        <a class="map-open" href="{{ $office['map'] }}" target="_blank" rel="noopener noreferrer">Buka di Maps ↗</a>
                        <iframe title="Map of {{ $office['name'] }}" src="https://www.google.com/maps?q={{ urlencode($office['address']) }}&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <h3>{{ $office['name'] }}</h3>
                        <p>{{ $office['address'] }}</p>
                        <p>Telephone: {{ $office['telephone'] }}<br>Map: <a href="{{ $office['map'] }}" target="_blank" rel="noopener noreferrer">{{ $office['map'] }}</a></p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
