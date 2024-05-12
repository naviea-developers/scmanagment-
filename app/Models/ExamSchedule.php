<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function examination(){
        return $this->belongsTo(Examination::class,"examination_id",'id');
    }

    public function exam_schedule_items(){
        return $this->hasMany(ExamScheduleItem::class,"examschedule_id",'id');
    }
}
