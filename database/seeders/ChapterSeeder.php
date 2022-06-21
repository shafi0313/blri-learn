<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chapter::create(
            [
                'course_id' => 1,
                'name' => '১। গরু মোটাতাজা করণ প্রকল্প',
            ],
            [
                'course_id' => 1,
                'name' => '২। গরুর খাদ্য ও পরিচর্যা',
            ],
        );
    }
}
