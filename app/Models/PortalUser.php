<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalUser extends Model
{
    use HasFactory;

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function education(){

        return $this->hasMany(Education::class, 'user_id');
    }

    public function experience(){

        return $this->hasOne(UserExperience::class, 'user_id');
    }

}
