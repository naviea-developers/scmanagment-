<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/about/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }
    function getBannerImageShowAttribute(){
        return $this->banner_image == '' ? $this->no_image : asset("public/upload/faq/".$this->banner_image);
    }
}
