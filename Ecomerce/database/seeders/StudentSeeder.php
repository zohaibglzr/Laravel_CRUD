<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the JSON file content
        $json = File::get(path: 'database/json/Student.json');

        // Decode the JSON data into an array
        $students = json_decode($json);

        // Insert the data into the students table
        foreach ($students as $student) {
            Student::create([
                'name' => $student->name,
                'age' => $student->age,
                'gender' => $student->gender,
            ]);
        }
    }
}
