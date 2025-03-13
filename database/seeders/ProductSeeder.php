<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Silver Ring',
                'description' => 'A beautiful silver ring with intricate design.',
                'price' => 1999.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Silver Bracelet',
                'description' => 'A stylish silver bracelet for casual and formal wear.',
                'price' => 2999.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
