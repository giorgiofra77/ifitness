@extends('template.app')
@section('content')
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center h5">Iscrizioni attive dei clienti</div>
                <div class="card-body">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a href="{{route('allsub')}}" class="btn btn-primary me-1" role="button" aria-disabled="true" title="{{ __('Abbonamenti')}}"><i class="bi bi-postcard me-1"></i>{{__('Abbonamenti')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('allsubunder')}}" class="btn btn-warning me-1" role="button" aria-disabled="true" title="{{ __('Abbonamenti in scadenza')}}"><i class="bi bi-postcard me-1"></i>{{__('In scadenza')}}</a>
                        </li>
                    </ul>
                    @if(isset($customers) && count($customers) > 0)
                        <table class="table mt-2">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Cognome</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($customers as $c)
                                <tr class="bg-light">
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->lastname}}</td>
                                    <th>Abbonamenti</th>
                                    <th>Scadenza</th>
                                </tr>
                                    @foreach($c->subscriptions as $s)
                                            <tr class="border-bottom-0 border-white
                                                 @if( ($s->pivot->is_under)) bg-warning @endif">
                                                <td></td>
                                                <td></td>
                                                <td><a href="{{route('customers.show', $c->id)}}" >{{$s->descr}}</a></td>
                                                <td><a href="{{route('customers.show', $c->id)}}">@date($s->pivot->date_end)</a></td>
                                            </tr>
                                    @endforeach
                            @endforeach

                            </tbody>

                        </table>
                    @else
                        <div class="d-flex justify-content-center h4">Nulla da segnalare</div>
                    @endif
                </div>
                <div class="card-footer d-flex justify-content-center py-3">
                    {{ $customers->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
