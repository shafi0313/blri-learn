<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LayoutSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(CourseCatSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(ChapterSeeder::class);
        $this->call(LectureSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(DistrictSeeder::class);
    }
}
