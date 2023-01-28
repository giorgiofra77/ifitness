@extends('template.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifica utente') }}</div>
                @isset($user)
                    
                <div class="card-body">
                    <div class="mb-3 row text-md-right">
                            <div class="col-md-6 offset-md-10">
                                <a class="btn btn-danger" href="{{route('users.index')}}" role="button"><i class="fas fa-backspace mr-1"></i>{{ __('Indietro') }}</a>
                            </div>
                    </div>
                    <form method="POST" action="{{route('users.update', $user->id)}}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-sm-2 col-form-label">{{ __('Nome *') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="lastname" class="col-md-4 col-sm-2 col-form-label">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $user->lastname) }}"  autocomplete="lastname">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="username" class="col-md-4 col-sm-2 col-form-label">{{ __('Username *') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}"  autocomplete="username" required>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-sm-2 col-form-label">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{--                         
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-sm-2 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-sm-2 col-form-label">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="mb-3 row">
                            <label for="is_admin" class="col-md-4 col-sm-2 col-form-label">{{ __('Tipo utente') }}</label>

                            <div class="col-md-6">
                              <select name="is_admin" id="is_admin" class="form-select">
                                  @if ($user->is_admin)
                                  <option value="1" selected>Amministratore</option>
                                  <option value="0">Utente semplice</option>
                                  @else
                                  <option value="0" selected>Utente semplice</option>
                                  <option value="1" >Amministratore</option>
                                  @endif
                                
                              </select>
                            </div>
                        </div>

                        <div class="mb-3 row text-md-right">
                            <div class="col-md-6 offset-md-10">
                                <button type="submit" class="btn btn-primary mr-0">
                                    <i class="fas fa-check mr-1"></i>{{ __('Conferma') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
