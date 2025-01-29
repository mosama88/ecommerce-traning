<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

      


        $this->call([
            DiscountSeeder::class,
            AuthorSeeder::class,
            CategorySeeder::class,
            FlashSaleSeeder::class,
            PublisherSeeder::class,
            ContactUsSeeder::class,
            ShippingAreaSeeder::class,
            PageSeeder::class,
            OrderSeeder::class,
            BookSeeder::class,
        ]);
    }
}