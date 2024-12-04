<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $catalogs = Projects::where('is_catalog', true)->latest()->paginate(9);

        return view('pages.katalog', compact('catalogs'));
    }

    public function show(Projects $catalog)
    {
        return view('pages.katalog-detail', compact('catalog'));
    }
}
