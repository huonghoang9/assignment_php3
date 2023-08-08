<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = [];
        for($i=1; $i<6; $i++){
            $test[] = [
               "name" => "Hoang Huong",
               "gender" =>1,
               "phone" =>"0123456789",
               "address" =>"Nam Tu Liem",
               "image" => ""
            ];
        }
        DB::table('students')->insert($test);
    }
}
