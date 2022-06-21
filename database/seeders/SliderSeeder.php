<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title' => 'বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট',
            'text' => 'অনলাইন লার্নিং প্লাটফর্ম',
            'link' => '',
            'image' => 'slider7437.png',
            'status' => '1',
        ]);
    }
}
