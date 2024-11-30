<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypingTest;
use Illuminate\Http\Request;

class TypingTestApiController extends Controller
{
    public function index()
    {
        $scores = TypingTest::orderBy('wpm', 'desc')
            ->take(10)
            ->get();

        return response()->json($scores);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'wpm' => 'required|integer|min:0',
            'accuracy' => 'required|integer|min:0|max:100',
            'timeleft' => 'required|integer|min:0|max:60',
            'avg_score' => 'required|integer',
            'language' => 'required|string|in:en,id',
        ]);

        $test = TypingTest::create($validated);

        return response()->json($test, 201);
    }
}