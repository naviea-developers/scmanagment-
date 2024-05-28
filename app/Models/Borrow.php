<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(Admission::class,"student_id",'id');
    }
    public function borrowItems(){
        return $this->hasMany(BorrowItem::class,"borrow_id",'id');
    }

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }

}
