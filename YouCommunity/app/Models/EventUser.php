<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventUser extends Model
{
    use HasFactory;

    protected $table = 'event_user'; 

    protected $fillable = ['user_id', 'event_id', 'date_inscription'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
