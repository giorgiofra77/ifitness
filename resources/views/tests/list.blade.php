<tr>
  <td>{{\Carbon\Carbon::create($test->date_test)->format('d/m/Y')}}</td>
  <td>{{$test->weight}}</td>
  <td>{{$test->max_watt}}</td>
  <td>{{$test->threshold_watt}}</td>


  <td>
    <div class="dropdown">
      <a class="btn btn-primary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-gear"></i>
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        <a class="dropdown-item" href="{{route('test.show', $test->id)}}"><i class="bi bi-journal-text me-1"></i>Scheda</a>

        <a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-1"></i>Modifica</a>
      </div>
    </div>
</td>
</tr>
