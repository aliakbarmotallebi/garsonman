
<div class="btn-group dropend">
    <button wire:loading.class="loading" wire:loading.attr="disabled" class="btn btn-{{ $this->getBgColor() }} btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $actionsNameFa[$this->getCurrentActionName()] }}
        <span wire:loading.class="spinner-border" role="status"></span>
    </button>
    <ul class="dropdown-menu">
        @foreach($this->getActionsName() as $action => $color)
        <li wire:click="setStatus('{{$action}}')"  class="cursor-pointer">
            <span class="dropdown-item">
                {{ $actionsNameFa[$action] }}
            </span>
        </li>
        @endforeach
    </ul>
</div>

