<?php

namespace Database\Seeders;

use App\Models\Sejarah;
use Illuminate\Database\Seeder;

class SejarahSeeder extends Seeder
{
    public function run(): void
    {
        Sejarah::create([
            "description" => fake()->paragraphs(5, true),
        ]);
    }
}
