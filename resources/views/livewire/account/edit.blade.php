<form class="row g-3" wire:submit.prevent="update({{ $account_id }})">
    <div class="col-md-6">
        <label for="inputRagSoc" class="form-label">{{__('messages.ragsociale')}}</label>
        <input type="text" wire:model="ragsociale" class="form-control  {{$isvalid}} @error('ragsociale') is-invalid @enderror" id="inputRagSoc" />
        @error('ragsociale') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">{{__('messages.email')}}</label>
        <input type="email" wire:model="email" class="form-control {{$isvalid}} @error('email') is-invalid @enderror" id="inputEmail4">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">{{__('messages.address')}}</label>
        <input type="text" wire:model="address" class="form-control {{$isvalid}} @error('address') is-invalid @enderror" id="inputAddress" >
        @error('address') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">{{__('messages.city')}}</label>
        <input type="text" wire:model="city" class="form-control {{$isvalid}} @error('city') is-invalid @enderror" id="inputCity" >
        @error('city') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">{{__('messages.provincia')}}</label>
        <input type="text" wire:model="state" class="form-control {{$isvalid}} @error('state') is-invalid @enderror" id="inputState" >
        @error('state') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label">{{__('messages.zip')}}</label>
        <input type="text" wire:model="zip" class="form-control {{$isvalid}} @error('zip') is-invalid @enderror" id="inputZip" >
        @error('zip') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-md-4">
        <label for="inputCell" class="form-label">{{__('messages.cellphone')}}</label>
        <input type="text" wire:model="cell" class="form-control {{$isvalid}} @error('cell') is-invalid @enderror" id="inputCell" >
        @error('cellphone') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-md-4">
        <label for="inputPhone" class="form-label">{{__('messages.phone')}}</label>
        <input type="text" wire:model="phone" class="form-control {{$isvalid}} @error('phone') is-invalid @enderror" id="inputPhone" >
        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-md-4">
        <label for="inputPiva" class="form-label">{{__('messages.piva')}}</label>
        <input type="text" wire:model="piva" class="form-control {{$isvalid}} @error('piva') is-invalid @enderror" id="inputPiva" >
        @error('piva') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="col-4">
        <label for="inputCfisc" class="form-label">{{__('messages.cfisc')}}</label>
        <input type="text" wire:model="cfisc" class="form-control {{$isvalid}} @error('cfisc') is-invalid @enderror" id="inputCfisc" >
        @error('cfisc') <span class="text-danger">{{ $message }}</span> @enderror

    </div>
    <div class="border-bottom"></div>
    <div class="col-12 d-flex justify-content-end">
        <button wire:click="cancel" type="button" class="btn btn-danger mx-1">{{__('messages.cancel')}}</button>

        <button type="submit" class="btn btn-primary mx-1">
            <i wire:loading.remove class="bi bi-pencil-square"></i>
            <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{__('messages.update')}}
        </button>
    </div>
</form>

