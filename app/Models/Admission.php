<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/users/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
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

}
