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

        for ($i = 1; $i <= 10000; $i++) {
            // Random year from 2015 to 2025
            $randomYear = rand(2015, 2025);
            // Random month and day
            $randomMonth = rand(1, 12);
            $randomDay = rand(1, 28); // safe to avoid invalid dates like Feb 30

            $randomPostedOn = Carbon::create($randomYear, $randomMonth, $randomDay);

            // Ending date between 7 and 60 days after posted date
            $randomEndingOn = (clone $randomPostedOn)->addDays(rand(7, 60));

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
