<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'slug' => $this->faker->word,
        'description' => $this->faker->word,
        'image' => $this->faker->word,
        'author_id' => $this->faker->word,
        'meta_title' => $this->faker->word,
        'meta_description' => $this->faker->text,
        'site_map_priority' => $this->faker->randomDigitNotNull,
        'site_map_frequency' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
