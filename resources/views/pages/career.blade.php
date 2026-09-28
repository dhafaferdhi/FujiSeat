@extends('layouts.site')

@section('title', 'Career')

@section('content')
    <div class="page-title"><div class="container"><h1>Career</h1></div></div>
    <section class="career-section"><div class="container career-grid"><div class="career-image"><img src="{{ asset('assets/images/career.jpg') }}" alt="Handshake" loading="lazy"></div><div class="career-content"><h2>Join Our Team!</h2><p>{{ config('site.description') }}</p><p>Please submit your resume application to the correspondence email. Our Human Capital department will filter and analyze according to the available careers in the Fuji Seat group.</p><p>Correspondence email: <a href="mailto:fujiseatindonesiapt@gmail.com">fujiseatindonesiapt@gmail.com</a></p></div></div></section>
@endsection
