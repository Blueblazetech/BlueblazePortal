<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\JobSkill;
use App\Models\JobTitle;
use App\Models\Application;
use App\Models\JobCategory;
use App\Models\JobPosition;
use App\Models\JobAttachment;
use App\Models\JobCertificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function updateJobStatus()
    {
        $today = Carbon::today();


        self::where('to_date', '<', $today)
            ->update(['status' => 'Expired']);

        self::where('to_date', '>=', $today)
            ->update(['status' => 'Active']);
    }

    public function category(){

        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    public function positions(){

        return $this->belongsTo(JobPosition::class, 'position_id');

    }

    public function skills(){

        return $this->hasMany(JobSkill::class, 'job_id');

    }

    public function certificates(){

        return $this->hasMany(JobCertificate::class, 'job_id');
    }

    public function attachments(){

        return $this->hasMany(JobAttachment::class, 'job_id');
    }

    public function applications(){

        return $this->hasMany(Application::class, 'job_id');
    }

    public function title(){

        return $this->hasOne(JobTitle::class, 'title');
    }

}
