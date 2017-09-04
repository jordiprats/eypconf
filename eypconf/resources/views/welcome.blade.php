@extends('layouts.app')

@section('content')
<div class="container">
  users
  <ul>
    @foreach ($users as $user)
    <li>@include('breadcrumbs.user')</li>
    @endforeach
  </ul>
</div>
@endsection
