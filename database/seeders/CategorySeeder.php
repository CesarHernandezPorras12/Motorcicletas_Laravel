<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 categorías de ejemplo
        for ($i = 1; $i <= 10; $i++) {
            Category::create([
                'name' => 'Motocicleta ' . $i,
                'description' => 'Descripción de la motocicleta ' . $i,
            ]);
        }
    }
}
