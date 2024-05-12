<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScheduleItem extends Model
{
    use HasFactory;


    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
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

   
}
