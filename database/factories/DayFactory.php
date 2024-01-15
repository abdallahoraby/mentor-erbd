<?php

namespace Database\Factories;

use App\Models\Day;
use Illuminate\Database\Eloquent\Factories\Factory;

class DayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Day::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tour_id' => $this->faker->word,
        'title' => $this->faker->word,
        'description' => $this->faker->word,
        'order' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
