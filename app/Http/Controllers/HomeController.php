<?php

namespace App\Http\Controllers;

use App\Models\FeatureProjects;
use App\Models\Homepage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homepage = Homepage::first();
        $featuredProjects = FeatureProjects::latest()->get();
        
        return view('pages.home', compact('homepage', 'featuredProjects'));
    }
}
