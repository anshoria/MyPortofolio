<?php
// app/Observers/AboutpageObserver.php
namespace App\Observers;

use App\Models\Aboutpage;
use Illuminate\Support\Facades\Cache;

class AboutpageObserver
{
    public function created(Aboutpage $aboutpage)
    {
        $this->clearCache();
    }

    public function updated(Aboutpage $aboutpage)
    {
        $this->clearCache();
    }

    public function deleted(Aboutpage $aboutpage)
    {
        $this->clearCache();
    }

    private function clearCache()
    {
        Cache::forget('about_page_data');
    }
}