<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
            'body'=>$this->faker->paragraph,
            'category_id'=>Category::query()->inRandomOrder()->first()->id,
            'user_id'=>User::query()->inRandomOrder()->first()->id,
        ];
    }
}
