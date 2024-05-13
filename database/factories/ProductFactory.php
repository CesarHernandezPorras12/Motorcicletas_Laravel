<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'photo' => 'C:\\xampp\\htdocs\\Taller_Final\\ProyectoFinal_Laravel\\Fotos\\' . $this->faker->numberBetween(1, 20) . '.PNG',
            'price' => $this->faker->numberBetween(100, 1000),
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
        ];
    }
}
