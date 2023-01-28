@extends('template.app')
@section('content')
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fs-2 text-center">Abbonamenti fatti da  {{$customer->fullname}}</div>
                <div class="card-body">

                    @include('tests.nav')

                    @if(count($customer->subscriptions) > 0)

                        <livewire:subscription.index :customer="$customer" />

                    @else

                        <div class="d-flex justify-content-center fs-3">Nessun abbonamento fatto</div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
