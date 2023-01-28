<form method="POST" wire:submit.prevent="submit">
    @csrf
    <div class="col-md-12 mb-2">
        <input type="hidden" wire:model="customer_id" value="{{$customer_id}}">
        <label class="mb-1" for="inputCode">Tipologia abbonamento *</label>
        <div>
            <select wire:change="getPrice" wire:model="subscription_id" class="form-select">
                @foreach ($subscriptions as $item)
                    <option value="{{ $item->id }}" @selected($item->id == $subscriptionCustomer->subscription_id)>
                        {{ $item->descr }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-12 mb-2">
        <label class="mb-1" for="inputPriceCost">Prezzo € *</label>
        <input type="number" step="1" class="form-control @error('price') is-invalid @enderror"
                wire:model="price" required>
        @error('price')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

    <div class="col-md-12 mb-2">
        <label class="mb-1" >Data inizio *</label>
        <input  wire:change="dataChange" type="date" class="form-control @error('date_start') is-invalid @enderror"
                wire:model="date_start"  required>
        @error('date_start')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

    <div class="col-md-12 mb-2 {{$visible}}">
        <label class="mb-1" for="inputPriceCost">Scadrà il</label>
        <input  disabled type="text" class="form-control is-valid"
                value="@date($date_end)">
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check me-1"></i>{{ __('Conferma') }}
        </button>
    </div>
</form>
