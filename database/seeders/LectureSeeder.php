<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lecture::create(
            [
                'user_id' => 1,
                'course_id' => 1,
                'chapter_id' => 1,
                'type' => 2,
                'name' => '১.১। সুবিধা',
                'text' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/xwVThpr0RGg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'time' => '1:21',
            ],
            [
                'user_id' => 1,
                'course_id' => 1,
                'chapter_id' => 1,
                'type' => 2,
                'name' => '১.২। গরু মোটাতাজা করণের ধাপ সমূহ',
                'text' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/WQ0p3Op_gzI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'time' => '1:21',
            ],
            [
                'user_id' => 1,
                'course_id' => 1,
                'chapter_id' => 1,
                'type' => 2,
                'name' => '১.৩। উপযুক্ত সময় নির্ধারণ',
                'text' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/WQ0p3Op_gzI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'time' => '1:21',
            ],
        );
    }
}
