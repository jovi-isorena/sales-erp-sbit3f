<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'ProductID' => $this->ProductID, "UTF-8", "auto", 
            'Name' => mb_convert_encoding($this->Name, "UTF-8", "auto"), 
            'Brand' => mb_convert_encoding($this->Brand, "UTF-8", "auto"), 
            'Category' => mb_convert_encoding($this->Category, "UTF-8", "auto"), 
            'Specification' => mb_convert_encoding($this->Specification, "UTF-8", "auto"), 
            'SellingPrice' => $this->SellingPrice, "UTF-8", "auto", 
            'OnSale' => $this->OnSale, "UTF-8", "auto", 
            // 'Image' => $this->Image, 
            'isActive' => $this->isActive
        ];
    }
}
