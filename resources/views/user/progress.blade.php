@extends('layouts.dashboard')

@section('content')

<!-- @include('user.profile') -->

@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
<!-- progress -->
<div class="content-wrapper">


<div class='pt-4 px-4'>
  <h4>In-progress Tasks</h4>
@include('vendorData.prog')
</div>

</div>
@endsection
