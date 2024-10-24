<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Ensure this path is correct
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a dummy super-admin user
        User::create([
            'First_name' => 'John',
            'Last_name' => 'Doe',
            'mobile_number' => '1234567890',
            'email' => 'admin@gmail.com',
            'address' => '123 Main St, Anytown, USA',
            'role' => 'admin',
            'common_id' => null, // Adjust as needed
            'password' => Hash::make('password123'),
        ]);
    }
}
