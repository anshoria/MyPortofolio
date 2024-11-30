<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::latest()->get();
        return view('pages.projects', compact('projects'));
    }
}
