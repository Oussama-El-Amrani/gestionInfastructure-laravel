<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'pin',
        'certificate_expiration_date',
        'machine_name',
        'password',
        'last_access_date',
        'update_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
