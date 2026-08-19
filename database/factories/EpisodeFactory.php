<?php

namespace Database\Factories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $season = fake()->numberBetween(1, 5);
        $episode = fake()->numberBetween(1, 10);
        $code = sprintf('S%02dE%02d', $season, $episode);

        return [
            'external_id' => fake()->unique()->numberBetween(1, 10000),
            'name' => fake()->sentence(),
            'air_date' => fake()->date(),
            'episode' => $code,
        ];
    }
}
