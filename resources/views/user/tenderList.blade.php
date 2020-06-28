@extends('layouts.app')
@section('content')

<div class="world">

</div>

<div class='container pt-4'>

@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <!-- search -->
    <form class="" action="{{route('search')}}" method="get">
      @csrf
      <div class="input-group pb-5" style="max-width: 840px;">
          <input type="text" class="form-control" placeholder="Search by name, category, publishing date, closing date" name='keyword' value='{{$keyword ?? ''}}'>
          <div class="input-group-append">
          <button class="btn btn-secondary" type="submit">
              <i class="fa fa-search"></i>
          </button>
          </div>
      </div>
    </form>

    @php
          $i=0;
          $n=0;
        @endphp
    <!-- end of search -->
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

    {!! $datas->links() !!}
</div>
<!-- The Modal -->

<script>
 console.log('#{{$i}}');
</script>
@endsection
