<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::latest()->paginate(12);
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:5120', // 5MB max
            'caption' => 'nullable|string|max:255',
            'category' => 'required|string|in:events,community,server',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image_url'] = $path;
        }

        GalleryImage::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Bild erfolgreich hochgeladen.');
    }

    public function edit(GalleryImage $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|max:5120',
            'caption' => 'nullable|string|max:255',
            'category' => 'required|string|in:events,community,server',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image_url) {
                Storage::disk('public')->delete($gallery->image_url);
            }
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image_url'] = $path;
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Bildinformationen aktualisiert.');
    }

    public function destroy(GalleryImage $gallery)
    {
        if ($gallery->image_url) {
            Storage::disk('public')->delete($gallery->image_url);
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Bild aus der Galerie entfernt.');
    }
}
