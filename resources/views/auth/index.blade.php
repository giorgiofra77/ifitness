@extends('template.app')

@section('content')
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Gestione Utenti</div>
                <div class="card-body">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary me-2" role="button"
                               aria-disabled="true"><i class="bi bi-plus-square me-1"></i>{{__('messages.add')}}</a>
                        </li>
                    </ul>
                    @isset($users)
                        <table class="table mt-4 table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Cognome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Azienda</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @each('auth.list', $users, 'user')
                            </tbody>
                        </table>
                    @endisset
                </div>
                <x-alert/>

            </div>

        </div>
    </div>
@endsection
