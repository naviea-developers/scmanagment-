<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacherAssent extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->belongsTo(User::class,"teacher_id",'id');
    }

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
    }

    public function schoolsection(){
        return $this->belongsTo(SchoolSection::class,"section_id",'id');
    }
}
