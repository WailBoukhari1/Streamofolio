<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'percentage' => $this->faker->numberBetween(5, 50),
            'expiration_date' => $this->faker->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'), 
        ];
    }
}
