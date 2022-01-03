<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',

    ];

    public function booking(){
        return $this->hasMany('booking');
    }
}
