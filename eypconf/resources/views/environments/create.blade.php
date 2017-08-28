@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create a new environment</h1>
  <hr/>
  {!! Form::open(['route' => ['environments.store', $user->username, $platform->platform_name]]) !!}
    {{ Form::label('environment_name', 'Environment name:') }}
    <span class='help-inline'>Although it can be any string, it will be converted to ASCII only characters ("pre producció" - "pre-produccio")</span>
    {{ Form::text('environment_name', null, array('class' => 'form-control')) }}
    @foreach ($errors->get('environment_name') as $error)
      <div class='alert alert-danger'>{{ $error }}</span>
    @endforeach
    @foreach ($errors->get('slug') as $error)
      {{-- mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] ) --}}
      <div class='alert alert-danger'>{{ str_replace('slug','environment name', $error) }}</div>
    @endforeach
    {{ Form::label('description', 'Short description:') }}
    {{ Form::text('description', null, array('class' => 'form-control')) }}

    {{ Form::submit('Create environment', array('class'=>'btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
  {!! Form::close() !!}
</div>
@endsection
