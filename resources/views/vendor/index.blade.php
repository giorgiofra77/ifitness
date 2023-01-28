@extends('template.app')

@section('content')
<div class="row justify-content-left">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Gestione Fornitori</div>
        <div class="card-body">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a href="{{ route('vendors.create') }}" class="btn btn-outline-primary me-2" role="button" aria-disabled="true"><i class="bi bi-plus-square me-1"></i>{{__('messages.add')}}</a>
            </li>
            {{-- <li class="nav-item">
                <form method="POST" action="{{ route('customer.find') }}" class="d-flex">
                  @csrf
                  <input class="form-control me-2" type="search" placeholder="{{__('messages.name')}} o {{__('messages.lastname')}}" aria-label="Search" name="find" required>
                  <button class="btn btn-outline-success" type="submit">{{__('messages.search')}}</button>
                </form>
            </li> --}}
          </ul>
            @if (session('status'))
              <div class="card-footer mb-2 mt-3 alert alert-danger alert-dismissible text-center fade show" role="alert" >
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              {{ (session('status')) }}
              </div>
          @endif
          @isset($vendors)
            <table class="table mt-4 table-striped">
              <thead>
                <tr>
                  <th scope="col">Rag. Sociale</th>
                  <th scope="col">Indirizzo</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Rappresentante</th>
                  <th scope="col">Cellulare</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @each('vendor.list', $vendors, 'vendor')
              </tbody>
            </table>
            {{-- @if(!isset($nopaginate))
              <div class="d-flex justify-content-center">
                {{ $customers->appends(['all' => 'true'])->links() }}              
              </div>
            @endif --}}
          @endisset
        </div>     

    </div>
  </div>
</div>
@endsection
