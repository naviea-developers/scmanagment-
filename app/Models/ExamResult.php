<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;
    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
    }

    public function teacher(){
        return $this->belongsTo(User::class,"teacher_id",'id');
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class,"academin_year_id",'id');
    }

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function examination(){
        return $this->belongsTo(Examination::class,"examination_id",'id');
    }

    public function examClass(){
        return $this->belongsTo(ExamClass::class,"exam_class_id",'id');
    }

    public function schoolsection(){
        return $this->belongsTo(SchoolSection::class,"section_id",'id');
    }

    public function academic_year(){
        return $this->belongsTo(AcademicYear::class,"academic_year_id",'id');
    }

}
