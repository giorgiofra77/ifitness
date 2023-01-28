@extends('layouts.app')

@section('content')
@if(count($users) > 0)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Gestione utenti</div>

                        <div class="card-body">
                            <ul class="nav justify-content-end">
                              <li class="nav-item">
                                <a class="nav-link active" href="{{ route('users.create') }}"><i class="fas fa-user-plus"></i></a>
                              </li>
                            </ul>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nome</th>
                                  <th scope="col">Cognome</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Tipo Utente</th>
                                  <th scope="col">&nbsp;</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($users as $user)
                                    <tr>
                                      <th scope="row">{{$user->id}}</th>
                                      <td>{{$user->name}}</td>
                                      <td>{{$user->lastname}}</td>
                                      <td>{{$user->email}}</td>
                                      @if($user->is_admin)
                                        <td>{{__('Admin')}}</td>
                                      @else
                                        <td>{{__('User')}}</td>
                                      @endif
                                      <td>
                                        <div class="dropdown">
                                          <a class="mx-0 btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <!-- <i class="fas fa-bars"></i> -->
                                            <i class="fas fa-cog"></i>
                                          </a>

                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i class="mr-1 fas fa-edit"></i>Modifica</a>

                                                <button type="submit" data-toggle="modal" data-target="#confirmModal" class="dropdown-item"><i class="mr-1 fas fa-trash-alt"></i>Elimina</button>

                                          </div>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <form method="POST" action="{{ route('users.destroy', $user->id) }}">
              @csrf
              @method('DELETE')
              @include('modal.confirm')
          </form>
@else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Gestione utenti</div>

                        <div class="card-body">
                            <ul class="nav justify-content-end">
                              <li class="nav-item">
                                <a class="nav-link active" href="{{ route('users.create') }}"><i class="fas fa-user-plus"></i></a>
                              </li>
                            </ul>
                            Nessun utente
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
@endsection
