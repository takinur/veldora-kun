<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'customer_id',
        're_name',
        're_phone',
        're_email',
        're_address',
        'size',
        'date',
        'service_id',
        'delivery_id',
        'notification_id',
        'package_id',
        'paid_at',
        'price',
        'bookingstatus_id',
        'track_code',
        'trackStatus_id',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function Delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function package()
    {
        return $this->belongsTo(PackageType::class);
    }
    public function trackStatus()
    {
        return $this->belongsTo(TrackingStatus::class, 'trackStatus_id');
    }

    public function bookingStatus()
    {
        return $this->belongsTo(BookingStatus::class, 'bookingstatus_id', 'id');
    }

    public function driver()
    {
        return $this->hasOne(DriverBooking::class);
    }
    public function trackingHistory()
    {
        return $this->hasMany(TrackingHistory::class);
    }
}
