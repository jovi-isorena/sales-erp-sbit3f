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
            'TicketStatus' => 'unassigned'
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
                    ->get())
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
                    ->get())
            ];
        });
    }

    private function generateNo()
    {
        $currCount = Ticket::count();
        $newid = $currCount + 1;
        $newid = '00000000000' . $newid;
        $newid = substr($newid, strlen($newid)-10);
        return $newid;
    }

}
