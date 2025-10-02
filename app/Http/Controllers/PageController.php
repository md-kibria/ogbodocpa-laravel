<?php

namespace App\Http\Controllers;

use App\Models\HomepageContent;
use App\Models\Info;
use App\Models\Page;
use App\Models\Resource;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $info = Info::find(1);
        
        $header = HomepageContent::where('section', 'header')->first();
        $philosophy = HomepageContent::where('section', 'our_philosophy')->first();
        $appointment = HomepageContent::where('section', 'appointment')->first();
        $features_services = HomepageContent::where('section', 'features_services')->first();

        $serviceIds = array_values(json_decode($features_services->title, true));
        $services_list = Service::whereIn('id', $serviceIds)->get();

        return view('pages.home', compact('info', 'header', 'philosophy', 'appointment', 'services_list'));
    }

    public function services()
    {
        $services = Service::orderBy('id', 'desc')->paginate(12);
        return view('pages.services', compact('services'));
    }

    public function service(Service $service)
    {
        // $service = Service::where('slug', $slug)->firstOrFail();
        return view('pages.service', compact('service'));
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->first();

        return view('pages.about', compact('page'));
    }
    
    public function contact()
    {
        $page = Page::where('slug', 'contact')->first();
        $info = Info::find(1);

        return view('pages.contact', compact('page', 'info'));
    }

    public function resources()
    {
        $resources = Resource::orderBy('id', 'desc')->paginate(12);
        return view('pages.resources', compact('resources'));
    }
}
