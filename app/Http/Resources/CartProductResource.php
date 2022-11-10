<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

class CartProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $product = Product::find($this->product_id);

        return [
            'id'       => $this->product_id,
            'title'    => $product->title,
            'price'    => $product->price,
            'quantity' => $this->qty,
        ];
    }
}
