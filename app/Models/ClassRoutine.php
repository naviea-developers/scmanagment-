<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoutine extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
    }

    public function class_routine_items(){
        return $this->hasMany(ClassRoutineItem::class,"class_routine_id",'id');
    }

    public function teacher(){
        return $this->belongsTo(User::class,"teacher_id",'id');
    }

    public function schoolsection(){
        return $this->belongsTo(SchoolSection::class,"section_id",'id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
    }
    public function section(){
        return $this->belongsTo(SchoolSection::class,"section_id",'id');
    }

    public function classDuration(){
        return $this->belongsTo(ClassDuration::class,"class_duration_id",'id');
    }

    public function room(){
        return $this->belongsTo(Room::class,"room_id",'id');
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
