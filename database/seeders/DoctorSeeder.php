<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Doctor::create([
            'name' => 'Dr. Asif Ahmed',
            'slug' => 'asif-ahmend',
            'address' => 'Mohammadpur, Dhaka',
            'degree' => 'FCPS, MD',
            'specialization_id' => 1,
            'clinic_name' => 'Midford Hospital',
            'qualification' => 'Surgeon',
            'rating' => '4.1',
        ]);

        Doctor::create([
            'name' => 'Dr. Kazi Sabbir Hasan',
            'slug' => 'sabbir-hasan',
            'address' => 'Tepakhola, Faridpur',
            'degree' => 'FCPS, MD',
            'specialization_id' => 1,
            'clinic_name' => 'Faridpur Medical College',
            'qualification' => 'Medicine',
            'rating' => '4.5',
        ]);

        Doctor::create([
            'name' => 'Dr. Sayeeduzzaman Khan',
            'slug' => 'sayeed-khan',
            'address' => 'Mirpur DOHS, Dhaka',
            'degree' => 'FCPS, MD, FRCP',
            'specialization_id' => 1,
            'clinic_name' => 'United Hospital',
            'qualification' => 'Medicine',
            'rating' => '4.9',
        ]);
    }
}
