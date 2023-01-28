<ul class="nav nav-pills card-header-pills justify-content-end">
  <li class="nav-item">
    <a class="btn btn-danger me-2" href="{{ route('boxes.list', $boxe->customer_id) }}" role="button"><i class="bi bi-backspace me-2"></i>{{ __('messages.back') }}</a>
  </li>
  <li class="nav-item">
    <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#boxModifyModal">
      <i class="bi bi-pencil-square me-1"></i>Modifica
  </button>
  </li>
  <li class="nav-item">
    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#treatmentModal">
      <i class="bi bi-plus-square-fill "></i>
  </button>
  </li>
  <li class="nav-item">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
        <i class="bi bi-check-square-fill"></i>
      </button>
  </li>
</ul>