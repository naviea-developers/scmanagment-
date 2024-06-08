<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopperStudent extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(Admission::class,"student_id",'id');
    }
    public function examination(){
        return $this->belongsTo(Examination::class,"examination_id",'id');
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
