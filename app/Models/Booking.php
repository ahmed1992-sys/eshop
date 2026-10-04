<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Booking extends Model
{
        protected $table='flight_booking';
    protected $fillable = ['travel_name','created_at','updated_at','flight_id'];
     public function flight()
    {
        return $this->belongsTo(Countries::class,'flight_id');
    }
}
