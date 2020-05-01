@extends('layouts.app')

@section('content')
@include('user.profile')
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto pr-5">
      <li class="nav-item">
        <a class="nav-link active" href="{{url('profile')}}">Personal Info <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tasks Completed</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('progress')}}">Tasks in progress </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">All Awards</a>
      </li>
    </ul>
  </div>
</nav> -->

<!-- information -->

<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="" action="">
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Username:</label>

                            <div class="col-md-4 pt-2">
                                <p>{{$data->username}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>

                            
                            <div class="col-md-4 pt-2">
                                <p>{{$data->email}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="org" class="col-md-4 col-form-label text-md-right">Organization Name:</label>

                            
                            <div class="col-md-4 pt-2">
                                <p>{{$data->org}}</p>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address:</label>

                            <div class="col-md-4 pt-2">
                                <p>{{$data->address}}</p>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="RegNo" class="col-md-4 col-form-label text-md-right">Registration No:</label>

                            <div class="col-md-4 pt-2">
                                <p>{{$data->reg_no}}</p>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">Contact No:</label>

                            <div class="col-md-4 pt-2">
                                <p>{{$data->contact}}</p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection