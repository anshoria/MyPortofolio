<?php

namespace App\Observers;

use App\Models\Homepage;
use Illuminate\Support\Facades\Cache;

class HomepageObserver
{
    /**
     * Handle the Homepage "created" event.
     */
    public function created(Homepage $homepage): void
    {
        Cache::forget('homepage');
    }

    /**
     * Handle the Homepage "updated" event.
     */
    public function updated(Homepage $homepage): void
    {
        Cache::forget('homepage');
    }

    /**
     * Handle the Homepage "deleted" event.
     */
    public function deleted(Homepage $homepage): void
    {
        Cache::forget('homepage');
    }

    /**
     * Handle the Homepage "restored" event.
     */
    public function restored(Homepage $homepage): void
    {
        //
    }

    /**
     * Handle the Homepage "force deleted" event.
     */
    public function forceDeleted(Homepage $homepage): void
    {
        //
    }
}
