<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Countries extends Model
{
use SoftDeletes;
    protected $table='country';
    protected $fillable = ['name','created_at','updated_at','active'];
    public function scopeactive($qurry){
        $qurry->where('active',1);

    }
 public function destination()// انشاء علاقه واحد لواحد
    {
        return $this->hasOne(Destination::class,'flight_id');
    }
    public function booking(){
        return $this->hasMany(Booking::class,'flight_id');
    }
}
