  <tr>
    <td>{{$customer->name}}</td>
    <td>{{$customer->lastname}}</td>
    <td>{{$customer->email}}</td>
    <td>{{$customer->cell}}</td>
    @if ($customer->birthday || null)
      <td>{{ \Carbon\Carbon::create($customer->birthday)->format('d/m/Y') }}</td>
    @else
      <td></td>
    @endif

    <td>
      <div class="dropdown">
        <a class="btn btn-primary dropdown-toggle btn-sm" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-gear"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="{{ route('customers.show', $customer->id) }}"><i class="bi bi-journal-text me-1"></i>Scheda</a>
          <a class="dropdown-item" href="{{ route('customers.edit', $customer->id) }}"><i class="bi bi-pencil-square me-1"></i>Modifica</a>
        </div>
      </div>
    </td>
  </tr>
