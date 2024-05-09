<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorPageContent extends Model
{
    use HasFactory;

    public function getContentimageShowAttribute(){
        return $this->contentimage != "" ? asset('public/upload/instructor/contentimage/'. $this?->contentimage) : asset('public/frontend/images/No-image.jpg');
    }

}
