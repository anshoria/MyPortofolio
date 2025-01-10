<?php

namespace App\Observers;

use App\Models\Projects;
use Illuminate\Support\Facades\Cache;

class ProjectsObserver
{
    /**
     * Handle the Projects "created" event.
     */
    public function created(Projects $projects): void
    {
        $this->clearCache($projects);
    }

    /**
     * Handle the Projects "updated" event.
     */
    public function updated(Projects $projects): void
    {
        $this->clearCache($projects);
    }

    /**
     * Handle the Projects "deleted" event.
     */
    public function deleted(Projects $projects): void
    {
        $this->clearCache($projects);
    }

    /**
     * Handle the Projects "restored" event.
     */
    public function restored(Projects $projects): void
    {
        //
    }

    /**
     * Handle the Projects "force deleted" event.
     */
    public function forceDeleted(Projects $projects): void
    {
        //
    }


    private function clearCache(Projects $projects)
    {
        Cache::forget('featured_projects');
        Cache::forget('cta_project');
        Cache::forget('catalogs');
        Cache::forget('project_categories');

        // Clear cache for project detail page
        Cache::forget('catalog_' . $projects->id);

        // Clear cache for related projects
        Cache::forget('related_projects_' . $projects->id);

        // Clear cache for project listing page with pagination
        $categories = Projects::distinct('category')->pluck('category')->filter();

        // Get total pages for each category
        foreach ($categories as $category) {
            $query = Projects::latest();
            if ($category !== 'all') {
                $query->where('category', $category);
            }
            $totalPages = ceil($query->count() / 6); // 6 is items per page

            // Clear cache for each page
            for ($page = 1; $page <= $totalPages; $page++) {
                Cache::forget("projects_{$category}_page_{$page}");
            }
        }

        // Clear cache for 'all' category
        $totalAllPages = ceil(Projects::count() / 6);
        for ($page = 1; $page <= $totalAllPages; $page++) {
            Cache::forget("projects_all_page_{$page}");
        }

        // Clear base cache keys
        Cache::forget('projects_all');
        foreach ($categories as $category) {
            Cache::forget('projects_' . $category);
        }
    }
}
