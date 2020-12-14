<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $doc_type = $this->faker->randomElement(['nif', 'nie', 'passport']);

        return [
            'docType' => $doc_type,
            'docNum' => $this->docNumber($doc_type),
            'email' => $this->faker->email,
            'customerId' => $this->faker->unique()->numberBetween(1, 99999999),
            'givenName' => $this->faker->firstName,
            'familyName1' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
        ];
    }

    private function docNumber($doc_type): string
    {
        if ('nif' === $doc_type) {
            return $this->faker->dni;
        }

        if ('nie' === $doc_type) {
            return $this->faker->randomElement(['X', 'Y', 'Z']) . $this->faker->dni;
        }

        return $this->faker->numberBetween(100000, 99999999);
    }
}
