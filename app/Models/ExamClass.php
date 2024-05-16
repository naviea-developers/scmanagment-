<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamClass extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function examination(){
        return $this->belongsTo(Examination::class,"examination_id",'id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
    }
    
}
