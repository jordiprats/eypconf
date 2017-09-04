@extends('layouts.app')

@section('content')
<div class="container">
  users
  <ul>
    @foreach ($users as $user)
    <li><a href="{{ route('show.eyp.user', ['user' => $user->username ]) }}">{{ $user->username }}</a></li>
    @endforeach
  </ul>
</div>
@endsection
