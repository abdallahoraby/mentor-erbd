<?php

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inquiry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tour_id' => $this->faker->word,
        'name' => $this->faker->word,
        'email' => $this->faker->word,
        'phone' => $this->faker->word,
        'start_date' => $this->faker->word,
        'end_date' => $this->faker->word,
        'nationality' => $this->faker->word,
        'comment' => $this->faker->text,
        'url' => $this->faker->text,
        'ip_address' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
