<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $names = ['Partner 1', 'Partner 2', 'Partner 3', 'Partner 4', 'Partner 5', 'Partner 6'];

        // Generate a random image URL for each partner
        $imageUrls = [
            'assets\img\main\sponsor-1-sm.png',
            'assets\img\main\sponsor-2-sm.png',
            'assets\img\main\sponsor-3-sm.png',
            'assets\img\main\sponsor-4-sm.png',
            'assets\img\main\sponsor-5-sm.png',
            'assets\img\main\sponsor-6-sm.png',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($names),
            'image' => $this->faker->unique()->randomElement($imageUrls),
        ];
    }
}