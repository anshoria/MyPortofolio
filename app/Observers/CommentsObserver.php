<?php

namespace App\Observers;

use App\Models\Comments;
use Illuminate\Support\Facades\Cache;

class CommentsObserver
{
    public function created(Comments $comment)
    {
        $this->clearCache($comment->blog_id);
    }

    public function updated(Comments $comment)
    {
        $this->clearCache($comment->blog_id);
    }

    public function deleted(Comments $comment)
    {
        $this->clearCache($comment->blog_id);
    }

    private function clearCache($blogId)
    {
        Cache::forget("blog_{$blogId}_comments");
        Cache::forget("blog_{$blogId}_comments_count");
    }
}
