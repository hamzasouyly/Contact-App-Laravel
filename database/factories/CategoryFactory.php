<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText(20);

        return [
            //
            'title' => $title,
            'slug' => str::slug($title),
            'body' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
