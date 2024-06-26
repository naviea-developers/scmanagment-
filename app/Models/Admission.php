<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'user_id'];

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/admission/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id",'id');
    }
    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }
    public function academic_year(){
        return $this->belongsTo(AcademicYear::class,"academic_year_id",'id');
    }
    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
    }
    public function section(){
        return $this->belongsTo(SchoolSection::class,"section_id",'id');
    }
    public function group(){
        return $this->belongsTo(Group::class,"group_id",'id');
    }
    public function feeManagement(){
        return $this->belongsTo(FeeManagement::class,"fee_id",'id');
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



    public function pre_class(){
        return $this->belongsTo(Classe::class,"pre_class_id",'id');
    }
    public function certificate(){
        return $this->hasMany(AdmissionCertificate::class,"admission_id",'id');
    }

    

}
