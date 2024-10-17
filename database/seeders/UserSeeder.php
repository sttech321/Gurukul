<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Include your User model
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a dummy super-admin user
        User::create([
            'First_name' => 'John',
            'Last_name' => 'Doe',
            'Phone' => '1234567890',
            'email' => 'john.doe@example.com',
            'address' => '123 Main St, Anytown, USA',
            'role' => 'super-admin',
            'password' => Hash::make('password123'),
        ]);
    }
}
