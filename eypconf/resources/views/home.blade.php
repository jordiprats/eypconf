@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  @if(Auth::user()==$user)
                  {!! Form::open(['route' => 'platforms.create', 'method' => 'get']) !!}
                    {{ Form::submit('Create new platform', array('class'=>'btn-success btn-lg', 'style'=>'float:right')) }}
                  {!! Form::close() !!}
                  @endif
                  <h1>Platforms</h1>
                  <ul>
                    @foreach ($platforms as $platform)
                    <li><a href="{{ route('show.eyp.user.platform', ['user' => $user->username, 'platform' => $platform->slug ]) }}">{{ $platform->platform_name }}</a></li>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
