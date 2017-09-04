@extends('layouts.app')

@section('content')
<div class="container">
  <h1><a href="{{ route('show.eyp.user', ['user' => $user->username ]) }}">{{ $user->username }}</a> / <a href="{{ route('show.eyp.user.platform', ['user' => $user->username, 'platform' => $platform->slug ]) }}">{{ $platform->platform_name }}</a> / environment {{ $environment->environment_name }} @if($environment->status!=1) <i class="fa fa-circle-o-notch fa-spin"></i> @endif</h1>
  <hr/>
  <p>{{ $environment->description }}</p>
</div>
@endsection
