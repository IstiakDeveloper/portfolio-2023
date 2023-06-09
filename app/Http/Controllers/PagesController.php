<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\category;
use App\Models\Main;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{




    public function index() {

        $main = Main::first();
        $services = Service::all();
        $portfolios = Portfolio::all();
        $abouts = About::all();
        $category = category::all();
        $categories = category::all();


        return view('pages.index', compact('main', 'services', 'portfolios', 'abouts', 'category', 'categories'));
    }


}
