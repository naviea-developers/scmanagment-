<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    
    public function teacher(){
        return $this->belongsTo(User::class,"class_teacher_id",'id');
    }

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/class/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }

    public function teacherAssents(){
        return $this->hasMany(SubjectTeacherAssent::class,"class_id",'id');
    }

    public function subjects(){
        return $this->hasMany(Subject::class,"class_id",'id');
    }

    public function examSchedules(){
        return $this->hasMany(ExamSchedule::class,"class_id",'id');
    }

    public function examClasss(){
        return $this->hasMany(ExamClass::class,"class_id",'id');
    }

    public function classRoutines(){
        return $this->hasMany(ClassRoutine::class,"class_id",'id');
    }

    public function groups(){
        return $this->hasMany(Group::class,"class_id",'id');
    }



}