<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfoUpdate extends Model
{
    use HasFactory;

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/admission/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id",'id');
    }

//present
    public function present_continent(){
        return $this->belongsTo(Continent::class,"present_continent_id",'id');
    }
    public function present_country(){
        return $this->belongsTo(Country::class,"present_country_id",'id');
    }
    public function present_state(){
        return $this->belongsTo(State::class,"present_state_id",'id');
    }
    public function present_city(){
        return $this->belongsTo(City::class,"present_city_id",'id');
    }

//Permanent
    public function permanent_continent(){
        return $this->belongsTo(Continent::class,"permanent_continent_id",'id');
    }
    public function permanent_country(){
        return $this->belongsTo(Country::class,"permanent_country_id",'id');
    }
    public function permanent_state(){
        return $this->belongsTo(State::class,"permanent_state_id",'id');
    }
    public function permanent_city(){
        return $this->belongsTo(City::class,"permanent_city_id",'id');
    }
}
