<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $seconds = 86400;
        $homepage = Cache::remember('homepage', $seconds, function () {
            return Homepage::first();
        });

        $featuredProjects = Cache::remember('featured_projects', $seconds, function () {
            return Projects::where('is_featured', true)->latest()->get();
        });

        $ctaProject = Cache::remember('cta_project', $seconds, function () {
            return Projects::where('is_cta', true)->first();
        });

        return view('pages.home', compact('homepage', 'featuredProjects', 'ctaProject'));
    }
}
