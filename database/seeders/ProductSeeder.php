<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener la categoría de motocicletas o crearla si no existe
        $category = Category::firstOrCreate(['name' => 'Motocicletas']);

        // Insertar 10 productos de ejemplo
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Producto ' . $i,
                'description' => 'Descripción del producto ' . $i,
                'price' => rand(100, 1000),
                'category_id' => $category->id,
            ]);
        }
    }
}
