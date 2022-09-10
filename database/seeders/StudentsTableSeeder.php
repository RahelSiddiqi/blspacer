<?php

namespace Database\Seeders;

use App\Stuent;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'name' => "Shagor Hawladar",
            'father' => "Matbor Hawladar",
            'mother' => "Akhlima khatun",
            'dateofbirth' => "12-05-2010",
            'sex' => "male",
            'class' => "Six",
            'roll' => "23",
            'image' => ""
        ]);

        Student::create([
            'name' => "Shamima khan",
            'father' => "Hawladar khan",
            'mother' => "Rokeya khatun",
            'dateofbirth' => "09-75-2011",
            'sex' => "male",
            'class' => "Six",
            'roll' => "23",
            'image' => ""
        ]);
    }
}
