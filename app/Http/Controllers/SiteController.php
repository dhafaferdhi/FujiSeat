<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function products(): View
    {
        return view('pages.products');
    }

    public function career(): View
    {
        return view('pages.career');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }
}
