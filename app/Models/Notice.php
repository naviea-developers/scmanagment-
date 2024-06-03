<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    public function getNoticeFileShowAttribute(){
        return $this->notice_file != "" ? asset('public/upload/notice_file/'. $this?->notice_file) : asset('public/frontend/images/No-image.jpg');
    }
}
