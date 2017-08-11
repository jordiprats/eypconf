@extends('layouts.app')

@section('content')
<div class="container">
  @if(Auth::user()==$user)
  <div>
    {{-- {!! Form::open(['route' => 'servertypes.create', 'method' => 'get']) !!}
      {{ Form::hidden('platform_id', $platform->id) }}
      {{ Form::submit('Create server type', array('class'=>'btn btn-primary', 'style'=>'float:right')) }}
    {!! Form::close() !!}
    {!! Form::open(['route' => 'servergroups.create', 'method' => 'get']) !!}
      {{ Form::hidden('platform_id', $platform->id) }}
      {{ Form::submit('Create server group', array('class'=>'btn btn-primary', 'style'=>'float:right')) }}
    {!! Form::close() !!}
    {!! Form::open(['route' => 'environments.create', 'method' => 'get']) !!}
      {{ Form::hidden('platform_id', $platform->id) }}
      {{ Form::submit('Create environment', array('class'=>'btn btn-primary', 'style'=>'float:right')) }}
    {!! Form::close() !!} --}}
    <div class="dropdown" style="float: right;">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Actions <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('environments.create') }}">Create environment</a></li>
        <li><a href="{{ route('servertypes.create') }}">Create server type</a></li>
        <li><a href="{{ route('servergroups.create') }}">Create server group</a></li>
      </ul>
    </div>
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
