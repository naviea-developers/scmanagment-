<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public function b_category(){
        return $this->belongsTo(Category::class,"category_id",'id');
    }

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/banner/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }
    public function getImage2ShowAttribute(){
        return $this->image2 != "" ? asset('public/upload/banner/'. $this?->image2) : asset('public/frontend/images/No-image.jpg');
    }
    public function getBackgroundImageShowAttribute(){
        return $this->background_image != "" ? asset('public/upload/banner/'. $this?->background_image) : asset('public/frontend/images/No-image.jpg');
    }
}
