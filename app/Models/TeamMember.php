<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'image',
        'discord',
        'bio',
        'rank_order',
    ];

    // Accessor for views that use 'photo' instead of 'image'
    public function getPhotoAttribute()
    {
        return $this->image;
    }
}
