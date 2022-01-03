<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'trackingStatus_id',
        'booking_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function trackingStatus()
    {
        return $this->belongsTo(TrackingStatus::class, 'trackingStatus_id');
    }
}
