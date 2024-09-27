<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(path: 'database/json/Contact.json');

        $contacts = json_decode($json);

        foreach($contacts as $contact){
            Contact::create([
                'eamil' => $contact->eamil,
                'phone' => $contact->phone,
                'address' => $contact->address,
                'city' => $contact->city,
                'student_id' => $contact->student_id,
            ]);

        }
    }
}
