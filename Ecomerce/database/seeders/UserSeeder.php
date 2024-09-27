<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create(
        //     [
        //         'name' => 'zohaib',
        //         'email' => 'zohaib@example.com',
        //         'password' => bcrypt('@1234'),
        //         'last_login' => now()
        //     ]
        //     );
        \App\Models\User::factory(2)->create();
    }
}
