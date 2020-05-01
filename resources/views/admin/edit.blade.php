@extends('layouts.master')

@section('content')
<div class='content-wrapper'>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Tender</div>

                @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there are some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

                <div class="card-body">
                    <form id='myForm' method="POST" action="{{ route('admin.tender.update',$data->id) }}" enctype = 'multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tender Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value='{{$data->name}}'>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Tender Description</label>

                            <div class="col-md-6">
                              <textarea class='form-control' id='description' name="description" rows="8" cols="80" value=''>{{$data->description}}</textarea>
                                <!-- <input id="description" type="text-area" class="form-control" name="description"> -->

                            </div>
                        </div>


                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Publishing Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="publishing_date" value='{{$data->publishing_date}}'>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Closing Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="closing_date" value='{{$data->closing_date}}'>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select class="form-control" name="category"  data-live-search='true' id='category'>
                                  <option>Select Category</option>
                                  <option>IT Equipment</option>
                                  <option>Equipment for Agriculture / Livestock</option>
                                  <option>Equipment for Health/Medical Supplies</option>
                                  <option>Water Treatment/Equipment/Products</option>
                                  <option>Equipment for Meteorological</option>
                                  <option>Equipment for Technical & Vocational Training</option>
                                  <option>Computer Hardware</option>
                                  <option>Bullet Proof Vehicles/Parts/Accessories</option>
                                  <option>Equipment for Security/Fire Fighting</option>
                                  <option>Clearing Agents</option>
                                  <option>Equipment for Construction</option>
                                  <option>Equipment for Energy</option>
                                  <option>Equipment for Geological</option>
                                  <option>Disaster Relief Goods (such as Tent, Pills, etc.)</option>
                                  <option>Office Supply (such as Stationery, etc.)</option>
                                  <option>Computer Software</option>
                                  <option>Electronics</option>
                                  <option>General Vehicles/Parts/Accessories</option>
                                  <option>Transport & Storage</option>

                                </select>


                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                 <select name="status" id="status" class='form-control'>

                                 <!-- <option value="{{ $data->id }}" {{ ($data->id == old('status') ? 'selected="selected"' : '') }}>{{ $data->status }}</option>                                  -->
                                <option @if($data->status=='Active') selected='selected' @endif>Active</option>
                                <option @if($data->status=='Closed') selected='selected' @endif>Closed</option>
                                <option @if($data->status=='In-progress') selected='selected' @endif>In-progress</option>

                                 </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">Document</label>

                            <div class="col-md-6 pt-2">
                            <a href='/storage/tenders/{{$data->document}}' target='_blank' >'{{$data->document}}'</a>

                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">Change Document</label>

                            <div class="col-md-6">
                                <input id="document" type="file" value='file upload' class="" name="document" value="{{$data->document}}">

                            </div>
                        </div>


                        <div class="form-group row">
                          <label for="vendor" class="col-md-4 col-form-label text-md-right">Select Vendors</label>

                          <div class="col-md-6">
                            <select name="vendors[]" multiple id="vendors" class='form-control selectpicker'>
                              <option>All</option>

                            </select>
                          </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <a href="" class='btn btn-success' id='draft'>save as draft</a>
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
$(function() {
  $("#category option").each(function(i){
      if($(this).val() == '{{$data->category}}'){
$($(this)).attr("selected","selected");

}
  });

  // for vendors

  var categ = document.getElementById('category');
  console.log(categ.value);
   // Empty the dropdown
   $('#vendors').find('option').not(':first').remove();

// AJAX request
$.ajaxSetup({
headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({

  type: 'POST',
  url: '/selectVendors',
  data:{
       _token: "{{ csrf_token() }}",
        cat: categ.value,
       },
  success: function(response){
    console.log(response);

  var len = 0;
    if(response['data'] != null){
      len = response['data'].length;
    }

    console.log(len);
    if(len > 0){
      // Read data and create <option >
      for(var i=0; i<len; i++){

         // var id = response['data'][i].id;
        var name = response['data'][i];

        var option = "<option>"+name+"</option>";

        $("#vendors").append(option).selectpicker('refresh');
      }
    }
  }
});
// end vendors
});

$(document).ready(function(){

  // Department Change
  $('#category').on('change',function(){

     // Department id
     var cat = $(this).children('option:selected').text();
       // alert(cat);

     // Empty the dropdown
      $('#vendors').find('option').not(':first').remove();

     // AJAX request
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

     $.ajax({

       type: 'POST',
       url: '/selectVendors',
       data:{
            _token: "{{ csrf_token() }}",
             cat: cat,
            },
       success: function(response){
         console.log(response);

       var len = 0;
         if(response['data'] != null){
           len = response['data'].length;
         }

         console.log(len);
         if(len > 0){
           // Read data and create <option >
           for(var i=0; i<len; i++){

              // var id = response['data'][i].id;
             var name = response['data'][i];

             var option = "<option>"+name+"</option>";

             $("#vendors").append(option).selectpicker('refresh');
           }
         }
       }
    });
  });
// Draft

$('#draft').click(function(event){
    event.preventDefault();

    var data = $('#myForm').serialize();
    // var form = document.getElementById();
    // alert(data);

    var formData = new FormData($('#myForm')[0]);
    // formData.append('file', $('input[type=file]')[0].files[0]);
    // alert(formData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "{{ route('updatedraft',$data->id) }}",
        processData: false,
        contentType: false,
        data: formData,

        success: function (data) {

            // $("#output").text(data);
            console.log("SUCCESS : ");
            window.location = data.url;

            // $("#btnSubmit").prop("disabled", false);

        },
        error: function (e) {

            // $("#output").text(e.responseText);
            console.log("ERROR : ", e);
        //   $("#btnSubmit").prop("disabled", false);

        }
    });



});
});
</script>
@endsection
