@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="px-4 pt-4">
      <h4>Latest Uploaded Tenders</h4>
      @foreach ($datas as $data)
      <div class='pb-0'>
          <div class="card" style="max-width: 840px;">

              <!-- <div class="col-md-4">
              <img src="/images/ser05.png" class="card-img" alt="...">
              </div> -->

                      <div class="card-body distance">
                          <div class="form-group row">
                              <label for="name" class="pr-2 pl-4 col-md-3">Name:</label>

                              <p id='name' class=''>{{$data->name}}</p>
                          </div>

                          <div class="form-group row">
                              <label for = 'publishing' class="pr-2 pl-4 col-md-3">Publishing Date:</label>
                              <p id='publishing'>{{$data->publishing_date}}</p>

                          </div>


                          <div class="form-group row">
                              <label for='closing' class="pr-2 pl-4 col-md-3">Closing Date:</label>
                              <p id='closing'>{{$data->closing_date}}</p>
                          </div>


                          <div class="form-group row">
                              <label for="category" class="pr-2 pl-4 col-md-3">Category:</label>
                              <p id='category'>{{$data->category}}</p>
                          </div>

                          <div class="text-center">
                              <a class='details btn btn-primary' href="{{route('details',$data->id)}}">View Details</a>
                          </div>





              </div>

          </div>
      </div>
      @endforeach

    </div>
</div>

@endsection
