@extends('template.app')

@section('content')

<div class="row justify-content-left">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Gestione clienti</div>
        <div class="card-body">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a href="{{ route('customers.index', 'all=true') }}" class="btn btn-outline-primary me-2" role="button" aria-disabled="true"><i class="bi bi-people-fill me-1"></i>{{__('messages.all')}}</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('customers.create') }}" class="btn btn-outline-primary me-2" role="button" aria-disabled="true"><i class="bi bi-person-plus-fill me-1"></i>{{__('messages.add')}}</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('customer.find') }}" class="d-flex mb-lg-5">
                  @csrf
                  <input class="form-control me-2" minlength="3" type="search" placeholder="{{__('messages.name')}} o {{__('messages.lastname')}}" aria-label="Search" name="find" required autofocus>
                    @error('find')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <button class="btn btn-outline-success" type="submit">{{__('messages.search')}}</button>
                </form>
            </li>
          </ul>

          @isset($customers)
              @if(count($customers) > 0)
                    @each('customers.listgroup', $customers, 'customer')
                    @if(!isset($nopaginate))
                      <div class="d-flex justify-content-center mt-2">
                        {{ $customers->appends(['all' => 'true'])->links() }}
                      </div>
                    @endif
                @else
                    <div class="d-flex justify-content-center mt-5 fs-3">Archivio clienti vuoto</div>
                @endif
          @endisset
        </div>


      @if (session('status'))
        <div class="card-footer mb-0 alert alert-danger alert-dismissible text-center fade show" role="alert" >
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ (session('status')) }}
        </div>
      @endif


    </div>
  </div>
</div>
@endsection
