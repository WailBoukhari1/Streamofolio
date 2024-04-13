<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'thumbnail' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true), 
            'category' => $this->faker->word(),
        ];
    }
}
