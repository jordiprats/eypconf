@extends('layouts.app')

@section('content')
<div class="container">
  @if(Session::has('status'))
  <div class="alert {{ Session::get('status-class') }}">
    <strong>{{ Session::get('status') }}</strong>
  </div>
  @endif
  <h1>Public profile</h1>
  <hr/>
  <strong>Username</strong>: {{ $user->username }}

  {{ Form::model($user, array('route' => 'user.update')) }}
      {{ Form::label('name', 'Name:', array('class' => 'address')) }}
      {{ Form::text('name', null, array('class' => 'form-control')) }}
      <hr />
      {{ Form::submit('Save', array('class'=>'btn-success btn-lg')) }}
  {{ Form::close() }}
</div>
@endsection
