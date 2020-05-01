@extends('layouts.app')
@section('content')

<div class='container'>

@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <!-- search -->
    <div class="input-group" style="max-width: 840px;">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-search"></i>
        </button>
        </div>
    </div>
    @php
          $i=0;
          $n=0;
        @endphp
    <!-- end of search -->
    @foreach ($datas as $data)
    <div class='pt-5 text-left'>
        <div class="card mb-3 border-0" style="max-width: 840px;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="/images/ser05.png" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="pr-2">Name:</label>

                            <p id='name' class=''>{{$data->name}}</p>
                        </div>

                        <div class="form-group row">
                            <label for = 'publishing' class="pr-2">Publishing Date:</label>
                            <p id='publishing'>{{$data->publishing_date}}</p>

                        </div>


                        <div class="form-group row">
                            <label for='closing' class="pr-2">Closing Date:</label>
                            <p id='closing'>{{$data->closing_date}}</p>
                        </div>


                        <div class="form-group row">
                            <label for="category" class="pr-2">Category:</label>
                            <p id='category'>{{$data->category}}</p>
                        </div>

                        <div class='form-group row'>
                        <a href='/storage/tenders/{{$data->document}}' target='_blank' class='btn btn-success' download>Tender Document</a>
                        @php $n = $n + 1 ; @endphp

                        <button class='btn btn-info ml-2' style='color:white;' type="button" data-toggle='modal' data-target='#desc{{$n}}'>Description</button>

                        <!-- desc -->

                        <div class="modal fade" id="desc{{$n}}">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">


                                <h4 class="modal-title">Tender Description</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->

                              <div class="modal-body">

                                    <p>{{$data->description}}</p>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>

                            </div>
                          </div>
                        </div>

                        <!-- endofmodal -->

                        </div>
                            @php $i = $i + 1 ; @endphp

                       <!-- upload qoutation -->
                       <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#my{{$i}}">
    <i class='fas fa-upload'></i> Upload Quotation </button>
    <div class="modal fade" id="my{{$i}}">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">


            <h4 class="modal-title">upload your quotation here</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <form action="{{route('submit',$data->id)}}" class='' method='POST' enctype='multipart/form-data'>
            @csrf
          <!-- Modal body -->

          <div class="modal-body">
                <p>Write your quotation :</p>
                <textarea name="quotationText" rows="8" cols="80"></textarea>
                <h3 class='text-center'>---OR---</h3>
                  <input id='doc' type="file" name='doc'>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">

                  <button type='submit' class='btn btn-primary'>Submit</button>
             </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>




            </div>
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
