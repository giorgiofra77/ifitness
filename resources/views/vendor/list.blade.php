
<tr>
  <td>{{$vendor->ragsociale}}</td>
  <td>{{$vendor->address}}</td>
  <td>{{$vendor->phone}}</td>
  <td>{{$vendor->rappresentante}}</td>
  <td>{{$vendor->cell}}</td>
  <td>
    <div class="dropdown">
      <a class="btn btn-primary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-gear"></i>
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        <a class="dropdown-item" href="{{ route('vendors.show', $vendor->id) }}"><i class="bi bi-journal-text me-1"></i>Scheda</a>

        <a class="dropdown-item" href="{{ route('vendors.edit', $vendor->id) }}"><i class="bi bi-pencil-square me-1"></i>Modifica</a>
      </div>
    </div>
</td>
</tr>