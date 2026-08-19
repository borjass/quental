<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'external_id' => $this->faker->unique()->numberBetween(1, 10000),
            'name' => $this->faker->name(),
            'status' => $this->faker->randomElement(['Alive', 'Dead', 'Unknown']),
            'species' => $this->faker->word(),
            'type' => $this->faker->word(),
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Unknown']),
            'image' => $this->faker->imageUrl(300, 300, 'people'),
            'origin_location_id' => Location::factory(),
            'current_location_id' => Location::factory(),
        ];
    }
}
