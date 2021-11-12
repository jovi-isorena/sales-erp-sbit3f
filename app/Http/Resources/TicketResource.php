<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // 'TicketNo', 'CreatedDatetime', 'EnqueuedDatetime', 'AssignedDatetime', 'ClosedDatetime', 'PriorityLevel', 'TransferringTeam', 'AssignedEmployee', 'CategoryID', 'AssignedTeam', 'Content', 'CreatedBy', 'TicketStatus', 'CSAT1', 'CSAT2', 'NPS', 'RatingDatetime'
        return [
            'id'=> (string)$this->TicketNo,
            'type' => 'Ticket',
            'attributes' => [
                'CreatedDatetime' => $this->CreatedDatetime, 
                'EnqueuedDatetime' => $this->EnqueuedDatetime, 
                'AssignedDatetime' => $this->AssignedDatetime, 
                'ClosedDatetime' => $this->ClosedDatetime, 
                'PriorityLevel' => $this->PriorityLevel, 
                'TransferringTeam' => $this->TransferringTeam, 
                'AssignedEmployee' => $this->AssignedEmployee,
                'CategoryID' => $this->CategoryID, 
                'AssignedTeam' => $this->AssignedTeam, 
                'Content' => $this->Content, 
                'CreatedBy' => $this->CreatedBy, 
                'TicketStatus' => $this->TicketStatus, 
                'CSAT1' => $this->CSAT1, 
                'CSAT2' => $this->CSAT2, 
                'NPS' => $this->NPS, 
                'RatingDatetime' => $this->RatingDatetime,
                'Customer' => [
                    'FirstName' => $this->customer->FirstName, 
                    'MiddleName' => $this->customer->MiddleName, 
                    'LastName'  => $this->customer->LastName, 
                    'Birthdate' => $this->customer->Birthdate, 
                    'Mobile' => $this->customer->Mobile, 
                    'Email' => $this->customer->Email, 
                    'Image' => $this->customer->Image, 
                    'CustomerStatus' => $this->customer->CustomerStatus, 
                    'JoinDate' => $this->customer->JoinDate
                ],
                'Comments' => $this->comments
            ]
        ];
    }
}
