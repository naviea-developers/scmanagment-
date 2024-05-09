<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDetails extends Model
{
    use HasFactory;
    function getTickIconAttribute(){
        return asset('public/frontend/images/see-all-package-image/tick.png');
    }
}
