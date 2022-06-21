<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'user_id' => 1,
            'course_cat_id' => 1,
            'name' => 'গরু মোটাতাজাকরণ (Beef Fattening) Demo',
            'skill_level' => 'শিক্ষানবিস',
            'language' => 'English',
            'image' => 'course784439.jpg',
            'video_des' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/bOAsGPFcwz0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => '<h3> এই কোর্সের উদ্দেশ্যগুলো হলঃ</h3>
            <p>১। গরু মোটাতাজা করে আত্নকর্মসংস্থান তৈরি করার পাশাপাশি প্রানিজ আমিষের প্রয়োজন মেটানো।</p>
            <p>২। গরু মোটাতাজা করার বিভিন্ন ধাপ/প্রক্রিয়া সম্পর্কিত জ্ঞান বৃদ্ধি করা।</p>
            <p>৩। গরুর খাদ্য প্রস্তুত প্রণালী ও পরিচর্যা সম্পর্কিত দক্ষতা উন্নয়ন করা । </p>',
            'instructor' => 'Admin',
        ]);

    }
}
