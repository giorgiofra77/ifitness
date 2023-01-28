@extends('template.app')

@section('content')
    <div>
        <div class="card text-left">
            <div class="card-header container">
                <ul class="nav nav-pills card-header-pills justify-content-between">
                    <li class="nav-item fs-5 mt-2"></li>
                    <li class="nav-item fs-5 mt-2">{{$customer->fullname}}</li>
                    <li class="nav-item">
                        <a class="btn btn-danger me-2" href="{{route('customers.show', $customer->id)}}" role="button">
                            <i class="bi bi-backspace me-2"></i>{{ __('messages.back') }}</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Zone Potenza
                        </button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Zone Frequenza
                        </button>
                    </div>
                </nav>
                <div class="tab-content mt-3 col-auto" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                         tabindex="0">

                        <livewire:powerzone.create-power-zone :customer_id="$customer->id"></livewire:powerzone.create-power-zone>

                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                         tabindex="0">
                        <livewire:heartzone.create-heart-zone :customer_id="$customer->id"></livewire:heartzone.create-heart-zone>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
