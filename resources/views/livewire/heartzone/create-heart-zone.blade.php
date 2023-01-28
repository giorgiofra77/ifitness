<form method="POST" wire:submit.prevent="submit" >
    <div class="row row-cols-3 align-items-left mb-3">

        <div class="col-sm-2">
            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Soglia di
                frequeza <i class="bi bi-activity ms-1"></i></label>
        </div>
        <div class="col-sm-2">
            <div class="input-group input-group-sm">
                <input type="text" placeholder="max battiti" class="form-control @error("heart_max") is-invalid @enderror" wire:model.defer="heart_max">
                <input type="hidden" wire:model="customer_id" value="{{$customer_id}}">
            </div>
        </div>

    </div>

    <div class="row row-cols-3 align-items-left">
        <div class="col-sm-2 me-0">
            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm"></label>
        </div>
        <div class="col-sm-1">
            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">min hz
                </label>
        </div>

        <div class="col-sm-1">
            <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">max hz
                </label>
        </div>

    </div>

    {{--Inizio sequenza zone cuore --}}

    @for($i = 1; $i <= 7; $i ++)
        <div class="row g-4 align-items-left mb-3">
            <div class="col-sm-2 me-0">
                <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">Zona
                    {{$i}}</label>
            </div>
            <div class="col-sm-1">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control  @error("heart_zone_".$i."_min") is-invalid @enderror"
                           wire:model="heart_zone_{{$i}}_min" placeholder="battiti">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control @error("heart_zone_".$i."_max") is-invalid @enderror"
                           wire:model="heart_zone_{{$i}}_max" placeholder="battiti">
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

