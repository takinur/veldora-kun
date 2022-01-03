<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = ['user_id', 'name', 'phone', 'email', 'address'];

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
