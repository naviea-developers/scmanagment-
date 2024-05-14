<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoutineItem extends Model
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

    public function classDuration(){
        return $this->belongsTo(ClassDuration::class,"class_duration_id",'id');
    }

    function getDayAttribute(){
        if ($this->day_id==1)
            return "Saturday";
        else if($this->day_id==2)
            return "Sunday";
        else if($this->day_id==3)
           return "Monday";
        else if($this->day_id==4)
            return "Tuesday";
        else if($this->day_id==5)
            return "Wednesday";
        else if($this->day_id==6)
            return "Thursday";
        else if($this->day_id==7)
        return "Friday";
    }

    
}
