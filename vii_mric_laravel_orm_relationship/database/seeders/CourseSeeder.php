<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDate = Carbon::now()->format('d-m-y');
        $courses = [
            [
                'name' => 'C/C++',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'HTMl',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'CSS',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'JavaScript',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'PHP',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'Laravel/Api',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'Web front-end',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'Jquery',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'React-js',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'Nuxt-js',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'Web Vue',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'Fulter',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
            [
                'name' => 'Bring Boost',
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ],
        ];

        DB::table('course_models')->insert($courses);
    }
}
