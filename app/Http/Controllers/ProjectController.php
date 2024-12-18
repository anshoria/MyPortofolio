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
        $categories = Cache::remember('project_categories', $this->seconds, function () {
            return Projects::distinct('category')->pluck('category')->filter();
        });

        $selectedCategory = $request->category ?? 'all';

        $projects = Cache::remember('projects_' . $selectedCategory, $this->seconds, function () use ($selectedCategory) {
            $query = Projects::latest();

            if ($selectedCategory !== 'all') {
                $query->where('category', $selectedCategory);
            }

            return $query->paginate(20);
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
