@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Environment - {{ $environment->environment_name }}</h1>
  <hr/>
  <p>{{ $environment->description }}</p>

</div>
@endsection
