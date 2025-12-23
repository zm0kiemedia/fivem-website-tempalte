<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'discord_name' => 'required',
            'type' => 'required',
            'content' => 'required|min:20',
        ]);

        Application::create($validated);

        return redirect()->route('applications.create')->with('success', 'Deine Bewerbung wurde abgeschickt! Viel Glück.');
    }
}
