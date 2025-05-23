<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 *
 *
 * @property mixed $password
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin(){

        return $this->role_id ==='1';
    }

    public function role(){

        return $this->belongsTo(Role::class, 'role_id');
    }

    public function company(){

        return $this->belongsTo(Company::class, 'company_id');
    }

    public function applicant(){

        return $this->hasmany(Role::class, 'user_id');
    }

    public function portalUser(){

        return $this->hasOne(PortalUser::class, 'user_id');
    }

    public function jobApplicants(){

        return $this->hasMany(JobApplicant::class, 'user_id');
    }

    public function certifications(){

        return $this->hasMany(UserCertificates::class, 'user_id');
    }

    public function skills(){

        return $this->hasMany(UserSkill::class, 'user_id');
    }

    public function education(){

        return $this->hasMany(Education::class, 'user_id');
    }

    public function experience(){

        return $this->hasMany(UserExperience::class, 'user_id');
    }

    public function resume(){

        return $this->hasOne(UserAttachment::class, 'user_id')->where('name','user_cv');
    }

    public function video(){

        return $this->hasOne(UserAttachment::class, 'user_id')->where('name','user_video');
    }
}
