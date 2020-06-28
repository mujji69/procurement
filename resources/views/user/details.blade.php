@extends('layouts.app')
@section('content')
<div class="container pt-5">
    <div class="card">
        <div class="card-header">

        </div>

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
          @if($data->document != 'no' && $data->document != null)
          <div class="form-group row">
              <label for="document" class="pr-2 pl-4 col-md-3">Tender Document:</label>
                <a href='/storage/tenders/{{$data->document}}' target='_blank' class='btn btn-success' download>Download</a>
          </div>
          @endif

          @if($data->description != null)
          <div class="form-group row">
              <label for="document" class="pr-2 pl-4 col-md-3">Tender Description:</label>
              <textarea rows="4" cols="40" readonly>{{$data->description}}</textarea>
          </div>
          @endif

          @if(isset($submission))

              @foreach($form_headers as $header)
                  <div class="form-group row">
                      <strong class='pr-2 pl-4 col-md-3'>{{ $header['label'] ?? title_case($header['name']) }}: </strong>
                      <span class="">
                          {{ $submission->renderEntryContent($header['name'], $header['type']) }}
                      </span>
                  </div>
              @endforeach

          @endif
        </div>
    </div>

    <!-- upload qoutation -->
    @if($check->toArray() == null)
      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#my">
          <i class='fas fa-upload'></i> Upload Quotation </button>
          <h4 class='pl-4 pr-4 pt-1' style='font-weight:bold;color:grey;'>OR</h4>
          <a href="{{route('form',$data->id)}}" class='btn btn-primary'><i class="fas fa-journal-whills pr-2"></i>Fill the form</a>
      </div>



          <div class="modal fade" id="my">
          <div class="modal-dialog modal-dialog-centered">
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
          @else
          <p class='text-center' style='font-size:20px;font-weight:bold;'>You have already submitted your quotation</p>
          @endif
<!-- end modal -->
</div>
@endsection
