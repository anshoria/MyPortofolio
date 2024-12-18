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

        // Clear cache for project listing page
        $categories = Projects::distinct('category')->pluck('category')->filter();
        foreach ($categories as $category) {
            Cache::forget('projects_' . $category);
        }
        Cache::forget('projects_all');
    }
}
