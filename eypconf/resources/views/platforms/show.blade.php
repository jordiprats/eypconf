@extends('layouts.app')

@section('content')
<div class="container">
  @if(Auth::user()==$user)
  <div>
    <div class="dropdown" style="float: right;">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Actions <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('environments.create', [$user->username, $platform->platform_name]) }}">Create environment</a></li>
        <li><a href="{{ route('servertypes.create', [$user->username, $platform->platform_name]) }}">Create server type</a></li>
        <li><a href="{{ route('servergroups.create', [$user->username, $platform->platform_name]) }}">Create server group</a></li>
      </ul>
    </div>
  </div>
  @endif
  <h1>Platform {{ $platform->platform_name }}</h1>
  <p>{{ $platform->description }}</p>
  <p>{{ $platform->eyp_userid }} / {{ $platform->eyp_magic_hash }} </p>
  <p>{{ $platform->status }}</p>
  @if(count($platform->environments)=='')
  <h3>No environments</h3>
  @else
    @foreach ($platform->environments as $environment)
  <h3>Environments</h3>
  <ul>
    <li><a href="{{ route('show.eyp.user.platform.env', ['user' => $user->username, 'platform' => $platform->platform_name, 'environment' => $environment->environment_name]) }}">{{ $environment->environment_name }}</a></li>
  </ul>
    @endforeach
  @endif
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
