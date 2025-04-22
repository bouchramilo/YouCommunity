<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
    ];

    // relation One-to-Many : créer un event
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    // relation Many-to-Many : Inscription aux événements
    public function registeredEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user');
    }

    // relation Many-to-Many : Invitations envoyées
    public function invitations()
    {
        return $this->belongsToMany(Event::class, 'event_invitations')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    // relation One-to-Many : Commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
