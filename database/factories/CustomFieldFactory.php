<?php

namespace Database\Factories;

use App\Models\CustomField;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomField::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_id' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->text,
        'default_value' => $this->faker->text,
        'label_title' => $this->faker->text,
        'additional_class' => $this->faker->text,
        'validation' => $this->faker->text,
        'type' => $this->faker->randomElement(]),
        'is_searchable' => $this->faker->word,
        'order' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
