<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DermatologistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('dermatologists')->insert([
            [
                'name' => 'Dr. John Smith',
                'available_days' => 'Monday, Wednesday, Friday',
                'available_times' => '9:00-12:00, 13:00-17:00',
            ],
            [
                'name' => 'Dr. Emily Davis',
                'available_days' => 'Tuesday, Thursday, Saturday',
                'available_times' => '10:00-13:00, 14:00-18:00',
            ],
            [
                'name' => 'Dr. Michael Lee',
                'available_days' => 'Monday, Tuesday, Thursday',
                'available_times' => '8:00-11:00, 12:00-16:00',
            ],
        ]);
    }
}
