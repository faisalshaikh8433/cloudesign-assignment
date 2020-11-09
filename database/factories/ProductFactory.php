<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'name' => $this->faker->unique()->word,
            'qty' => $this->faker->numberBetween($min = 1, $max = 10),
            'rate' => $this->faker->numberBetween($min = 100, $max = 1000),
            'cost' => $this->faker->numberBetween($min = 100, $max = 1000),
            'category_id' => Category::factory(),
            
        ];
    }
}
