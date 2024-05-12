<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public function start_year(){
        return $this->belongsTo(AcademicYear::class,"start_year_id",'id');
    }
    public function end_year(){
        return $this->belongsTo(AcademicYear::class,"end_year_id",'id');
    }

}
