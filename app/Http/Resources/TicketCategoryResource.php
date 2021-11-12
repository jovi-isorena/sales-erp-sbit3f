<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketCategoryResource extends JsonResource
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
            'id'=> (string)$this->CategoryID,
            'type' => 'Ticket Category',
            'attributes' => [
                'Name' => $this->Name, 
                'AssignedTeam' => $this->AssignedTeam, 
                'DefaultPriority' => $this->DefaultPriority, 
                'isActive' => $this->isActive
            ]
        ];
    }
}
