<?php

namespace App\Observers;

use App\Models\FrontendSkills;
use Illuminate\Support\Facades\Cache;

class FrontendSkillsObserver
{
    public function created(FrontendSkills $frontendSkills)
    {
        $this->clearCache();
    }

    public function updated(FrontendSkills $frontendSkills)
    {
        $this->clearCache();
    }

    public function deleted(FrontendSkills $frontendSkills)
    {
        $this->clearCache();
    }

    private function clearCache()
    {
        Cache::forget('frontend_skills_data');
    }
}
