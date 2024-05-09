<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLessonVideo extends Model
{
    use HasFactory;

    public function getLessonVideoShowAttribute(){
        return $this->lesson_video != "" ? asset('public/upload/coursevideo/'. $this?->lesson_video) : asset('public/frontend/images/no-video.jpg');
    }
}
