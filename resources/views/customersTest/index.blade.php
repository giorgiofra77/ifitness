@extends('template.app')

@section('content')
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fs-2 text-center">Test fatti da {{$customer->name . ' '. $customer->lastname}}</div>
                <div class="card-body">

                    @include('tests.nav')

                    @if(count($tests) > 0)
                        <table class="table mt-2">
                            <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Watt massimi</th>
                                <th scope="col">Watt alla soglia</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>

                            @each('customersTest.list', $tests, 'test')

                            </tbody>

                        </table>
                    @else
                        <div class="d-flex justify-content-center fs-3">Nessun test eseguito</div>
                    @endif
                </div>

                @if (session('status'))
                    <div
                        class="card-footer mb-0 alert {{session('alert_type')}} alert-dismissible text-center fade show {{ $alert_type ?? '' }}"
                        role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ (session('status')) }}
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
