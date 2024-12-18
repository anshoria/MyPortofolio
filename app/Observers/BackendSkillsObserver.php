<?php

namespace App\Observers;

use App\Models\BackendSkills;
use Illuminate\Support\Facades\Cache;

class BackendSkillsObserver
{
    public function created(BackendSkills $backendSkills)
    {
        $this->clearCache();
    }

    public function updated(BackendSkills $backendSkills)
    {
        $this->clearCache();
    }

    public function deleted(BackendSkills $backendSkills)
    {
        $this->clearCache();
    }

    private function clearCache()
    {
        Cache::forget('backend_skills_data');
    }
}
