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
        // mb_convert_encoding($inputString, "UTF-8", "auto");
        return [
            'id'=> mb_convert_encoding($this->OrderID, "UTF-8", "auto"),
            'type' => 'Order',
            'attributes' => [
                'CustomerID' => mb_convert_encoding($this->CustomerID, "UTF-8", "auto"), 
                'TotalAmount' => $this->TotalAmount, 
                'ShippingAddress' => mb_convert_encoding($this->ShippingAddress, "UTF-8", "auto"), 
                'PaymentMethod' => mb_convert_encoding($this->PaymentMethod, "UTF-8", "auto"), 
                'OrderedDate' => mb_convert_encoding($this->OrderedDate, "UTF-8", "auto"), 
                'ReceivedDate' => mb_convert_encoding($this->ReceivedDate, "UTF-8", "auto"), 
                'OrderStatus' => mb_convert_encoding($this->OrderStatus, "UTF-8", "auto"),
                'OrderDetails' => OrderedItemResource::collection($this->ordereditems)
                // $this->ordereditems->load('product')
            ]
        ];
    }
}
