<div>
    <table class="table table-responsive-sm">
        <thead>
        <tr>
            <th scope="col">Situazione</th>
            <th scope="col">Abbonamento</th>
            <th scope="col">Data inizio</th>
            <th scope="col">Data fine</th>
            <th scope="col">Prezzo</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($subscriptions as $subscription)
                @if(!$subscription->pivot->is_expired)
                    <tr style="background: #5cd08d">
                        <td>Attivo</td>
                @else
                    <tr>
                        <td>Scaduto</td>
                        @endif
                        <td>{{$subscription->descr}}</td>
                        <td>@date($subscription->pivot->date_start)</td>
                        <td>@date($subscription->pivot->date_end)</td>
                        <td>{{$subscription->pivot->price}}</td>
                        @if(!$subscription->pivot->is_expired)
                                <td>
                                    <button type="button" class="btn btn-danger me-2" role="button"
                                            wire:click="deleteId({{$subscription->pivot->id}})"
                                            aria-disabled="true" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                        @else
                            <td></td>
                        @endif

                    </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModal">Attenzione operazione irreversibile!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Confermi l'eliminazione dell'iscrizione?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-danger">Si! Elimina!</button>
                </div>
            </div>
        </div>
    </div>
</div>
