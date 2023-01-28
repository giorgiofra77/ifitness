@extends('template.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header text-center fs-3">{{ __('Assegna abbonamento') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-danger" href="{{ route('customers.show', $customer->id) }}" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.cancel') }}</a>
                    </div>
                    <div class="d-flex justify-content-center fs-4">{{ $customer->fullname }}</div>

                        @livewire('subscription.add', ['customer_id' => $customer->id])

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
