<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dermatologist;
use Illuminate\Support\Facades\Hash;

class DermatologistSeeder extends Seeder
{
    public function run()
    {
        Dermatologist::create([
            'name' => 'Dr. Cuddy',
            'email' => 'cuddy@example.com',
            'password' => Hash::make('password'), // You can use 'password' as default
        ]);

        Dermatologist::create([
            'name' => 'Dr. House',
            'email' => 'house@example.com',
            'password' => Hash::make('password1'),
        ]);

        Dermatologist::create([
            'name' => 'Dr. Wilson',
            'email' => 'wilson@example.com',
            'password' => Hash::make('password2'),
        ]);
    }
}
