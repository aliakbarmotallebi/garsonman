<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @OA\Schema()
 */
class CartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->route()->getName() === 'carts.store')
            return true;

        $cartUser = $this->route('cart')->user_id ?? NULL;
        $userId = auth('api')->user()->id ?? NULL;
        return $cartUser === $userId;
    }

    /**
    * @OA\Property(type="string", property="productId"),
    * @OA\Property(type="number", property="quantity"),
    */
    public function rules()
    {
        $routeName = $this->route()->getName();
        switch ($routeName) {
            case 'carts.store':
                return $this->cartStoreRules();
                break;
            case 'carts.products.update':
                return $this->cartProductUpdateRules();
                break;
            case 'carts.products.store':
                return $this->cartProductStoreRules();
                break;
        }

        return [];
    }

    private function cartStoreRules()
    {
        return [
            'productId' => 'sometimes|exists:products,id',
            'quantity'  => 'sometimes|numeric|min:1|max:20|required_with:productId'
        ];
    }

    private function cartProductStoreRules()
    {
        return [
            'productId' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1|max:20'
        ];
    }

    private function cartProductUpdateRules()
    {
        return [
            'quantity' => 'required|numeric|min:1|max:20'
        ];
    }
}
