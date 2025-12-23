<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('rank_order')->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'bio' => 'nullable',
            'discord' => 'nullable',
            'rank_order' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team', 'public');
            $validated['image'] = $path;
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Teammitglied hinzugefügt.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'bio' => 'nullable',
            'discord' => 'nullable',
            'rank_order' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $path = $request->file('image')->store('team', 'public');
            $validated['image'] = $path;
        }

        $team->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Teammitglied aktualisiert.');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }
        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Teammitglied entfernt.');
    }
}
