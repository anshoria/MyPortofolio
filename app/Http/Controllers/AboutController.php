<?php

namespace App\Http\Controllers;

use App\Models\Aboutpage;
use App\Models\BackendSkills;
use App\Models\FrontendSkills;
use App\Models\Skills;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = Aboutpage::first();
        $frontendSkills = FrontendSkills::all();
        $backendSkills = BackendSkills::all();
        $skills = Skills::all();

        return view('pages.about', compact('about', 'frontendSkills', 'backendSkills', 'skills'));
    }
}
