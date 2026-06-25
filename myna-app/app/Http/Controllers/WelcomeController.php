<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function show()
    {
        return view('welcome');
    }

    public function saveChoice(Request $request)
    {
        return response()->json(['ok' => true]);
    }

    public function reset()
    {
        return redirect()->route('home');
    }
}
