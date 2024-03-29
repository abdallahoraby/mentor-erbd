<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['textarea', 'text', 'editor', 'file', 'select']),
        'data' => $this->faker->randomElement(['string', 'int', 'boolean']),
        'name' => $this->faker->word,
        'label' => $this->faker->word,
        'rules' => $this->faker->word,
        'class' => $this->faker->word,
        'value' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
