<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['food', 'clothes', 'electronic'];

        $query = [];
        $now = now();

        for ($i = 1; $i <= 16; $i++) {
            $query[] = [
                'title' => "product $i",
                'description' => "description product $i",
                'category' => $categories[random_int(0, count($categories) - 1)],
                'price' => random_int(100, 1000),
                'image' => "https://example_image.jpg",
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('products')->upsert($query, 'id');
    }
}
