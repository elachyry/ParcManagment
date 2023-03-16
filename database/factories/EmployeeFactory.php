<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cin' => $this->faker->unique()->ean8(),
            'first_name' => $this->faker->firstNameMale(),
            'last_name' => $this->faker->lastName(),
            'job' => $this->faker->jobTitle (),
            'address' => $this->faker->address(),
            'phone' => $this->faker->e164PhoneNumber(),
        ];
    }
}
