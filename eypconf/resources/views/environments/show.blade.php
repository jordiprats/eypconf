@extends('layouts.app')

@section('content')
<div class="container">
  <h1><ol class="breadcrumb">
    <li class="breadcrumb-item">@include('breadcrumbs.user')</li>
    <li class="breadcrumb-item">@include('breadcrumbs.platform')</li>
    <li class="breadcrumb-item active">environment {{ $environment->environment_name }}</li>
  </ol></h1>
  {{--  @if($environment->status!=1) <i class="fa fa-circle-o-notch fa-spin"></i> @endif --}}
  <div> <!-- contenidor accions -->
  </div>
  <hr/>
  <p>{{ $environment->description }}</p>
</div>
@endsection
