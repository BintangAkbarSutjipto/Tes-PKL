<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Product::factory(1)->create();
        \App\Models\Transaction::factory(10)->create([
            "product_id" => 1
        ]);
            
        
        
        // \App\Models\Transaction::factory(10)->create([
        //     //'name' => fake()->name(),
        //     'price' => 10000,
        // ]);
    }
}
