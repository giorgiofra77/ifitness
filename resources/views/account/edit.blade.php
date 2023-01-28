@extends('template.app')
@section('content')
    <div>
        <livewire:account.edit :account="$account"/>
    </div>
@endsection
