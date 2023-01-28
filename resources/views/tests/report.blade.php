@extends('template.app')

@section('content')
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Gestione trattamenti</div>
                <div class="card-body">

                    @include('tests.nav')

                    @isset($reports)
                        <table class="table mt-2">
                            <thead>
                            <tr>
                                <th scope="col">Codice</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Quantità</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{$report->treatment->code}}</td>
                                    <td>{{$report->treatment->desc}}</td>
                                    <td>{{$report->total}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    @endif
                </div>


                @if (session('status'))
                    <div class="card-footer mb-0 alert {{session('alert_type')}} alert-dismissible text-center fade show {{ $alert_type ?? '' }}"
                         role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ (session('status')) }}
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
