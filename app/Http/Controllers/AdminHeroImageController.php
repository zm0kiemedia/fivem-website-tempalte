<?php

namespace App\Http\Controllers;

use App\Models\HeroImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHeroImageController extends Controller
{
    public function index()
    {
        $pages = [
            'home' => 'Homepage',
            'news' => 'News',
            'gallery' => 'Galerie',
            'team' => 'Team',
            'stats' => 'Statistiken',
            'contact' => 'Kontakt',
            'rules' => 'Regeln',
            'info' => 'Informationen',
        ];
        
        return view('admin.hero-images.index', compact('pages'));
    }

    public function create()
    {
        $pages = [
            'home' => 'Homepage',
            'news' => 'News',
            'gallery' => 'Galerie',
            'team' => 'Team',
            'stats' => 'Statistiken',
            'contact' => 'Kontakt',
            'rules' => 'Regeln',
            'info' => 'Informationen',
        ];
        
        return view('admin.hero-images.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page' => 'required|string',
            'image' => 'required|image|max:20480', // 20MB
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Check if hero image already exists for this page
        $existingHero = HeroImage::where('page', $validated['page'])->first();
        
        if ($existingHero) {
            // Update existing image
            if ($existingHero->image_path) {
                Storage::disk('public')->delete($existingHero->image_path);
            }
            
            $imagePath = $request->file('image')->store('hero-images', 'public');
            
            $existingHero->update([
                'image_path' => $imagePath,
                'title' => $validated['title'] ?? null,
                'description' => $validated['description'] ?? null,
                'is_active' => true,
            ]);
            
            return redirect()->back()
                ->with('success', 'Hero-Bild erfolgreich aktualisiert.');
        }

        // Create new hero image
        $imagePath = $request->file('image')->store('hero-images', 'public');

        HeroImage::create([
            'page' => $validated['page'],
            'image_path' => $imagePath,
            'title' => $validated['title'] ?? null,
            'description' => $validated['description'] ?? null,
            'is_active' => true,
        ]);

        return redirect()->back()
            ->with('success', 'Hero-Bild erfolgreich hochgeladen.');
    }

    public function edit(HeroImage $heroImage)
    {
        $pages = [
            'home' => 'Homepage',
            'news' => 'News',
            'gallery' => 'Galerie',
            'team' => 'Team',
            'stats' => 'Statistiken',
            'contact' => 'Kontakt',
            'rules' => 'Regeln',
            'info' => 'Informationen',
        ];
        
        return view('admin.hero-images.edit', compact('heroImage', 'pages'));
    }

    public function update(Request $request, HeroImage $heroImage)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|max:20480',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($heroImage->image_path) {
                Storage::disk('public')->delete($heroImage->image_path);
            }
            
            $validated['image_path'] = $request->file('image')->store('hero-images', 'public');
        }

        $heroImage->update($validated);

        return redirect()->back()
            ->with('success', 'Hero-Bild erfolgreich aktualisiert.');
    }

    public function destroy(HeroImage $heroImage)
    {
        if ($heroImage->image_path) {
            Storage::disk('public')->delete($heroImage->image_path);
        }
        
        $heroImage->delete();

        return redirect()->back()
            ->with('success', 'Hero-Bild gelöscht.');
    }
}
