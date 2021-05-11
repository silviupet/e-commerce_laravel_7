<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = range(1, 30);

        // laptops
        foreach($count as $i) {
            Product::create([
                'name' => "Laptop number $i",
                'slug' => "laptop-number-$i",
                'details' => '15inch 1 TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(1);
        }

        // Make Laptop 1 a Desktop as well. Just to test multiple categories
        $product = Product::find(1);
        $product->categories()->attach(2);

        // desktops
        foreach($count as $i) {
            Product::create([
                'name' => "Desktop number $i",
                'slug' => "desktop-number-$i",
                'details' => '15inch 1 TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(2);
        }

        // Phones
        foreach($count as $i) {
            Product::create([
                'name' => "Phone number $i",
                'slug' => "phone-number-$i",
                'details' => '15inch 1 TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(3);
        }

        // Tablets
        foreach($count as $i) {
            Product::create([
                'name' => "Tablet number $i",
                'slug' => "tablet-number-$i",
                'details' => '15inch 1 TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(4);
        }

        // TVs
        foreach($count as $i) {
            Product::create([
                'name' => "Tv number $i",
                'slug' => "tv-number-$i",
                'details' => '15inch 1 TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(5);
        }

        // Cameras
        foreach($count as $i) {
            Product::create([
                'name' => "Camera number $i",
                'slug' => "camera-number-$i",
                'details' => '15inch 1 TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(6);
        }

        // Appliances
        foreach($count as $i) {
            Product::create([
                'name' => "appliance number $i",
                'slug' => "appliance-number-$i",
                'details' => '15inch 1 TB SSD, 32GB RAM',
                'price' => rand(149999, 249999),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(7);
        }

        // Select random entries to be featured
        Product::whereIn('id', [1, 12, 22, 31, 41, 43, 47, 51, 53,61, 69, 73, 80])->update(['featured' => true]);
    }
}
