<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // Protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->title,
            'slug' => Str::slug($this->faker->slug),
            'image' => $this->faker->title
        ];
    }
}
