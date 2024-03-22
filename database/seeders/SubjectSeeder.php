<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            [
                'subject_code' => 'ITE 393',
                'description' => 'Applications Development and Emerging Technologies (including Event-Driven Programming)',
            ],
            [
                'subject_code' => 'ITE 308',
                'description' => 'Web System and Technologies',
            ],
            [
                'subject_code' => 'ITE 380',
                'description' => 'Human Computer Interaction 2',
            ],
            [
                'subject_code' => 'ITE 400',
                'description' => 'Systems Integration and Architecture',
            ],
        ]);
    }
}
