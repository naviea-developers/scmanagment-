<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyClass extends Model
{
    use HasFactory;

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
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

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/daily_class/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }

    public function getVideoThumbnailShowAttribute(){
        return $this->video_thumbnail != "" ? asset('public/upload/daily_class/'. $this?->video_thumbnail) : asset('public/frontend/images/No-image.jpg');
    }




}
