<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWork extends Model
{
    use HasFactory;

    public function getHomeWorkpdfShowAttribute(){
        return $this->home_workpdf != "" ? asset('public/upload/home_work/'. $this?->home_workpdf) : asset('public/frontend/images/No-image.jpg');
    }

    public function session(){
        return $this->belongsTo(Session::class,"session_id",'id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id",'id');
    }

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

    public function lession(){
        return $this->belongsTo(Lession::class,"lession_id",'id');
    }
}
