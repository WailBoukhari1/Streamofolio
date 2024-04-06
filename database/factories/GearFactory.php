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
        $imageUrls = [
            'headset' => 'assets/img/main/samples/gear-2-170x170.jpg',
            'gamer-mouse' => 'assets/img/main/samples/gear-1-170x170.jpg',
            'keyboard' => 'assets/img/main/samples/gear-3-170x170.jpg',
            'screen' => 'assets/img/main/samples/gear-4-170x170.jpg',
            'gaming-chair' => 'assets/img/main/samples/gear-5-170x170.jpg',
            'mousepad-mouse' => 'assets/img/main/samples/gear-6-170x170.jpg',
        ];

        $tags = array_keys($imageUrls);
        $brands = ['Brand A', 'Brand B', 'Brand C', 'Brand D', 'Brand E'];

        // Get a random tag
        $tag = $this->faker->randomElement($tags);

        return [
            'image' => $imageUrls[$tag],
            'name' => $this->faker->sentence,
            'tag' => $tag,
            'brand' => $this->faker->randomElement($brands),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
