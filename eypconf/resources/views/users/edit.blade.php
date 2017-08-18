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

  <div class="row">
  {{ Form::model($user, array('route' => 'user.update')) }}
    <div class="col-*-*">
      <div class="image-upload">
        <label for="file-input">
          <img src="/img/users/profile/{{ $user->avatar }}" class="img-responsive img-thumbnail"/>
        </label>

        <input id="file-input" type="file" style="display: none" />
      </div>
    </div>
    <hr />
    <div class="col-*-*">
      <p>{{ Form::label('username', 'Username:', array('class' => 'address')) }}
      {{ $user->username }}</p>
      {{ Form::label('name', 'Name:', array('class' => 'address')) }}
      {{ Form::text('name', null, array('class' => 'form-control')) }}
      <hr />
      {{ Form::submit('Save', array('class'=>'btn-success btn-lg')) }}
    </div>
  {{ Form::close() }}
  </div>
</div>
@endsection
