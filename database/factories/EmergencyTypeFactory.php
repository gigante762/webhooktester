<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmergencyType>
 */
class EmergencyTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'code' => $this->faker->uuid(),
            'img' => $this->faker->imageUrl(640, 480, 'animals', true),
            'location_id' => \App\Models\Location::factory(),
        ];
    }
}
