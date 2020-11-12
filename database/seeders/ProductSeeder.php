<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = 'Product 1';
        $product->description = 'some description';
        $product->price = 122;
        $product->category = 'some category';
        $product->active = true;
        $product->image = '5bee5ca95a122e2c23050dfb924dd69f.jpg';

        $product->save();

        $product = new Product();
        $product->name = 'Product 2';
        $product->description = 'some description';
        $product->price = 100;
        $product->category = 'some category';
        $product->active = true;
        $product->image = '5bee5ca95a122e2c23050dfb924dd69f.jpg';

        $product->save();

    }
}
