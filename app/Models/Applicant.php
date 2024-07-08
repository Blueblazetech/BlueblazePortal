<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'certifications', 'skills', 'academic_qualification', 'experience', 'age', 'job_id'];

    public function calculateScore()
    {
        $certificationScore = $this->calculateCertificationScore();
        $skillsScore = $this->calculateSkillsScore();
        $academicScore = $this->calculateAcademicScore();
        $experienceScore = $this->calculateExperienceScore();
        $ageScore = $this->calculateAgeScore();

        // Sum up scores and normalize to a maximum of 5
        $totalScore = ($certificationScore + $skillsScore + $academicScore + $experienceScore + $ageScore) / 5;

        return $totalScore;
    }

    private function calculateCertificationScore()
    {
        // Assuming certifications are stored as an array in the certifications attribute
        $numCertifications = count($this->certifications);
        $certificationWeight = 0.2;
        $maxScore = 1;

        return min($numCertifications * $certificationWeight, $maxScore);
    }

    private function calculateSkillsScore()
    {
        // Assuming skills are stored as an array in the skills attribute
        $numSkills = count($this->skills);
        $skillWeight = 0.2;
        $maxScore = 1;

        return min($numSkills * $skillWeight, $maxScore);
    }

    private function calculateAcademicScore()
    {
        $academicQualificationWeights = [
            'Literate' => 0.1,
            'O-level' => 0.2,
            'A-level' => 0.3,
            'Diploma' => 0.4,
            'Bachelor\'s Degree' => 0.5,
            'Master\'s Degree' => 0.6,
            'Doctorate' => 0.8,
            'Professor' => 1
        ];

        $qualification = $this->academic_qualification;
        return $academicQualificationWeights[$qualification] ?? 0;
    }

    private function calculateExperienceScore()
    {
        $experienceWeights = [
            'fresher' => 0.2,
            '1-5years' => 0.4,
            '5-10years' => 0.6,
            '10-15years' => 0.8,
            'over 15 years' => 1
        ];

        $experience = $this->experience;
        return $experienceWeights[$experience] ?? 0;
    }

    private function calculateAgeScore()
    {

        $jobId = $this->job_id;
        $job = Job::find($jobid);
        $minRange = $job->minAge;
        $maxRange = $job->uppAge;

        if($this->age >= $minRange && $this->age <= $maxRange){

            return 1;
        }
            else{

                return 0;
            }


        }

        // Define age range in job description and compare with applicant's age
        // Return 1 if age falls within the defined range, else 0
        // Example:
        // if ($this->age >= $minAge && $this->age <= $maxAge) {
        //     return 1;
        // } else {
        //     return 0;
        // }

        public function user(){

            return $this->belongsTo(User::class, 'user_id');
        }

        public function skills(){

            return $this->hasMany(ApplicantSkill::class, 'applicant_id');
        }
        public function applications(){

            return $this->hasMany(Application::class, 'applicant_id');
        }
        public function applicantAttachments(){

            return $this->hasMany(ApplicantAttachment::class, 'applicant_id');
        }

        public function education(){

            return $this->hasMany(Education::class, 'applicant_id');
        }
}
