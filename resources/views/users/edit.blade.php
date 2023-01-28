@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifica utente') }}</div>

                <div class="card-body">
                    <div class="form-group row text-md-right">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-danger" href="{{ route('users.index') }}" role="button">{{ __('Indietro') }}</a>
                            </div>
                        </div>
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$user->lastname}}"  autocomplete="lastname">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_admin" class="col-md-4 col-form-label text-md-right">{{ __('Tipo utente') }}</label>

                            <div class="col-md-6">
                              <select name="is_admin" id="is_admin" class="form-control">
                               @if($user->is_admin == 1)
                                <option value="0">User</option>
                                <option value="1" selected>Administrator</option>
                               @else
                                <option value="0" selected>User</option>
                                <option value="1">Administrator</option>
                                @endif


                              </select>
                            </div>
                        </div>

                        <div class="form-group row text-md-right">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-0">
                                    {{ __('Conferma') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
