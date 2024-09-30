<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $query = [];
        $now = now();

        for ($i = 1; $i <= 26; $i++) {
            $query[] = [
                'author' => fake()->name,
                'description' => fake()->text(),
                'rating' => random_int(1, 5),
                'product_id' => random_int(1, 16),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('reviews')->upsert($query, 'id');
    }
}
