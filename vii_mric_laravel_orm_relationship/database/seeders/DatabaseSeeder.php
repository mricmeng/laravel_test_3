<?php

namespace Database\Seeders;

use App\Models\PostModel;
use App\Models\StudentCourse;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PostModel::factory(20)->create();
        StudentCourse::factory(21)->create();
    }
}
