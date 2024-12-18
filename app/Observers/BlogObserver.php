<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Facades\Cache;

class BlogObserver
{
    public function created(Blog $blog)
    {
        $this->clearCache();
    }

    public function updated(Blog $blog)
    {
        $this->clearCache();
    }

    public function deleted(Blog $blog)
    {
        $this->clearCache();
    }

    private function clearCache()
    {
        Cache::forget('blogs_paginated');
        Cache::forget('blogs_recent');
        // Clear individual blog cache using pattern
        Cache::forget('blog_*');
    }
}
