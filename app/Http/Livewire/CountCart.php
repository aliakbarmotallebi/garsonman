<?php

namespace App\Http\Livewire;

use App\Traits\OrderRerender;
use Livewire\Component;

class CountCart extends Component
{
    use OrderRerender;

    public $count;

    protected $listeners = [
        'refreshCount' => 'refreshCountOrder',
    ];

    public function mount(): void
    {
        $this->refreshCountOrder();
    }

    public function render()
    {
        return view('livewire.count-cart',[
            'count' => $this->count
        ]);
    }

    public function refreshCountOrder()
    {
        $this->count   = $this->getCountItemsOrder();
    }
}
