<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'=> (string)$this->OrderID,
            'type' => 'Order',
            'attributes' => [
                'CustomerID' => $this->CustomerID, 
                'TotalAmount' => $this->TotalAmount, 
                'ShippingAddress' => $this->ShippingAddress, 
                'PaymentMethod' => $this->PaymentMethod, 
                'OrderedDate' => $this->OrderedDate, 
                'ReceivedDate' => $this->ReceivedDate, 
                'OrderStatus' => $this->OrderStatus
            ]
        ];
    }
}
