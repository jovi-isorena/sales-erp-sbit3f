<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'TicketNo' => '0000000001',
            'CreatedDatetime' => now('Asia/Manila'), 
            'FromRep' => true, 
            'ReplyingRepId' => '0010', 
            'Content' => $this->faker->paragraph(5)
        ];
    }
    public function fromCustomer()
    {
        return $this->state(function (array $attributes) {
            return [
                'FromRep' => false
            ];
        });
    }
    
}
