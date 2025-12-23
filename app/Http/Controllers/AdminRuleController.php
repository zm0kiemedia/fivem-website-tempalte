<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class AdminRuleController extends Controller
{
    public function index()
    {
        $rules = Rule::orderBy('section')->orderBy('sort_order')->paginate(20);
        return view('admin.rules.index', compact('rules'));
    }

    public function create()
    {
        return view('admin.rules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section' => 'required|in:general,roleplay,zones',
            'content' => 'required|string',
            'title' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        Rule::create($validated);

        return redirect()->route('admin.rules.index')->with('success', 'Regel erfolgreich erstellt.');
    }

    public function edit(Rule $rule)
    {
        return view('admin.rules.edit', compact('rule'));
    }

    public function update(Request $request, Rule $rule)
    {
        $validated = $request->validate([
            'section' => 'required|in:general,roleplay,zones',
            'content' => 'required|string',
            'title' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $rule->update($validated);

        return redirect()->route('admin.rules.index')->with('success', 'Regel erfolgreich aktualisiert.');
    }

    public function destroy(Rule $rule)
    {
        $rule->delete();
        return redirect()->route('admin.rules.index')->with('success', 'Regel erfolgreich gelöscht.');
    }
}
