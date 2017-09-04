@extends('layouts.app')
@section('content')
<div class="container">
  @if(Auth::user()==$user)
    @if($platform->status!=0)
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
    @else
  <div style="float: right;">
    <button class="btn btn-secondary disabled" type="button">No Actions available </span></button>
  </div>
    @endif
  @endif
  <h1><a href="{{ route('show.eyp.user', ['user' => $user->username ]) }}">{{ $user->username }}</a> / {{ $platform->platform_name }}</h1>
  <p>{{ $platform->description }}</p>
  <p>{{ $platform->eyp_userid }} / {{ $platform->eyp_magic_hash }} </p>
  @if($platform->status!=0)
  <p>Platform ready</p>
  @else
  <p><i class="fa fa-circle-o-notch fa-spin"></i> Please wait while we are creating you platform</p>
  @endif
  @if(count($platform->environments)=='')
  <h3>No environments defined</h3>
  @else
    <h3>Environments</h3>
    <ul>
    @foreach ($platform->environments as $environment)
    <li><a href="{{ route('show.eyp.user.platform.env', ['user' => $user->username, 'platform' => $platform->slug, 'environment' => $environment->slug]) }}">{{ $environment->environment_name }}</a></li>
    @endforeach
  </ul>
  @endif
  <h3>Server groups</h3>
  <ul>
    <li>...</li>
  </ul>
  <h3>Server types</h3>
  <ul>
    <li>...</li>
  </ul>
  <h3>Nodes</h3>
  <ul>
    <li>...</li>
  </ul>
</div>
@endsection
