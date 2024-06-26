<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,"user_id",'id');
    }
    public function event(){
        return $this->belongsTo(Event::class,"event_id",'id');
    }
}
