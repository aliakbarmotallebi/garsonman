<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Order;
use App\Models\Table;
use App\Traits\OrderRerender;
use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ProductComponent extends Component
{
    use OrderRerender;

    public $product;
    public $quantity;

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->quantity = 1;
    }

        /**
     * Renders the component on the browser.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('livewire.product-component');
    }

    /**
     * Adds an item to cart.
     *
     * @return void
     */
    public function addToCart(): void
    {

        if ($this->hasOrderOnline()) {
            $order = $this->useOrderOnline();
        }else{
            $order = $this->ceateOrder();
        }

        $order->items()->create([
            'product_id' => $this->product->id,
            'price'      => $this->product->getRawOriginal('price'),
            'quantity'   => $this->quantity
        ]);

        $this->emit('productAddedToCart');
        $this->emit('refreshCount');
    }


    public function updateCartItem(string $id, string $action): void
    {
        $this->update($id, $action);
        $this->emit('productAddedToCart');
        $this->emit('refreshCount');
    }

    public function removeFromCart(string $id): void
    {
        $this->remove($id);
        $this->emit('productAddedToCart');
        $this->emit('refreshCount');
    }

    protected function getItemSelected()
    {
        if ( ! $this->hasOrderOnline() ) {
            return false;
        }

        $order = $this->useOrderOnline();

        return $order->items()->whereProductId($this->product->id)->first();


    }
}
