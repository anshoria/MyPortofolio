<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function contact()
    {
        $seconds = 86400;
        $contact = Cache::remember('contact', $seconds, function () {
            return Contact::first();
        });
        
        return view('pages.contact', compact('contact'));
    }
}
