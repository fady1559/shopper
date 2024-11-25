<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data
        $subcategories = [
            [
                'name' => 'Mobile Phones',
                'category_id' => 1, // Assuming category ID 1 exists for 'Electronics'
                'description' => 'Latest mobile phones from various brands.',
                'status' => true,
                'image' => 'images/subcategories/mobile_phones.jpg',
            ],
            [
                'name' => 'Laptops',
                'category_id' => 1, // Assuming category ID 1 exists for 'Electronics'
                'description' => 'High-performance laptops for work and gaming.',
                'status' => true,
                'image' => 'images/subcategories/laptops.jpg',
            ],
            [
                'name' => 'Men\'s Fashion',
                'category_id' => 2, // Assuming category ID 2 exists for 'Fashion'
                'description' => 'Trendy and stylish clothing for men.',
                'status' => true,
                'image' => 'images/subcategories/mens_fashion.jpg',
            ],
            [
                'name' => 'Women\'s Fashion',
                'category_id' => 2, // Assuming category ID 2 exists for 'Fashion'
                'description' => 'Latest trends in women\'s clothing.',
                'status' => true,
                'image' => 'images/subcategories/womens_fashion.jpg',
            ],
            [
                'name' => 'Kitchen Appliances',
                'category_id' => 3, // Assuming category ID 3 exists for 'Home & Kitchen'
                'description' => 'Essential appliances for every kitchen.',
                'status' => true,
                'image' => 'images/subcategories/kitchen_appliances.jpg',
            ],
        ];

        // Insert sample data into the subcategories table
        DB::table('subcategories')->insert($subcategories);
    }
}
