<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Relation Many-to-Many : Inscription des utilisateurs
    public function registeredUsers()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }

    // Relation Many-to-Many : Invitations envoyées
    public function invitedUsers()
    {
        return $this->belongsToMany(User::class, 'event_invitations')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}


}
