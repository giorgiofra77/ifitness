@extends('template.app')

@section('content')
<div class="row justify-content-left">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Gestione contabilità</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                  <div class="card bg-warning">
                    <div class="card-body">
                      <h5 class="card-title">Fatturato di oggi:</h5>
                      <p class="card-text">Trattamenti €: {{$get_day_sum}}</p>
                      <p class="card-text">Vendite €: {{$get_day_sell_sum}}</p>
                      <p class="card-text">Totale €: {{$get_day_sell_sum + $get_day_sum}}</p>
                    </div>
                  </div>
                </div>
                @isset($get_date_sum)
                    <div class="col-sm-6">
                        <div class="card bg-info">
                          <div class="card-body">
                            <h5 class="card-title">Fatturato generico per periodo</h5>
                            <p class="card-text">Trattamenti €: {{$get_date_sum}}</p>
                            <p class="card-text">Vendite €: {{$get_date_sell_sum}}</p>
                            <p class="card-text">Totale €: {{$get_date_sell_sum + $get_date_sum}}</p>
                          </div>
                        </div>
                      </div>
                    @endisset

            
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="card bg-body">
                        <div class="card-body">
                          <h5 class="card-title">Fatturato generico per periodo</h5>
                          <form method="POST" action="{{route('accounting.get_by_date')}}">
                            @csrf
                                <div class="mb-3">
                                  <label for="inputFromDate" class="form-label">Data inizio</label>
                                  <input type="date" class="form-control" id="inputFromDate" aria-describedby="inputFromDate" name="from_date" required>
                                  <div id="inputFromDate" class="form-text">Indica la data di inizio</div>
                                </div>
                                <div class="mb-3">
                                  <label for="inputToDate" class="form-label">Data fine</label>
                                  <input type="date" class="form-control" id="inputToDate" aria-describedby="inputToDate" name="to_date" required>
                                  <div id="inputToDate" class="form-text">Indica la data di fine</div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="submit" class="btn btn-primary">Calcola</button>
                                </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- @isset($get_date_sum)
                    <div class="col-sm-6">
                        <div class="card bg-info">
                          <div class="card-body">
                            <h5 class="card-title">Fatturato generico per periodo</h5>
                            <p class="card-text">Trattamenti €: {{$get_date_sum}}</p>
                            <p class="card-text">Vendite €: {{$get_date_sell_sum}}</p>
                            <p class="card-text">Totale €: {{$get_date_sell_sum + $get_date_sum}}</p>
                          </div>
                        </div>
                      </div>
                    @endisset -->

                </div>
        </div>
    </div>
</div>
@endsection
