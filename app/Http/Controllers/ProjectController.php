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

    public function show(Projects $project)
{
    $relatedProjects = Projects::where('id', '!=', $project->id)
        ->where('category', $project->category)
        ->limit(3)
        ->get();
        
    return view('pages.project-detail', compact('project', 'relatedProjects'));
}
}
