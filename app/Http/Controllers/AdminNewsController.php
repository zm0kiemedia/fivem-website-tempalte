<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $posts = NewsPost::latest('published_at')->paginate(10);
        return view('admin.news.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $validated['image'] = $path;
        }

        NewsPost::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Newsbeitrag erfolgreich erstellt.');
    }

    public function edit(NewsPost $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, NewsPost $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $path = $request->file('image')->store('news', 'public');
            $validated['image'] = $path;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Newsbeitrag aktualisiert.');
    }

    public function destroy(NewsPost $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Newsbeitrag gelöscht.');
    }
}
