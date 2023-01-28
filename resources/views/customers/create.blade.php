@extends('template.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header text-center">{{ __('Inserisci cliente') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-danger" href="{{ route('customers.index') }}" role="button"><i class="bi bi-backspace me-1"></i>{{ __('messages.cancel') }}</a>
                    </div>



                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf

                        <input type="hidden" class="form-control @error('account_id') is-invalid @enderror" value="{{ old('account_id', Auth::user()->account_id) }}" id="inputAccount_id" name="account_id"   required>
                        <div class="row row-cols-2 mb-4">
                            <div class="col-md-6">
                            <label class="mb-1" for="inputName">Nome *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="inputName" name="name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                            <label class="mb-1" for="inputLastname">Cognome *</label>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" id="inputLastname" name="lastname" required>
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>


                        <div class="row row-cols-3 mb-4">
                            <div class="col-md-4">
                            <label class="mb-1" for="inputEmail4">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="inputEmail4" name="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-4">
                            <label class="mb-1" for="inputCell">Cell</label>
                                <input type="text" class="form-control" id="inputCell" name="cell">
                                @error('cell')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="mb-1" for="inputBirthday">Data di nascita</label>
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday">
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>


                        <div class="row row-cols-1 mb-4">
                            <div class="col-md-12">
                                <label class="mb-1" for="inputAddress">Indirizzo</label>
                                <input type="text" class="form-control" id="inputAddress" name="address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                        </div>

                        <div class="row row-cols-3 mb-4">
                            <div class="col-md-4">
                            <label class="mb-1" for="inputCity">Città</label>
                                <input type="text" class="form-control" id="inputCity" name="city">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-4">
                            <label class="mb-1" for="inputState">Provincia</label>
                                <input type="text" class="form-control" id="inputCity" name="state">
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-4">
                            <label class="mb-1" for="inputZip">Cap</label>
                                <input type="text" class="form-control" id="inputZip" name="zip">
                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-cols-2 mb-4">
                            <div class="col-md-6">
                            <label class="mb-1" for="inputProf">{{__('messages.card_number')}}</label>
                                <input type="text" class="form-control @error('card_number') is-invalid @enderror" value="{{ old('card_number') }}" id="inputCard" name="card_number">
                                @error('card_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                            <label class="mb-1" for="inputLastname">Sport principale</label>
                                <input type="text" class="form-control @error('sport') is-invalid @enderror" value="{{ old('sport') }}" id="inputProf" name="sport">
                                @error('sport')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mb-1" for="inputAddress">Note generali</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                        </div>


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check me-1"></i>{{ __(' Conferma') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
