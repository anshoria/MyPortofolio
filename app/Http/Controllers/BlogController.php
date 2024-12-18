<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    protected $seconds = 86400; // 24 hours in seconds

    public function index()
    {
        $blogs = Cache::remember('blogs_paginated', $this->seconds, function () {
            return Blog::latest('published')->paginate(6);
        });
        
        return view('pages.blog', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $relatedBlogs = Cache::remember('blogs_recent', $this->seconds, function () use ($blog) {
            return Blog::latest()
                ->where('id', '!=', $blog->id)
                ->take(3)
                ->get();
        });

        $blogWithComments = Cache::remember("blog_{$blog->id}", $this->seconds, function () use ($blog) {
            return $blog->load('comments');
        });

        return view('pages.blog-article', [
            'blog' => $blogWithComments,
            'blogs' => $relatedBlogs
        ]);
    }

    public function like(Blog $blog)
    {
        $blog->increment('likes');
        Cache::forget("blog_{$blog->id}");
        return response()->json(['likes' => $blog->likes]);
    }

    public function comment(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string'
        ]);

        $comment = $blog->comments()->create([
            'name' => $validated['name'],
            'comment' => $validated['comment'],
            'like' => 0
        ]);

        return response()->json($comment);
    }

    public function likeComment(Blog $blog, Comments $comment)
    {
        if ($comment->blog_id !== $blog->id) {
            abort(404);
        }

        $comment->increment('like');
        Cache::forget("blog_{$blog->id}_comments");
        return response()->json(['likes' => $comment->like]);
    }

    public function comments(Blog $blog)
    {
        $comments = Cache::remember("blog_{$blog->id}_comments", $this->seconds, function () use ($blog) {
            return $blog->comments()
                ->whereNull('parent_id')
                ->with('replies')
                ->latest()
                ->paginate(5);
        });

        return response()->json($comments);
    }

    public function reply(Request $request, Blog $blog, Comments $comment)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
            'parent_id' => 'required|exists:comments,id'
        ]);

        $reply = $comment->replies()->create([
            'blog_id' => $blog->id,
            'name' => $validated['name'],
            'comment' => $validated['comment'],
            'like' => 0
        ]);

        return response()->json($reply);
    }
}
