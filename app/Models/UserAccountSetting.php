<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccountSetting extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'country',
        'city',
        'province',
        'is_available',
        'is_public',
        'is_active',
        'job_preference',

    ];
}
