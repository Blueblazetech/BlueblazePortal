<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'certifications', 'skills', 'academic_qualification', 'experience', 'age', 'job_id', 'rank'];

    public function calculateScore()
    {
        $certificationScore = $this->calculateCertificationsScore();
        $skillsScore = $this->calculateSkillsScore();
        $academicScore = $this->calculateAcademicScore();
        $experienceScore = $this->calculateExperienceScore();
        $ageScore = $this->calculateAgeScore();
        $totalScore = ($certificationScore + $skillsScore + $academicScore + $experienceScore + $ageScore) / 5;

        return $totalScore;
    }

    private function calculateCertificationsScore()
    {
        if (!$this->user || !$this->job) {
            return 0;
        }

        $jobCertifications = $this->job->certificates->pluck('name')->toArray();

        $applicantCertifications = $this->user->certifications->pluck('name')->toArray();

        $matchedCertifications = array_intersect($jobCertifications, $applicantCertifications);
        $numMatches = count($matchedCertifications);

        $certificationWeight = 0.2;
        $maxScore = 1;

        return min($numMatches * $certificationWeight, $maxScore);
    }


    private function calculateAcademicScore()
    {
        if (!$this->user || !$this->job) {
            return 0;
        }
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

        $requiredQualification = $this->job->qtn;

        $applicantQualification = $this->user->education->pluck('qualifications')->toArray();

        if($applicantQualification){

            $applicantScore = $academicQualificationWeights[$applicantQualification] ?? 0;
            $requiredScore = $academicQualificationWeights[$requiredQualification] ?? 0;
            if ($applicantScore >= $requiredScore) {
                return $applicantScore;
            } else {
                return $applicantScore * 0.5;
            }
        }

        else {

            return 0;
        }


    }


    private function calculateExperienceScore()
    {
        if (!$this->user || !$this->job) {
            return 0;
        }

        // Experience weights
        $experienceWeights = [
            'fresher' => 0.2,
            '1-5years' => 0.4,
            '5-10years' => 0.6,
            '10-15years' => 0.8,
            '15+ years' => 1
        ];

        $requiredExperience = $this->job->exp->experience;
        $applicantExperience = (int) $this->user->portalUser->experience->accumulated;


        if ($applicantExperience == 0) {
            $applicantCategory = 'fresher';
        } elseif ($applicantExperience >= 1 && $applicantExperience <= 5) {
            $applicantCategory = '1-5years';
        } elseif ($applicantExperience > 5 && $applicantExperience <= 10) {
            $applicantCategory = '5-10years';
        } elseif ($applicantExperience > 10 && $applicantExperience <= 15) {
            $applicantCategory = '10-15years';
        } else {
            $applicantCategory = '15+ years';
        }

        $applicantScore = $experienceWeights[$applicantCategory] ?? 0;
        $requiredScore = $experienceWeights[$requiredExperience] ?? 0;

        return $applicantScore >= $requiredScore ? $applicantScore : $applicantScore * 0.5;
    }



    private function calculateAgeScore()
    {
        if (!$this->user || !$this->job) {
            return 0;
        }
        preg_match('/(\d+)-(\d+)/', $this->job->ages->age, $matches);

        if (!isset($matches[1], $matches[2])) {
            return 0;
        }

        $minAge = (int) $matches[1];
        $maxAge = (int) $matches[2];
        $applicantDob = $this->user->portalUser->date_of_birth;

        if ($applicantDob) {
            $applicantAge = Carbon::parse($applicantDob)->diffInYears(Carbon::now());
        } else {
            $applicantAge = null;
        }
        return ($applicantAge >= $minAge && $applicantAge <= $maxAge) ? 1 : 0;
    }

    private function calculateSkillsScore()
    {

        $jobSkills = $this->job->skills->pluck('name')->toArray();

        $userSkills = $this->user->skills->pluck('skill')->toArray();

        $matchingSkills = array_intersect($userSkills, $jobSkills);

        $skillWeight = 0.2;
        $maxScore = 1;

        $score = count($matchingSkills) * $skillWeight;

        return min($score, $maxScore);
    }


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

        public function job(){

            return $this->belongsTo(Job::class, 'job_id');
        }
}

