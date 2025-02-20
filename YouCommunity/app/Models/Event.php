<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'description',
        'maxParticipants',
        'dateHeure',
        'lieu',
        'photo',
        'categorie',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
