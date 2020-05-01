@extends('layouts.master')

@section('content')

<div class='content-wrapper'>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Tender</div>

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
                    <form method="POST" action="{{ route('admin.tender.store') }}" enctype = 'multipart/form-data' id='myForm'>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tender Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Tender Description</label>

                            <div class="col-md-6">
                              <textarea class='form-control' id='description' name="description" rows="8" cols="80"></textarea>
                                <!-- <input id="description" type="text-area" class="form-control" name="description"> -->

                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Publishing Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="publishing_date">

                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Closing Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="closing_date">

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
                                 <option value='0'>Select Status</option>
                                 <option>Active</option>
                                 <option>Closed</option>
                                 <option>In-progress</option>


                                 </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">Document</label>

                            <div class="col-md-6">
                                <input id="document" type="file" class="" name="document">

                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                          <label for="vendor" class="col-md-4 col-form-label text-md-right">Select Vendors</label>

                          <div class="col-md-6">
                            <select name="vendors[]" multiple id="vendors" class='form-control selectpicker'>
                              <option>All</option>

                            </select>
                          </div>
                        </div>



                        <div class="form-group row mb-0 pt-4">
                            <div class="col-md-6 offset-md-5">
                              <a href="" class='btn btn-success' id='draft'>save as draft</a>
                                <button type="submit" class="btn btn-primary">
                                    Add
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
            url: "{{ route('postdraft') }}",
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
