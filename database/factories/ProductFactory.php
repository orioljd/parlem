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
            'productName' => $this->faker->text(25),
            'productTypeName' => $this->faker->word,
            'numeracioTerminal' => $this->faker->numberBetween(100000000, 999999999),
            'soldAt' => $this->faker->dateTimeBetween('-5 years', 'now'),
        ];
    }
}
