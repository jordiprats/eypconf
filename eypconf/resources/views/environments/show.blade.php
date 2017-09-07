@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <h1><ol class="breadcrumb">
      <li class="breadcrumb-item">@include('breadcrumbs.user')</li>
      <li class="breadcrumb-item">@include('breadcrumbs.platform')</li>
      <li class="breadcrumb-item active">environment {{ $environment->environment_name }}</li>
    </ol></h1>
  </div>
  <hr/>
  <div style="float: right;">

      <i class="fa fa-trash" aria-hidden="true"></i>

  </div>
  {{--  @if($environment->status!=1) <i class="fa fa-circle-o-notch fa-spin"></i> @endif --}}
  <p>{{ $environment->description }}</p>
</div>
@endsection
