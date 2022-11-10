<div class="switch-status">
    <label class="switch">
        <input wire:click="setStatus" name="status" type="checkbox" @if($content->status == 'PUBLISH') checked @endif>
        <span class="slider round"></span>
    </label>
</div>