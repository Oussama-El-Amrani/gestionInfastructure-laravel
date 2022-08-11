<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        'state',
        'date_taken',
        'date_delivery',
        'comment',
        'user_id'
        // 'user_full_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
