<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(3),
            'pages'=>$this->faker->numberBetween(100,1000),
            'year'=>$this->faker->numberBetween(1900,2025),
            'category_id'=>$this->faker->numberBetween(1, Category::count())
        ];
    }
}
