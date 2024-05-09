<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public function b_category(){
        return $this->belongsTo(Category::class,"category_id",'id');
    }
    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/slider/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }


}