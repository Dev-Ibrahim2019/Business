<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\MainSection;
use App\Models\Service;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function show(){
        return view('front.home', [
            'home' => MainSection::first(),
            'about' => About::first(),
            'services' => Service::all(),
            'blogs' => Blog::all(),
        ]);
    }
}
