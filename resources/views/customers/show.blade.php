@extends('template.app')
@section('content')

    <div class="card text-left">
        <div class="card-header container">
            @include('customers.nav')
        </div>

        @include('customers.deleteModal')

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-dark mb-3">
                        <div class="card-body">
                            <h2 class="card-title">{{$customer->fullName ?? ''}}</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h6>{{__('messages.address')}}</h6> {{ $customer->address ?? '' }} -
                                    {{ $customer->zip }} - {{ $customer->city }} - {{ $customer->state }}</li>
                                <li class="list-group-item"><h6>{{__('messages.email')}}</h6> {{ $customer->email}}</li>
                                <li class="list-group-item">
                                    <h6>{{__('Data di nascita')}}</h6>@if ($customer->birthday || null)
                                        @date($customer->birthday)
                                    @endif</li>
                                <li class="list-group-item">
                                    <h6>{{__('messages.card_number')}}</h6> {{ $customer->card_number}}</li>
                                <li class="list-group-item"><h6>{{__('messages.sport')}}</h6> {{ $customer->sport}}</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="card mb-3 bg-light">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-postcard-heart me-2"></i>Abbonamento</h5>
                            @forelse($customer->subscriptions as $subscription)
                                @if(!$subscription->pivot->is_expired)
                                    <p class="card-text px-3 py-3 rounded-3" style="background: #a7f815">{{$subscription->descr ?? ''}}
                                        fino al @date($subscription->pivot->date_end)</p>
                                    @if( (\Carbon\Carbon::createFromDate(today())
                                                ->diffInDays($subscription->pivot->date_end)) <= 30)
                                        <p class="card-text bg-warning px-3 py-3 rounded-3">In scadenza
                                            tra {{ \Carbon\Carbon::createFromDate(today())->diffInDays($subscription->pivot->date_end) }}
                                            giorni <a class="link-primary" href="{{route('customer.subscription.update',[$subscription->pivot->id])}}">Rinnova</a> </p>
                                    @endif
                                @endif
                            @empty
                                <p class="card-text">Nessun abbonamento o scaduto</p>
                            @endforelse

                        </div>
                    </div>
                    <div class="card text-dark bg-light bg-opacity-50 mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-cash-coin me-2"></i>Ricavi abbonamenti</h5>
                            <p class="card-text">Quest'anno:
                                € {{\App\Models\SubscriptionCustomer::getYearSum($customer->id) ?? ''}}</p>
                            <p class="card-text">Di sempre:
                                € {{ $customer->subscriptions->sum('price') ?? ''}}</p>
                        </div>
                    </div>

                    <x-alert/>

                </div>

                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-card-checklist me-2"></i>Note</h5>
                        <p class="card-text">{{$customer->note}}</p>
                    </div>
                </div>

            </div>
        </div>

@endsection
