@extends('template.app')

@section('content')

    <div class="card text-left">
      <div class="card-header container">
        <ul class="nav nav-pills card-header-pills justify-content-end">
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary me-2"><i class="bi bi-backspace-fill"></i></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary me-2"><i class="bi bi-pencil-square"></i></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.updpsw', $user->id) }}" class="btn btn-outline-primary me-2" role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#editPassword"><i class="bi bi-key"></i></a>
          </li>
          @if (Auth::id() != $user->id)
          <li class="nav-item">
            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-outline-danger me-2" role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#confirmModal"><i class="bi bi-trash"></i></a>
          </li>
          @endif
        </ul>
      </div>

        <!-- Modal DELETE-->
        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
            @csrf
            @method('DELETE')
          <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="confirmModal">Conferma eliminazione</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Sei sicuro di voler eliminare l'utente?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                  <button type="submit" class="btn btn-danger">Si! Elimina!</button>
                </div>
              </div>
            </div>
          </div>
        </form>

        <!-- Modal UPDATE PASSWORD-->
        <form method="POST" action="{{ route('users.updpsw', $user->id) }}">
          @csrf
          @method('PATCH')
        <div class="modal fade" id="editPassword" tabindex="-1" aria-labelledby="editPassword" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editPassword">Cambio password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Cambio password
              </div>
              <div class="mb-3 row ms-2">
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

            <div class="mb-3 row ms-2">
                <label for="password-confirm" class="col-md-4 col-sm-2 col-form-label">{{ __('Conferma Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-primary">Modifica</button>
              </div>
            </div>
          </div>
        </div>
      </form>

          <div class="card-body">

            <h5 class="card-title">{{$user->name}}</h5>
              <div class="row">

                <div class="col-sm-6">
                  <div class="card text-dark bg-light mb-3">
                    <div class="card-body text-left">
                      <h5 class="card-title">Dati</h5>
                      <p class="card-text">{{__('Nome')}}: {{ $user->name}}</p>
                      <p class="card-text">{{__('Cognome')}}: {{ $user->lastname}}</p>
                      <p class="card-text">{{__('Email')}}: {{ $user->email}}</p>
                    </div>
                  </div>
                </div>

              </div>
              <x-alert/>
          </div>

@endsection
