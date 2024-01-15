<?php

namespace Database\Factories;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tour_id' => $this->faker->word,
        'days' => $this->faker->randomDigitNotNull,
        'type' => $this->faker->word,
        'single' => $this->faker->word,
        'double' => $this->faker->word,
        'triple' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
