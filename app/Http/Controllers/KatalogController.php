<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class KatalogController extends Controller
{
    protected $seconds = 86400;
    public function index(Request $request)
    {
        $catalogs = Cache::remember('catalogs', $this->seconds, function () {
            return Projects::where('is_catalog', true)->latest()->paginate(9);
        });

        return view('pages.katalog', compact('catalogs'));
    }

    public function show(Projects $catalog)
    {
        $catalog = Cache::remember('catalog_' . $catalog->id, $this->seconds, function () use ($catalog) {
            return $catalog;
        });

        return view('pages.katalog-detail', compact('catalog'));
    }
}
