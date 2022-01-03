<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverBooking extends Model
{
    use HasFactory;

    protected $table = 'driver_booking';

    protected $fillable = [
        'user_id',
        'booking_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
