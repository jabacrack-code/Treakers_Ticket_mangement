<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'Event_title',
        'description',
        'ticket_price_vip',
        'ticket_price_regular',
        'max_attendees',
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
