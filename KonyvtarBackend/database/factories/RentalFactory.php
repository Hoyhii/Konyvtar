<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->numberBetween(1,25),
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date' => $this->faker->date('Y-m-d'),
            'created_at' => $this->faker->date('Y-m-d'),
            'updated_at' => $this->faker->date('Y-m-d'),
        ];
    }
}
