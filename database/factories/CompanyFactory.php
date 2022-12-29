<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           "name" => $this->faker->company, 
           "email" => $this->faker->address, 
           "address" => $this->faker->companyEmail, 
           "phone" => $this->faker->phoneNumber, 
        ];
    }
}
