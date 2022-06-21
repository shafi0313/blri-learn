<?php

namespace Database\Seeders;

use App\Models\Layout;
use Illuminate\Database\Seeder;

class LayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layout::create([
            'user_id' => 1,
            'logo_header' => null,
            'navbar_header' => null,
            'sidebar' => null,
            'background' => null,
            'tbl' => null,
            'tbl_bg' => null,
            'tbl_text' => null,
            'submit_btn' => null,
            'create_btn' => null,
        ]);
    }
}
