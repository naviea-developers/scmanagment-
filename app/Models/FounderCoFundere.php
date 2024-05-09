<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FounderCoFundere extends Model
{
    use HasFactory;

    public function getImageShowAttribute(){
        return $this->image != "" ? asset("public/upload/founder-co-funder/".$this->image) : asset("public/frontend/images/no-profile.jpg");
    }
}
