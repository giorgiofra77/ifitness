<button type="submit" class="btn btn-{{$confirm}}">
    <i wire:loading.remove class="{{$btn_icon}}"></i>
    <span wire:loading.delay class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    {{$btn_message}}
</button>
