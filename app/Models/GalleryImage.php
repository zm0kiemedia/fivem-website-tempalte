<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = ['image_url', 'caption', 'category'];

    /**
     * Get the image URL with proper storage path
     */
    protected function src(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image_url ? asset('storage/' . $this->image_url) : null,
        );
    }
}
