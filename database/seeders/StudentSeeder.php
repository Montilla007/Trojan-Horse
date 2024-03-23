<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'Marcuss',
                'email' => 'marcuss@gmail.com',
                'studentnum' => '03-2223-039052',
                'section' => 'BSIT2-3',
                'year_level' => 1,
                'password' => bcrypt('marcuss'),
            ],
            [
                'name' => 'John',
                'email' => 'john@gmail.com',
                'studentnum' => '03-2223-022032',
                'section' => 'BSIT2-4',
                'year_level' => 2,
                'password' => bcrypt('john123'),
            ],
            [
                'name' => 'Kevin',
                'email' => 'kevin@gmail.com',
                'studentnum' => '03-2223-055092',
                'section' => 'BSIT2-2',
                'year_level' => 2,
                'password' => bcrypt('kevin123'),
            ],
        ]);
    }
}
