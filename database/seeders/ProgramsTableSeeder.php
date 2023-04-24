<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::find(7)->programs()->createMany([
            [
                'name' => 'Tổng quan khóa học',
                'source_code' => 'https://www.youtube.com/watch?v=1A7JUhcHQzI',
                'type' => 'video',
            ],
            [
                'name' => 'Khái niệm bất đồng bộ trong Javascript',
                'source_code' => 'https://www.youtube.com/watch?v=IkKDSS_6qy4',
                'type' => 'video',
            ],
            [
                'name' => 'HTTP Request trong Javascript    ',
                'source_code' => 'https://www.youtube.com/watch?v=jHOop6IefiI&list=PLncHg6Kn2JT4eGJ__iQv6BrvL_YnZLHyX&index=3',
                'type' => 'video',
            ],

        ]);
    }
}
