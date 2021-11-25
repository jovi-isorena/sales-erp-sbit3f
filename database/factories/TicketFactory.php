<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\Ticketcategory;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'TicketNo' => $this->generateNo(),
            'CreatedDatetime' => now('Asia/Manila'), 
            'EnqueuedDatetime'=> now('Asia/Manila'), 
            'PriorityLevel' => $this->faker->numberBetween(1,3), 
            'CategoryID' => $this->faker->randomElement(
                Ticketcategory::select('CategoryID')
                ->where('isActive', 1)
                ->get()), 
            'Content' => $this->faker->paragraph(5), 
            'CreatedBy' => 'CUS0000001', 
            'TicketStatus' => 'Unassigned'
        ];
    }
    
    public function sales()
    {
        return $this->state(function (array $attributes) {
            return [
                'CategoryID' => $this->faker->randomElement(
                    Ticketcategory::select('CategoryID')
                    ->where('AssignedTeam', 1)
                    ->where('isActive', 1)
                    ->get()),
                'AssignedTeam' => 1    
            ];
        });
    }
    
    public function tech()
    {
        return $this->state(function (array $attributes) {
            return [
                'CategoryID' => $this->faker->randomElement(
                    Ticketcategory::select('CategoryID')
                    ->where('AssignedTeam', 2)
                    ->where('isActive', 1)
                    ->get()),
                    'AssignedTeam' => 2  
            ];
        });
    }

    public function withScore()
    {
        return $this->state(function(array $attributes){
            return [
                'CSAT1' => $this->faker->numberBetween(1, 5),
                'CSAT2' => $this->faker->numberBetween(1, 5),
                'NPS' => $this->faker->numberBetween(1, 5),
                'Feedback' => $this->faker->paragraph(5),
                
            ];
        });
    }

    public function thisYear()
    {
        return $this->state(function(array $attributes){
            $randomdate = $this->faker->dateTimeThisYear();
            return [
                'RatingDatetime' => $randomdate,
                'ClosedDatetime' => $randomdate,
                'CreatedDatetime' => $randomdate, 
                'EnqueuedDatetime'=> null,
                'TicketStatus' => 'Closed'
            ];
        });
    }
    public function thisMonth()
    {
        return $this->state(function(array $attributes){
            $randomdate = $this->faker->dateTimeThisMonth();
            return [
                'RatingDatetime' => $randomdate,
                'ClosedDatetime' => $randomdate,
                'CreatedDatetime' => $randomdate, 
                'EnqueuedDatetime'=> null,
                'TicketStatus' => 'Closed'
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
