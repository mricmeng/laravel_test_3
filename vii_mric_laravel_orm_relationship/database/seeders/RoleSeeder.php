<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'App'
            ],
            [
                'name' => 'Wes'
            ],
            [
                'name' => 'Designer'
            ],
            [
                'name' => 'Full Stack'
            ]
        ];
        
        DB::table('role_models')->insert($roles);
    }
}
