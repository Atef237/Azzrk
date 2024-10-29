<?php

namespace Database\Seeders;

use App\Models\ColorProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ColorProduct::factory(2000)->create();
    }
}
