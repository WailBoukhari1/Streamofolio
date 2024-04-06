<?php

namespace Database\Factories;

use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Affiliate>
 */
class AffiliateFactory extends Factory
{
    protected $model = Affiliate::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => 'assets/img/main/samples/affiliate-product-2.jpg',
            'stars' => $this->faker->numberBetween(1, 5),
            'code' => $this->faker->randomElement([null, 'MAGIX', 'SALE20', 'DISCOUNT']),
            'discount' => $this->faker->randomElement([0, 10, 15, 20]),
            'link' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
