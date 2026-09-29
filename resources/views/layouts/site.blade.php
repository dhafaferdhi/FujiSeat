<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('site.description') }}">
    <title>@yield('title', 'Home') | Fuji Seat Indonesia</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
    <script defer src="{{ asset('assets/js/site.js') }}"></script>
</head>
<body class="@yield('body-class')">
    <a class="skip-link" href="#main">Skip to content</a>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="{{ route('home') }}" aria-label="Fuji Seat Indonesia Home">
                <img src="{{ asset('assets/images/logo.png') }}" alt="PT. FUJI SEAT INDONESIA">
            </a>
            <button class="nav-toggle" type="button" aria-label="Open navigation" aria-controls="main-nav" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            <nav class="main-nav" id="main-nav" aria-label="Main navigation">
                <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="{{ request()->routeIs('about*') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                <a class="{{ request()->routeIs('products') ? 'active' : '' }}" href="{{ route('products') }}">Products</a>
                <a class="{{ request()->routeIs('career') ? 'active' : '' }}" href="{{ route('career') }}">Career</a>
                <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact us</a>
            </nav>
        </div>
    </header>

    <main id="main">@yield('content')</main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <h2>USEFUL LINKS</h2>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">&gt; Home</a></li>
                    <li><a href="{{ route('about') }}">&gt; About us</a></li>
                    <li><a href="{{ route('products') }}">&gt; Products</a></li>
                    <li><a href="{{ route('career') }}">&gt; Career</a></li>
                    <li><a href="{{ route('contact') }}">&gt; Contact us</a></li>
                </ul>
            </div>
            <div>
                <h2>ABOUT US</h2>
                <p>{{ config('site.description') }}</p>
                <a class="footer-more" href="{{ route('about') }}">Read More</a>
            </div>
            <div>
                <h2>CONTACT INFO</h2>
                <p>Address: Jl. Agung Perkasa IX Blok K 1 Kav 9-15 Sunter Jakarta Utara</p>
                <p>Telephone: (62-21) 6530 2228</p>
                <p>Map: <a href="https://goo.gl/maps/gSQMKziQxssdGJP36" target="_blank" rel="noopener noreferrer">https://goo.gl/maps/gSQMKziQxssdGJP36</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <span>Copyright © PT. Fuji Seat Indonesia</span>
                <span>Powered by <a href="https://www.odoo.com/app/website" target="_blank" rel="noopener noreferrer"><strong>odoo</strong></a> - Create a free website</span>
            </div>
        </div>
    </footer>
</body>
</html>
