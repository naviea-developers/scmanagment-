<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
     protected $fillable = [
        'currency_name',
		'currency_icon',
		'currency_position',
		'thousands_separator',
		'decimal_separator',
		'decimal_digit',
		'is_default',
		'exchange_rate',
    ];
}
