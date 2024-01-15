<?php

namespace Database\Factories;

use App\Models\SiteInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => $this->faker->word,
        'banner' => $this->faker->word,
        'title' => $this->faker->word,
        'short_desc' => $this->faker->text,
        'content' => $this->faker->word,
        'about_title' => $this->faker->word,
        'about_desc' => $this->faker->text,
        'about_image' => $this->faker->word,
        'page_color' => $this->faker->word,
        'page_background_color' => $this->faker->word,
        'call_to_action_button_color' => $this->faker->word,
        'call_to_action_button_content' => $this->faker->word,
        'copy_right' => $this->faker->word,
        'linkedin' => $this->faker->word,
        'facebook' => $this->faker->word,
        'instgram' => $this->faker->word,
        'youtube' => $this->faker->word,
        'twitter' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
