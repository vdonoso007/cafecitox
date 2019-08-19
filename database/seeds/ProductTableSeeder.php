<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Sanduche V Crossain',
            'name' => 'Crossain',
            'description' => 'Rico Sanduche fresco y saludable fuertemente marinado con el gran aroma del Romero y scretas especies con una gran variedad de fuentes y energias.',
            'group_id' => 1,
            'price' => 3.5,
            'stock' => 100,
            'image' => 'sandcroissan.png',
            'enabled' => true
        ]);
    }
}
