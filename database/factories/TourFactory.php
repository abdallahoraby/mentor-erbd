<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'overview' => $this->faker->text,
        'description' => $this->faker->word,
        'included' => $this->faker->word,
        'excluded' => $this->faker->word,
        'notes' => $this->faker->word,
        'facilities' => $this->faker->word,
        'type' => $this->faker->word,
        'run' => $this->faker->word,
        'duration' => $this->faker->randomDigitNotNull,
        'destinations' => $this->faker->text,
        'start_price' => $this->faker->word,
        'discount' => $this->faker->randomDigitNotNull,
        'prices' => $this->faker->word,
        'slug' => $this->faker->word,
        'meta_title' => $this->faker->word,
        'meta_description' => $this->faker->text,
        'site_map_priority' => $this->faker->randomDigitNotNull,
        'site_map_frequency' => $this->faker->word,
        'logo' => $this->faker->word,
        'active' => $this->faker->word,
        'destination_id' => $this->faker->word,
        'type_id' => $this->faker->word,
        'category_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
