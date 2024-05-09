<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseConten extends Model
{
    use HasFactory;

    public function getContenImageShowAttribute(){
        return $this->conten_image != "" ? asset('public/upload/conten_image/'. $this?->conten_image) : asset('public/frontend/images/No-image.jpg');
    }
}