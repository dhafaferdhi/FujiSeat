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

    public function aboutIntroduction(): View
    {
        return $this->aboutDetail('introduction', 'about.introduction');
    }

    public function aboutGroupCompanies(): View
    {
        return $this->aboutDetail('group-companies', 'about.group-companies');
    }

    public function aboutCertificates(): View
    {
        return $this->aboutDetail('certificates', 'about.certificates');
    }

    public function aboutPlants(): View
    {
        return view('pages.about.plants', ['page' => config('about.pages.plants')]);
    }

    public function aboutProducts(): View
    {
        return $this->aboutDetail('products', 'about.products');
    }

    public function aboutCustomers(): View
    {
        return $this->aboutDetail('customers', 'about.customers');
    }

    public function aboutContact(): View
    {
        return $this->aboutDetail('contact', 'about.contact');
    }

    public function companyProfile(): View
    {
        return view('pages.about.company-profile');
    }

    public function philosophy(): View
    {
        return view('pages.about.philosophy');
    }

    public function basicPolicy(): View
    {
        return view('pages.about.basic-policy');
    }

    public function manufacturing(): View
    {
        return view('pages.about.manufacturing');
    }

    public function companyHistory(): View
    {
        return $this->aboutDetail('milestones', 'about.company-history');
    }

    public function qualityEnvironment(): View
    {
        return view('pages.about.quality-environment');
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

    private function aboutDetail(string $pageKey, string $activeSection): View
    {
        $page = config('about.pages.'.$pageKey);

        if ($pageKey === 'milestones') {
            $page['timeline'] = config('site.history');
        }

        return view('pages.about.detail', [
            'page' => $page,
            'pageKey' => $pageKey,
            'activeSection' => $activeSection,
        ]);
    }
}
