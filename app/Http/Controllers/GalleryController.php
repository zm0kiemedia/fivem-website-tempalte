<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $allImages = \App\Models\GalleryImage::latest()->get();
        
        // Group images by category
        $images = $allImages->groupBy('category');
        
        // If no images have categories, create a default group
        if ($images->isEmpty()) {
            $images = collect(['Alle' => $allImages]);
        }
        
        return view('gallery.index', compact('images'));
    }
}
