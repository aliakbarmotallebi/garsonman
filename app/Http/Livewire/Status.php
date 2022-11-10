<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Status extends Component
{
    public $content;

    private static $actions = [
        "Approved" =>  "success",
        "Pending"  =>  "secondary",
        "Rejected" =>  "danger",
    ];

    public $actionsNameFa = [
        'Approved' => 'تائید شده',
        'Rejected' => 'تائید نشده',
        'Pending'  => 'درحال بررسی',
    ];

    private $bgColor;

    public function mount($content)
    {
        $this->content = $content;

        $this->setBgColor($this->getAction());
    }

    public function getAction() : string
    {
        if ($this->content->isApproved()){
            return "Approved";
        }elseif($this->content->isRejected()){
            return "Rejected";
        }elseif($this->content->isPending()){
            return "Pending";
        }

        return "Pending";
    }

    public function getCurrentActionName()
    {
        return $this->getAction();
    }

    public function getActionsName(): array
    {
        return self::$actions;
    }

    public function getBgColor()
    {
        return $this->bgColor;
    }

    public function setBgColor($color)
    {
        $this->bgColor = self::$actions[$color];
    }

    public function setStatus(string $name)
    {
        $this->content->status = $name;
        
        if($this->content->save()){
            $this->setBgColor($name);
        }
    }

    public function render()
    {
        return view('livewire.status');
    }
}
