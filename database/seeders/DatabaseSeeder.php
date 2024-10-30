<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();

        User::factory()->create([
            'name'      => 'Test User',
            'email'     => 'test@test.com',
            'password'  => 'password',
        ]);

         $this->call(ProductSeeder::class);
         $this->call(ColorProductSeeder::class);
         $this->call(ProductSizeSeeder::class);
         $this->call(CouponSeeder::class);
    }
}
