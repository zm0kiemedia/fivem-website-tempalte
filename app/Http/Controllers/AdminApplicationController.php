<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::latest()->paginate(15);
        return view('admin.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $application->update($validated);

        return redirect()->route('admin.applications.show', $application)
            ->with('success', 'Status der Bewerbung aktualisiert auf: ' . ucfirst($validated['status']));
    }
}
