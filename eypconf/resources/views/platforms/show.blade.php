@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Platform {{ $platform->platform_name }}</h1>
  <p>{{ $platform->description }}</p>
  <p>{{ $platform->eyp_userid }} / {{ $platform->eyp_magic_hash }} </p>
  <h3>Environments</h3>
  <ul>
    <li>...</li>
  </ul>
  <h3>Server types</h3>
  <ul>
    <li>...</li>
  </ul>
  <h3>Server groups</h3>
  <ul>
    <li>...</li>
  </ul></li>
</div>
@endsection
