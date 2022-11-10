<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusSwitch extends Component
{
    public $content;

	const STATUS_PUBLISH = "PUBLISH";

    const STATUS_UN_PUBLISH = "UN_PUBLISH";

	
    public function mount($content)
    {
        $this->content = $content;
    }

    public function setStatus()
    {

	   if($this->content->status == self::STATUS_PUBLISH) {
            $this->content->status = self::STATUS_UN_PUBLISH;
       }

       $this->content->save();
    }

    public function render()
    {
        return view('livewire.status-switch');
    }
}
