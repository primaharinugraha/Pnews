<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Author;
use App\Models\Banner;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(){

        $banners = Banner::all();
        $featureds = News::where('is_featured', true)->get();
        $news = News::orderBy('created_at', 'desc')->get()->take(3);
        $authors = Author::all()->take(4);
        return view('pages.landingpage', Compact('banners', 'featureds', 'news', 'authors'));
    }
}
