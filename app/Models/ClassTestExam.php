<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTestExam extends Model
{
    use HasFactory;

    public function getClassExampdfShowAttribute(){
        return $this->class_exampdf != "" ? asset('public/upload/class_test_exam/'. $this?->class_exampdf) : asset('public/frontend/images/No-image.jpg');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
    }

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function schoolsection(){
        return $this->belongsTo(SchoolSection::class,"section_id",'id');
    }

    
    public function lession(){
        return $this->belongsTo(Lession::class,"lession_id",'id');
    }
}
