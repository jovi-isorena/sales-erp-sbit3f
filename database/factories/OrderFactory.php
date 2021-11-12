<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'OrderID' => $this->faker->text(5),
            'CustomerID' => 'CUS0000001', 
            'TotalAmount'=> $this->faker->numberBetween($min = 500, $max = 9000), 
            'ShippingAddress' => $this->faker->text(20), 
            'PaymentMethod' => 1, 
            'OrderedDate' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = 'Asia/Manila'), 
            'ReceivedDate' => null, 
            'OrderStatus' => 'Delivered'
        ];
    }
}
