<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'image_path',
        'title',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActiveImageForPage($page)
    {
        $heroImage = self::where('page', $page)
            ->where('is_active', true)
            ->first();
        
        return $heroImage ? \Storage::url($heroImage->image_path) : null;
    }
}
