<?php
// app/Observers/SkillsObserver.php
namespace App\Observers;

use App\Models\Skills;
use Illuminate\Support\Facades\Cache;

class SkillsObserver
{
    public function created(Skills $skills)
    {
        $this->clearCache();
    }

    public function updated(Skills $skills)
    {
        $this->clearCache();
    }

    public function deleted(Skills $skills)
    {
        $this->clearCache();
    }

    private function clearCache()
    {
        Cache::forget('skills_data');
    }
}