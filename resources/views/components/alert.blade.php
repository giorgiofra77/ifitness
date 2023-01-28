@if (session('status'))
    <div class="card-footer mb-0 alert alert-{{session('alert_type')}} alert-dismissible text-center fade show"
        role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ (session('status')) }}
    </div>
@endif
