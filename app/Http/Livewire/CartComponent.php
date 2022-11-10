<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use App\Models\Order;
use App\Models\Table;
use App\Traits\OrderRerender;
use Carbon\Carbon;
use Exception;

class CartComponent extends Component
{

    use OrderRerender;

    protected $total;
    protected $content;

    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->updateCart();
    }

    /**
     * Renders the component on the browser.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('livewire.cart-component', [
            'total' => $this->total,
            'content' => $this->content,
        ]);
    }

    /**
     * Removes a cart item by id.
     *
     * @param string $id
     * @return void
     */
    public function removeFromCart(string $id): void
    {
        $this->remove($id);
        $this->updateCart();
    }

    /**
     * Clears the cart content.
     *
     * @return void
     */
    public function clearCart(): void
    {
        $this->clear();
        $this->updateCart();
    }

    /**
     * Updates a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function updateCartItem(string $id, string $action): void
    {
        $this->update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    public function updateCart()
    {
        $this->total   = $this->getTotalOrder();
        $this->content = $this->getOrderItems();

        $this->emit('refreshCount');
    }



    public function storeOrder()
    {

        $this->useOrderOnline()->update([
            'status' => 'Pending',
            'total'  => $this->getTotalOrder()
        ]);

        alert()->success('سفارش','باموفقیت ثبت شد');
        return redirect()->route('home');
    }

}
