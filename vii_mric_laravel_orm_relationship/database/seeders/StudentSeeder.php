<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDate = Carbon::now()->format('d/m/y');
        $students = [
            [
                'name' => 'Mric Meng',
                'created_at' => $currentDate,
                'updated_at' => $currentDate
            ],
            [
                'name' => 'Ying Ying',
                'created_at' => $currentDate,
                'updated_at' => $currentDate
            ],
            [
                'name' => 'Meng Chomraoen',
                'created_at' => $currentDate,
                'updated_at' => $currentDate
            ],
            [
                'name' => 'Tep Naron',
                'created_at' => $currentDate,
                'updated_at' => $currentDate
            ],
            [
                'name' => 'Mric Ying',
                'created_at' => $currentDate,
                'updated_at' => $currentDate
            ],
            [
                'name' => 'Kit Meng',
                'created_at' => $currentDate,
                'updated_at' => $currentDate
            ],
        ];

        DB::table('student_models')->insert($students);
    }
}
