@extends('layouts.app')

@section('content')
<div class="container">
  @if(Auth::user()==$user)
  <div>
    {!! Form::open(['route' => 'servertypes.create', 'method' => 'get']) !!}
      {{ Form::submit('Create server type', array('class'=>'btn btn-primary', 'style'=>'float:right')) }}
    {!! Form::close() !!}
    {!! Form::open(['route' => 'servergroups.create', 'method' => 'get']) !!}
      {{ Form::submit('Create server group', array('class'=>'btn btn-primary', 'style'=>'float:right')) }}
    {!! Form::close() !!}
    {!! Form::open(['route' => 'environments.create', 'method' => 'get']) !!}
      {{ Form::submit('Create environment', array('class'=>'btn btn-primary', 'style'=>'float:right')) }}
    {!! Form::close() !!}
  </div>
  @endif
  <h1>Platform {{ $platform->platform_name }}</h1>
  <p>{{ $platform->description }}</p>
  <p>{{ $platform->eyp_userid }} / {{ $platform->eyp_magic_hash }} </p>
  <h3>Environments</h3>
  <ul>
    <li>...</li>
  </ul>
  <h3>Server groups</h3>
  <ul>
    <li>...</li>
  </ul>
  <h3>Server types</h3>
  <ul>
    <li>...</li>
  </ul>
</div>
@endsection
