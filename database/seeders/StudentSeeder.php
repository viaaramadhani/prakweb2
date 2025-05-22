<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'Octavia Ramadhani',
                'student_id_number' => 'F55123015',
                'email' => 'ramadhanivia489@gmail.com',
                'phone_number' => '085398643661',
                'birth_date' => '2004-10-20',
                'gender' => 'Female',
                'status' => 'Active',
                'major_id' => 1,
            ],
            [
                'name' => 'Faiz Zulhilmi',
                'student_id_number' => 'F55123001',
                'email' => 'faizulhilmi@gmail.com',
                'phone_number' => '085398643661',
                'birth_date' => '2009-12-25',
                'gender' => 'Male',
                'status' => 'Inactive',
                'major_id' => 2,
            ],
        ]);
    }
}