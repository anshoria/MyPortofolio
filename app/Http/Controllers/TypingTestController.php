<?php

namespace App\Http\Controllers;

use App\Models\TypingTest;
use Illuminate\Http\Request;

class TypingTestController extends Controller
{
    public function show()
    {
        return view('pages.typing-test');
    }
    
}
