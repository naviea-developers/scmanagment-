<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,"academin_year_id",'id');
    }
    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
    }

    public function examResults(){
        return $this->hasMany(ExamResult::class,"examination_id",'id');
    }

    

}
