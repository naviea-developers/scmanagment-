<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function getImageShowAttribute(){
        return $this->image != "" ? asset('public/upload/gallery/'. $this?->image) : asset('public/frontend/images/No-image.jpg');
    }
    public function getThumbnailShowAttribute(){
        return $this->thumbnail != "" ? asset('public/upload/gallery/thumbnail/'. $this?->thumbnail) : asset('public/frontend/images/No-image.jpg');
    }
    public function getVideoShowAttribute(){
        return $this->video != "" ? asset('public/upload/gallery/video/'. $this?->video) : asset('public/img/video-icon.png');
    }
}
