<?php

namespace Database\Seeders\ResearchArea;

use App\Models\ResearchArea\ResearchArea;
use Illuminate\Database\Seeder;

class ResearchAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResearchArea::factory()->count(10)->create();
    }
}
