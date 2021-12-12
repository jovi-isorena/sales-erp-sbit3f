<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;

class RepresentativehandledticketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $newid = $this->generateNo();
        Ticket::factory()->sales()->thisMonth()->withScore()->create(['TicketNo' => $newid, 'AssignedEmployee' => '0010']);
        
        return [
            'TicketNo' => $newid, 
            'AssignedDatetime' => now('Asia/Manila'), 
            'EmployeeID' => '0010', 
            'ActionTaken' => "Responded", 
            'HandlingTime' => $this->faker->numberBetween(20, 7200)
        ];
    }

    public function escalated(){
        return $this->state(function(array $attributes){
            return [
                'ActionTaken' => "Escalated", 
                'HandlingTime' => $this->faker->numberBetween(20, 60)
            ];
        });
    }
    public function transferred(){
        return $this->state(function(array $attributes){
            return [
                'ActionTaken' => "Transferred", 
                'HandlingTime' => $this->faker->numberBetween(20, 60)
            ];
        });
    }

    private function generateNo()
    {
        $maxid = Ticket::max('TicketNo');
        $newid = intval($maxid) + 1;
        $newid = str_pad($newid,10,"0", STR_PAD_LEFT);
        // $newid = '00000000000' . $newid;
        // $newid = substr($newid, strlen($newid)-10);
        return $newid;
    }
}
