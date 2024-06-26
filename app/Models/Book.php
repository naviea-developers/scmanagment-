<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/book/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }

    public function class(){
        return $this->belongsTo(Classe::class,"class_id",'id');
    }
    public function group(){
        return $this->belongsTo(Group::class,"group_id",'id');
    }
    public function shelf(){
        return $this->belongsTo(Shelf::class,"shelf_id",'id');
    }
}
