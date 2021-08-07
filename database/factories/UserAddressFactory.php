<?php

namespace Database\Factories;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $x=1;
        return [
            'user_id'=>$x,
            'delivery_address'=>$this->faker->address(),
            'delivery_cost'=>$this->faker->numberBetween(0, 5000),
            'is_approved'=>1
        ];
        $x++;
    }
}
