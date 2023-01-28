<form method="POST" wire:submit.prevent="submit" >
    <div class="row row-cols-3 align-items-left mb-3">

        <div class="col-sm-2">
            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Soglia di
                potenza <i class="bi bi-reception-4 ms-1"></i></label>
        </div>
        <div class="col-sm-2">
            <div class="input-group input-group-sm">
                <input type="text" placeholder="max watt" class="form-control @error("power_max") is-invalid @enderror" wire:model.defer="power_max" />
                <input type="hidden" wire:model="customer_id" value="{{$customer_id}}">
            </div>
        </div>

    </div>

    <div class="row row-cols-3 align-items-left">
        <div class="col-sm-2 me-0">
            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm"></label>
        </div>
        <div class="col-sm-1">
            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">min
                w</label>
        </div>

        <div class="col-sm-1">
            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">max
                w</label>
        </div>

    </div>

    {{--Inizio sequenza zone forza --}}

    @for($i = 1; $i <= 7; $i ++)
        <div class="row g-4 align-items-left mb-3">
            <div class="col-sm-2 me-0">
                <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Zona
                    {{$i}}</label>
            </div>
            <div class="col-sm-1">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control  @error("power_zone_".$i."_min") is-invalid @enderror"
                           wire:model.lazy="power_zone_{{$i}}_min" placeholder="watt">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control @error("power_zone_".$i."_max") is-invalid @enderror"
                           wire:model.lazy="power_zone_{{$i}}_max" placeholder="watt">
                </div>
            </div>
        </div>
    @endfor
    <div class="row g-3 ">

        <div class="col-sm-4 d-flex justify-content-end">
            @include('livewire.partials.power_heart_button')
        </div>
        </div>
</form>
