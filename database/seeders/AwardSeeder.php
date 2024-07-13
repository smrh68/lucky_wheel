<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Award::factory()->create([
            'title' => 'empty',
            'coefficient' => 2,
            'inventory' => 0,
        ]);

        Award::factory(9)->create();
    }
}
