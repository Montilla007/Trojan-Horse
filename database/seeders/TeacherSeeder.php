<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            [
                'name' => 'Joe',
                'email' => 'Joe@gmail.com',
                'department' => 'CITE',
                'password' => bcrypt('joe123'),
            ],
            [
                'name' => 'Frank',
                'email' => 'frank@gmail.com',
                'department' => 'CITE',
                'password' => bcrypt('frank123'),
            ],
            [
                'name' => 'Billy',
                'email' => 'billy@gmail.com',
                'department' => 'CITE',
                'password' => bcrypt('billy123'),
            ],
        ]);
    }
}
