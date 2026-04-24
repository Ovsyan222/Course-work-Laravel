<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datePublic'=>$this->faker->date(),
            'title'=>$this->faker->word(),
            'shortDesc'=>$this->faker->sentence(),
            'desc'=>$this->faker->text(),
        ];
    }
}
