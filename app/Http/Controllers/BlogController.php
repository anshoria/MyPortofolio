<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comments;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest('published')->paginate(6);
        return view('pages.blog', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $blogs = Blog::latest()
            ->where('id', '!=', $blog->id) // Mengabaikan blog saat ini
            ->take(3)
            ->get();

        $blog->load('comments'); // Memuat relasi komentar
        return view('pages.blog-article', compact('blog', 'blogs'));
    }


    public function like(Blog $blog)
    {
        $blog->increment('likes');
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
        // Memastikan komentar memang milik blog ini
        if ($comment->blog_id !== $blog->id) {
            abort(404);
        }

        $comment->increment('like');
        return response()->json(['likes' => $comment->like]);
    }

    public function comments(Blog $blog)
    {
        $comments = $blog->comments()
            ->whereNull('parent_id')  // Hanya ambil parent comments
            ->with('replies')         // Eager load replies
            ->latest()
            ->paginate(5);

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
