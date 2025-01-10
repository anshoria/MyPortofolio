<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectController extends Controller
{
    protected $seconds = 86400;
    public function index(Request $request)
    {
        $currentPage = $request->get('page', 1); // Get current page
        $categories = Cache::remember('project_categories', $this->seconds, function () {
            return Projects::distinct('category')->pluck('category')->filter();
        });

        $selectedCategory = $request->category ?? 'all';

        // Include page number in cache key
        $cacheKey = "projects_{$selectedCategory}_page_{$currentPage}";
        
        $projects = Cache::remember($cacheKey, $this->seconds, function () use ($selectedCategory) {
            $query = Projects::latest();

            if ($selectedCategory !== 'all') {
                $query->where('category', $selectedCategory);
            }

            return $query->paginate(6);
        });

        return view('pages.projects', compact('projects', 'categories', 'selectedCategory'));
    }

    public function show(Projects $project)
    {
        $relatedProjects = Cache::remember('related_projects_' . $project->id, $this->seconds, function () use ($project) {
            return Projects::where('id', '!=', $project->id)
                ->where('category', $project->category)
                ->limit(3)
                ->get();
        });

        return view('pages.project-detail', compact('project', 'relatedProjects'));
    }
}
