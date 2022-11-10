<?php

namespace Database\Factories;

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
            'title' => $this->faker->jobTitle,
            'body' => $this->faker->realText,
            'description' => $this->faker->realText,
            'price' => $this->faker->numberBetween(100000, 1000000),
            'category_id' => $this->faker->numberBetween(1, 3),
            'user_id' => 1,
            'image' => $this->faker->imageUrl,
        ];
    }
}
