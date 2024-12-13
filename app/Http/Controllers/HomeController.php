<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Projects;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homepage = Homepage::first();
        $featuredProjects = Projects::where('is_featured', true)->latest()->get();
        $ctaProject = Projects::where('is_cta', true)->first();
        
        return view('pages.home', compact('homepage', 'featuredProjects', 'ctaProject'));
    }
}
