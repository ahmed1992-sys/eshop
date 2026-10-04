<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Destination extends Model
{
    protected $table='flight_destination';
    protected $fillable = ['destination','created_at','updated_at','flight_id'];

  public function recountry()//انشاء علاقه عسكيه للعلاقه التي تم انشأها في مودل الكنتريز
    {
        return $this->belongsTo(Countries::class,'flight_id',);
    }
}
