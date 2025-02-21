<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_id', 'contenu'];

    /**
     * Un commentaire appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un commentaire appartient à un événement.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
