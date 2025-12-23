<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'email', 'discord', 'category', 'message', 'status', 'access_token'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($ticket) {
            if (!$ticket->access_token) {
                $ticket->access_token = \Illuminate\Support\Str::random(64);
            }
        });
    }

    public function replies()
    {
        return $this->hasMany(TicketReply::class)->orderBy('created_at', 'asc');
    }
}
