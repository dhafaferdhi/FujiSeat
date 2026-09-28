@extends('layouts.site')

@section('title', 'Career')

@section('content')
    <section class="detail-page-header">
        <div class="container">
            <nav class="page-breadcrumb" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">Career</span></nav>
            <span class="section-kicker">{{ config('site.company') }}</span>
            <h1>Career</h1>
        </div>
    </section>
    <section class="career-section">
        <div class="container career-grid">
            <figure class="career-image"><img src="{{ asset('assets/images/career.jpg') }}" alt="Handshake" width="690" height="460"></figure>
            <div class="career-content">
                <span class="section-index" aria-hidden="true">01</span>
                <h2>Join Our Team!</h2>
                <p>{{ config('site.description') }}</p>
                <a class="text-link" href="#career-application">Correspondence email <span aria-hidden="true">↓</span></a>
            </div>
        </div>
    </section>
    <section class="career-application" id="career-application">
        <div class="container application-panel">
            <div class="application-copy">
                <span class="section-index" aria-hidden="true">02</span>
                <p>Please submit your resume application to the correspondence email. Our Human Capital department will filter and analyze according to the available careers in the Fuji Seat group.</p>
            </div>
            <a class="application-email" href="mailto:fujiseatindonesiapt@gmail.com">
                <svg aria-hidden="true" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 6 9 7 9-7"/></svg>
                <span><span class="application-label">Correspondence email:</span><strong>fujiseatindonesiapt@gmail.com</strong></span>
                <span class="application-arrow" aria-hidden="true">↗</span>
            </a>
        </div>
    </section>
@endsection
