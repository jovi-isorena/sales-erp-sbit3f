<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id'=> (string)$this->CommentID,
            'type' => 'Comment',
            'attributes' => [
                'TicketNo' => $this->TicketNo,
                'CreatedDatetime' => $this->CreatedDatetime, 
                'FromRep' => $this->FromRep, 
                'ReplyingRepId' => $this->ReplyingRepId, 
                'Content' => $this->Content,
                'Employee' => $this->employee
            ]
        ];   
    }
}
