<?php

namespace App\Http\Controllers;

use App\Models\Aboutpage;
use App\Models\Blog;
use App\Models\Projects;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(){
        $projects = Projects::latest()->get();
        $articles = Blog::latest()->get();

        return response()->view('pages.sitemap', [
            'projects' => $projects,
            'articles' => $articles,
        ])->header('Content-Type', 'text/xml');
    }
}
