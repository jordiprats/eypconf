@extends('layouts.app')

@section('content')
<div class="container">
  news
  <ul>
    @foreach ($users as $user)
    <li>{{ $user->username }}</li>
    @endforeach
  </ul>
</div>
@endsection
