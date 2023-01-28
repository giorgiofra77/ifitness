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
        <td>
                <livewire:subscription.destroy :idDelete="$subscription->pivot->id"></livewire:subscription.destroy>

        </td>
    </tr>
