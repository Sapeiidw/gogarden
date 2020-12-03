<?php

namespace Database\Factories;

use App\Models\Plant;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'genus_name' => $this->faker->name,
            'type' => $this->faker->word,
            'height' => $this->faker->numberBetween($min = 1, $max = 100),
            'width' => $this->faker->numberBetween($min = 1, $max = 100),
            'season_features' => $this->faker->word,
            'description' => $this->faker->realText(),
            'profile_photo_path' => $this->faker->imageUrl(1600, 900, 'cats', true, 'Faker', true),
        ];
    }
}
