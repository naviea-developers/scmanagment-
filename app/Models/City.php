<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/cities/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }

    public function continent(){
        return $this->belongsTo(Continent::class,"continent_id",'id');
    }

    public function country(){
        return $this->belongsTo(Country::class,"country_id",'id');
    }

    public function state(){
        return $this->belongsTo(State::class,"state_id",'id');
    }
    public function university(){
        return $this->hasMany(University::class,'city_id','id');
    }

    function universities(){
        return $this->hasMany(University::class,'city_id','id');
    }
   
}
