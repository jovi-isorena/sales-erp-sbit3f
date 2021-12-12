<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

class OrderedItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'OrderedItemID' => mb_convert_encoding($this->OrderedItemID, "UTF-8", "auto"), 
            'OrderID' => mb_convert_encoding($this->OrderID, "UTF-8", "auto"), 
            'ProductID' => mb_convert_encoding($this->ProductID, "UTF-8", "auto"), 
            'Quantity' => mb_convert_encoding($this->Quantity, "UTF-8", "auto"),
            'Product' => new ProductResource(Product::find($this->ProductID))

        ];
    }
}
