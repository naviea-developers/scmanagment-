<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
use App\Models\Classe;
use App\Models\SchoolSection;
class FeeCollection extends Model
{
    use HasFactory;
    function session(){
        return $this->belongsTo(Session::class,'session_id');
    }
    function s_class(){
        return $this->belongsTo(Classe::class,'class_id');
    }
    function section(){
        return $this->belongsTo(SchoolSection::class,'section_id');
    }
    function items(){
        return $this->hasMany(FeeCollectionItem::class,'collection_id');
    }
}
