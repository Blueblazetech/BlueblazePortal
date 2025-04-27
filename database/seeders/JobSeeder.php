<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    {
        $titles = [
            'Software Engineer', 'PHP Developer', 'IT Support Technician', 'Network Administrator',
            'Full Stack Developer', 'Mobile App Developer', 'Database Administrator',
            'Cybersecurity Analyst', 'Web Developer', 'Cloud Solutions Architect'
        ];

        for ($i = 1; $i <= 100; $i++) {
            $randomPostedOn = Carbon::create(2025, 4, rand(1, 30)); // Random day in April 2025
            $randomEndingOn = (clone $randomPostedOn)->addDays(rand(7, 45)); // Ending between 1 week to 1.5 months later

            // Ensure ending_on doesn't go too far (max May 31, 2025)
            if ($randomEndingOn->gt(Carbon::create(2025, 5, 31))) {
                $randomEndingOn = Carbon::create(2025, 5, rand(20, 31));
            }

            DB::table('jobs')->insert([
                'title' => $titles[array_rand($titles)],
                'description' => 'This is a job description for ' . $titles[array_rand($titles)],
                'posted_on' => $randomPostedOn,
                'ending_on' => $randomEndingOn,
                'requirements' => 'Relevant experience in ' . $titles[array_rand($titles)],
                'category_id' => 1,
                'posted_by' => 1,
                'age' => rand(22, 40),
                'location_id' => 2,
                'experience' => ($i % 2 == 0) ? 5 : 1,
                'salary_range' => ($i % 2 == 0) ? 2500 : 500,
                'qualifications' => 'Bachelor\'s degree or diploma',
                'benefits' => 'Health Insurance, Transport Allowance',
                'notes' => 'Ability to work independently.',
                'employment_type' => ($i % 2 == 0) ? 2 : 1,
                'position_id'=>'1',
                'status' => 'Active'
            ]);
        }

    }
}
}
