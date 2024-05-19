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

    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
    }

    public function bulding(){
        return $this->belongsTo(Bulding::class,"bulding_id",'id');
    }

    public function floor(){
        return $this->belongsTo(Floor::class,"floor_id",'id');
    }

    public function teacher(){
        return $this->belongsTo(User::class,"teacher_id",'id');
    }

    public function room(){
        return $this->belongsTo(Room::class,"room_id",'id');
    }

    public function examClass(){
        return $this->belongsTo(ExamClass::class,"exam_class_id",'id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
    }

    public function schoolsection(){
        return $this->belongsTo(SchoolSection::class,"section_id",'id');
    }





}
