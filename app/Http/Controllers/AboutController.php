<?php

namespace App\Http\Controllers;

use App\Models\Aboutpage;
use App\Models\BackendSkills;
use App\Models\FrontendSkills;
use App\Models\Skills;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
{
    public function index()
    {
        $seconds = 86400;
        $about = Cache::remember('about_page_data', $seconds, function () {
            return Aboutpage::first();
        });

        $frontendSkills = Cache::remember('frontend_skills_data', $seconds, function () {
            return FrontendSkills::all();
        });

        $backendSkills = Cache::remember('backend_skills_data', $seconds, function () {
            return BackendSkills::all();
        });

        $skills = Cache::remember('skills_data', $seconds, function () {
            return Skills::all();
        });

        return view('pages.about', compact('about', 'frontendSkills', 'backendSkills', 'skills'));
    }
}
