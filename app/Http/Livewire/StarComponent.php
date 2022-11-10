<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StarComponent extends Component
{

    public $product;

    public function render()
    {
        return view('livewire.star-component');
    }

    public function setStar(int $number): void
    {
        if($number <= 5 ){
            $this->product->rate($number);
        }
    }
}
