
<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->lastname}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->account->ragsociale}}</td>
    <td><a class="btn btn-secondary" href="{{route('users.show', $user->id)}}"><i class="bi bi-person-gear"></i></a></td>
  </tr>
