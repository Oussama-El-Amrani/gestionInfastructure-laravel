<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'state',
        'date_taken',
        'date_delivery',
        'comment',
        'user_full_name'
    ];
}
