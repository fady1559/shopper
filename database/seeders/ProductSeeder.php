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
        // Sample data with real image URLs
        $products = [
            [
                'name' => 'iPhone 14',
                'short_description' => 'Latest Apple smartphone with advanced features.',
                'description' => 'The iPhone 14 features a sleek design, advanced camera systems, and the A16 Bionic chip for exceptional performance.',
                'price' => '999',
                'selling_price' => '899',
                'image' => 'https://images.apple.com/v/iphone-14/home/bk/images/overview/hero/hero_hero__d4xoqwfnilhy_large_2x.jpg',
                'qty' => '50',
                'tax' => '0.15',
                'status' => 1,
                'trend' => 1,
                'meta_title' => 'iPhone 14 - Apple',
                'meta_keywords' => 'iphone, apple, smartphone, mobile',
                'meta_description' => 'Buy the latest iPhone 14 with top features and stunning design.',
                'subcategory_id' => 1, // Assuming category ID 1 exists for 'Mobile Phones'
            ],
            [
                'name' => 'Dell XPS 13',
                'short_description' => 'Premium laptop with high performance and sleek design.',
                'description' => 'The Dell XPS 13 features a stunning InfinityEdge display, 11th Gen Intel Core processors, and long battery life.',
                'price' => '1299',
                'selling_price' => '1199',
                'image' => 'https://i.dell.com/is/image/DellContent/dell-laptops-xps-13-9310-laptop-lifestyle-1.jpg',
                'qty' => '30',
                'tax' => '0.15',
                'status' => 1,
                'trend' => 0,
                'meta_title' => 'Dell XPS 13 - Laptop',
                'meta_keywords' => 'dell, laptop, xps, computer',
                'meta_description' => 'Discover the Dell XPS 13, the ultimate laptop for professionals.',
                'subcategory_id' => 2, // Assuming category ID 2 exists for 'Laptops'
            ],
            [
                'name' => 'Men\'s Casual Jacket',
                'short_description' => 'Stylish jacket for casual outings.',
                'description' => 'This men\'s casual jacket is perfect for all seasons, featuring a lightweight design and multiple pockets.',
                'price' => '89.99',
                'selling_price' => '79.99',
                'image' => 'https://cdn.shopify.com/s/files/1/0272/5722/6354/products/1001-blk-03.jpg?v=1643350882',
                'qty' => '100',
                'tax' => '0.15',
                'status' => 1,
                'trend' => 1,
                'meta_title' => 'Men\'s Casual Jacket',
                'meta_keywords' => 'jacket, men, fashion, clothing',
                'meta_description' => 'Shop stylish men\'s casual jackets at great prices.',
                'subcategory_id' => 3, // Assuming category ID 3 exists for 'Men\'s Fashion'
            ],
            [
                'name' => 'Women\'s Summer Dress',
                'short_description' => 'Lightweight summer dress for women.',
                'description' => 'This beautiful summer dress features a vibrant print and a comfortable fit, perfect for warm weather.',
                'price' => '49.99',
                'selling_price' => '39.99',
                'image' => 'https://img.freepik.com/free-photo/summer-dress-with-floral-pattern-light-background_23-2148457466.jpg',
                'qty' => '75',
                'tax' => '0.15',
                'status' => 1,
                'trend' => 1,
                'meta_title' => 'Women\'s Summer Dress',
                'meta_keywords' => 'dress, women, summer, fashion',
                'meta_description' => 'Find the perfect summer dress for any occasion.',
                'subcategory_id' => 4, // Assuming category ID 4 exists for 'Women\'s Fashion'
            ],
        ];

        // Insert sample data into the products table
        DB::table('products')->insert($products);
    }
}
