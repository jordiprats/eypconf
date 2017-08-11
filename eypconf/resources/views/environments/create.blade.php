@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create a new environment</h1>
  <hr/>
  {!! Form::open(['route' => ['environments.store', $user->username, $platform->platform_name]]) !!}
    {{ Form::label('environment_name', 'Environment name:') }}
    {{ Form::text('environment_name', null, array('class' => 'form-control')) }}
    {{ Form::label('description', 'Short description:') }}
    {{ Form::text('description', null, array('class' => 'form-control')) }}

    {{ Form::submit('Create environment', array('class'=>'btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
  {!! Form::close() !!}
</div>
@endsection
