<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QueueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> (string)$this->ID,
            'type' => 'Queue',
            'attributes' => [
                'EmployeeID' => $this->EmployeeID, 
                'TeamID' => $this->TeamID, 
                'EnqueueTime' => $this->EnqueueTime, 
                'ActiveTickets' => $this->ActiveTickets, 
                'OnlineStatus' => $this->OnlineStatus
            ]
        ];
    }
}
