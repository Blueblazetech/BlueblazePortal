<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(
            [
                'name'=>'Brendon',
                'email'=>'blueblazetech1@gmail.com',
                'password'=>'00000Six',
                'role_id'=>1,
            ]
        );

    }
}
