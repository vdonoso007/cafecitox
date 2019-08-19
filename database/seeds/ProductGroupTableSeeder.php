<?php

use App\ProductGroup;
use Illuminate\Database\Seeder;

class ProductGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductGroup::create([
            'name' => 'Desayunos',
            'description' => 'Seccion Desayunos',
            'enabled' => true
        ]);

        ProductGroup::create([
            'name' => 'Almuerzos',
            'description' => 'Seccion Almuerzos',
            'enabled' => true
        ]);

        ProductGroup::create([
            'name' => 'Buffets',
            'description' => 'Seccion Buffets',
            'enabled' => true
        ]);
    }
}
