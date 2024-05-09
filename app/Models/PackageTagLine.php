<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTagLine extends Model
{
    use HasFactory;

    public function getIconShowAttribute(){
        return $this->icon != "" ? asset('public/upload/package/icons/'. $this?->icon) : asset('public/frontend/images/No-image.jpg');
    }
    public function details(){
        return $this->hasMany(PackageDetails::class,"packagetagline_id",'id');
    }
}
