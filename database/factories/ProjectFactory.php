<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucwords( $this->faker->sentence(3) ), // Generating a random project name
            'description' => $this->faker->text(200), // Generating a random description
            'user_id' => $this->faker->numberBetween(1, 4), // Random number between 1 and 4
        ];
    }
}
