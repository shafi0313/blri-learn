<?php

namespace Database\Seeders;

use App\Models\CourseCat;
use Illuminate\Database\Seeder;

class CourseCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseCat::create([
            'name' => 'আত্মকর্মসংস্থান',
        ]);
    }
}
