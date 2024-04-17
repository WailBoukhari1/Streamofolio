<?php

namespace Database\Factories;

use App\Models\Gear;
use Illuminate\Database\Eloquent\Factories\Factory;

class GearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brandData = [
            'Brand A' => ['tag' => 'headset', 'image' => 'assets/img/main/samples/gear-2-170x170.jpg'],
            'Brand B' => ['tag' => 'gamer-mouse', 'image' => 'assets/img/main/samples/gear-1-170x170.jpg'],
            'Brand C' => ['tag' => 'keyboard', 'image' => 'assets/img/main/samples/gear-3-170x170.jpg'],
            'Brand D' => ['tag' => 'screen', 'image' => 'assets/img/main/samples/gear-4-170x170.jpg'],
            'Brand E' => ['tag' => 'gaming-chair', 'image' => 'assets/img/main/samples/gear-5-170x170.jpg'],
        ];

        $brand = $this->faker->randomElement(array_keys($brandData));

        return [
            'image' => $brandData[$brand]['image'],
            'name' => $this->faker->sentence,
            'tag' => $brandData[$brand]['tag'],
            'brand' => $brand,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

