<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Get all unique categories
        $categories = Projects::distinct('category')->pluck('category')->filter();
        
        // Get selected category from query parameter or default to 'all'
        $selectedCategory = $request->category ?? 'all';
        
        // Base query
        $query = Projects::latest();
        
        // Filter by category if not 'all'
        if ($selectedCategory !== 'all') {
            $query->where('category', $selectedCategory);
        }
        
        // Get paginated results
        $projects = $query->paginate(6);
        
        return view('pages.projects', compact('projects', 'categories', 'selectedCategory'));
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
