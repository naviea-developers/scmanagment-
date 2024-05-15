<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTestExam extends Model
{
    use HasFactory;

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/class_test_exam/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
    }

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }
}
