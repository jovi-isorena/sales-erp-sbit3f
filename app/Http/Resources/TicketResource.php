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
        // mb_convert_encoding($inputString, "UTF-8", "auto");
        return [
            'id'=> mb_convert_encoding($this->TicketNo, "UTF-8", "auto"),
            'type' => 'Ticket',
            'attributes' => [
                'CreatedDatetime' => mb_convert_encoding($this->CreatedDatetime, "UTF-8", "auto"), 
                'EnqueuedDatetime' => mb_convert_encoding($this->EnqueuedDatetime, "UTF-8", "auto"), 
                'AssignedDatetime' => mb_convert_encoding($this->AssignedDatetime, "UTF-8", "auto"), 
                'ClosedDatetime' => mb_convert_encoding($this->ClosedDatetime, "UTF-8", "auto"), 
                'PriorityLevel' => $this->PriorityLevel, 
                'TransferringTeam' => $this->TransferringTeam, 
                'AssignedEmployee' => $this->AssignedEmployee,
                'CategoryID' => $this->CategoryID, 
                'AssignedTeam' => $this->AssignedTeam, 
                'Content' => mb_convert_encoding($this->Content, "UTF-8", "auto"), 
                'CreatedBy' => $this->CreatedBy, 
                'TicketStatus' => mb_convert_encoding($this->TicketStatus, "UTF-8", "auto"), 
                'CSAT1' => $this->CSAT1, 
                'CSAT2' => $this->CSAT2, 
                'NPS' => $this->NPS, 
                'Feedback' => mb_convert_encoding($this->Feedback, "UTF-8", "auto"),
                'RatingDatetime' => mb_convert_encoding($this->RatingDatetime, "UTF-8", "auto"),
                'Unread' => $this->Unread,
                'Customer' => [
                    'FirstName' => mb_convert_encoding($this->customer->FirstName, "UTF-8", "auto"), 
                    'MiddleName' => mb_convert_encoding($this->customer->MiddleName, "UTF-8", "auto"), 
                    'LastName'  => mb_convert_encoding($this->customer->LastName, "UTF-8", "auto"), 
                    'Birthdate' => $this->customer->Birthdate, 
                    'Mobile' => mb_convert_encoding($this->customer->Mobile, "UTF-8", "auto"), 
                    'Email' => mb_convert_encoding($this->customer->Email, "UTF-8", "auto"), 
                    // 'Image' => $this->customer->Image, 
                    'CustomerStatus' => mb_convert_encoding($this->customer->CustomerStatus, "UTF-8", "auto"), 
                    'JoinDate' => mb_convert_encoding($this->customer->JoinDate, "UTF-8", "auto")
                ],
                'Comments' => $this->comments
            ]
        ];
        // return [
        //     'id'=> (string)$this->TicketNo,
        //     'type' => 'Ticket',
        //     'attributes' => [
        //         'CreatedDatetime' => $this->CreatedDatetime, 
        //         'EnqueuedDatetime' => $this->EnqueuedDatetime, 
        //         'AssignedDatetime' => $this->AssignedDatetime, 
        //         'ClosedDatetime' => $this->ClosedDatetime, 
        //         'PriorityLevel' => $this->PriorityLevel, 
        //         'TransferringTeam' => $this->TransferringTeam, 
        //         'AssignedEmployee' => $this->AssignedEmployee,
        //         'CategoryID' => $this->CategoryID, 
        //         'AssignedTeam' => $this->AssignedTeam, 
        //         'Content' => $this->Content, 
        //         'CreatedBy' => $this->CreatedBy, 
        //         'TicketStatus' => $this->TicketStatus, 
        //         'CSAT1' => $this->CSAT1, 
        //         'CSAT2' => $this->CSAT2, 
        //         'NPS' => $this->NPS, 
        //         'Feedback' => $this->Feedback,
        //         'RatingDatetime' => $this->RatingDatetime,
        //         'Unread' => $this->Unread,
        //         'Customer' => [
        //             'FirstName' => $this->customer->FirstName, 
        //             'MiddleName' => $this->customer->MiddleName, 
        //             'LastName'  => $this->customer->LastName, 
        //             'Birthdate' => $this->customer->Birthdate, 
        //             'Mobile' => $this->customer->Mobile, 
        //             'Email' => $this->customer->Email, 
        //             'Image' => $this->customer->Image, 
        //             'CustomerStatus' => $this->customer->CustomerStatus, 
        //             'JoinDate' => $this->customer->JoinDate
        //         ],
        //         'Comments' => $this->comments
        //     ]
        // ];
    }
}
