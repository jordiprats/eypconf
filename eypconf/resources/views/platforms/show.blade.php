@extends('layouts.app')
@section('content')
<div class="container">
  @if(Auth::user()==$user)
    @if($platform->status!=0)
  <div style="float: right;">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModal3Label">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div class="dropdown">
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
  <h1><ol class="breadcrumb">
    <li class="breadcrumb-item">@include('breadcrumbs.user')</li>
    <li class="breadcrumb-item active">{{ $platform->platform_name }}</li>
  </ol></h1>
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
