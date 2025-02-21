<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventInvitation extends Model
{
    use HasFactory;

    protected $table = 'event_invitations';

    // Relation avec l'événement concerné
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relation avec l'utilisateur qui invite
    public function inviter()
    {
        return $this->belongsTo(User::class, 'inviter_id');
    }

    // Relation avec l'utilisateur invité
    public function invitee()
    {
        return $this->belongsTo(User::class, 'invitee_id');
    }
}
