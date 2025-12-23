<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    use HasFactory;

    protected $table = 'news_post'; // migration defined it as news_post (singular)

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the image URL with proper storage path
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? asset('storage/' . $this->image) : null,
        );
    }

    /**
     * Get the route key name for Laravel route model binding
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
