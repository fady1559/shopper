<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data
        $categories = [
            [
                'title' => 'Electronics',
                'description' => 'Devices, gadgets, and other electronic items.',
                'image' => 'images/categories/electronics.jpg',
                'create_user_id' => 1,  // Assuming user ID 1 exists
                'update_user_id' => 1,   // Assuming user ID 1 exists
            ],
            [
                'title' => 'Fashion',
                'description' => 'Clothing, accessories, and fashion items.',
                'image' => 'images/categories/fashion.jpg',
                'create_user_id' => 1,
                'update_user_id' => 1,
            ],
            [
                'title' => 'Home & Kitchen',
                'description' => 'Furniture, appliances, and kitchenware.',
                'image' => 'images/categories/home_kitchen.jpg',
                'create_user_id' => 1,
                'update_user_id' => 1,
            ],
            [
                'title' => 'Books',
                'description' => 'Books of all genres and types.',
                'image' => 'images/categories/books.jpg',
                'create_user_id' => 1,
                'update_user_id' => 1,
            ],
            [
                'title' => 'Toys & Games',
                'description' => 'Toys for children of all ages.',
                'image' => 'images/categories/toys_games.jpg',
                'create_user_id' => 1,
                'update_user_id' => 1,
            ],
        ];

        // Insert sample data into the categories table
        DB::table('categories')->insert($categories);
    }
}
