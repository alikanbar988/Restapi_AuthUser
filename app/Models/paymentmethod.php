<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentmethod extends Model
{
    use HasFactory;
    protected $fillable=[
        'CARD NUMBER',
        'NAME ON CARD',
        'EXPIRY DATE',
        'CVV'
    ];
}
