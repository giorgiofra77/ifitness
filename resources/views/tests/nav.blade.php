<ul class="nav justify-content-end">
    <li class="nav-item">
{{--      <div class="dropdown">
        <a class="btn btn-outline-success me-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" title="{{ __('Report trattamenti')}}">
          Report
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="{{ route('tests.report', 'day') }}">Trattamenti del giorno</a></li>
          <li><a class="dropdown-item" href="{{ route('tests.report', 'month') }}">Trattamenti del mese</a></li>
          <li><a class="dropdown-item" href="{{ route('tests.report', 'all') }}">Trattamenti totali</a></li>
          <li> <a class="dropdown-item" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Per data
          </a></li>
        </ul>
      </div>--}}
    </li>
    <li class="nav-item">
        <a class="btn btn-danger me-2" href="{{route('customers.show', $customer->id)}}" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.back') }}</a>          </li>
    <li class="nav-item">
{{--    <li class="nav-item">
      <a href="{{ route('tests.all') }}" class="btn btn-outline-primary me-2" role="button" aria-disabled="true" title="{{ __('messages.show_all')}}"><i class="bi bi-diagram-2-fill"></i></a>
    </li>--}}
  </ul>

