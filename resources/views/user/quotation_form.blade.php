@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

@section('content')

  <div class="container pt-5">
    <form class="" action="{{route('formSubmit',$id)}}" method="post">
      @csrf
      <div class="card">
          <div class="card-body">
                <div class="form-group row">
                   <label for="org" class="col-sm-4 col-form-label">Organization Name:</label>
                   <div class="col-sm-8">
                     <input type="text" name='org' class="form-control" id="org" value="{{$data->org}}">
                   </div>
               </div>

               <div class="form-group row">
                  <label for="address" class="col-sm-4 col-form-label">Address:</label>
                  <div class="col-sm-8">
                    <input type="text" name='address' class="form-control" id="address" value="{{$data->address}}">
                  </div>
              </div>

              <div class="form-group row">
                 <label for="contact" class="col-sm-4 col-form-label">Contact:</label>
                 <div class="col-sm-8">
                   <input type="text" name='contact' class="form-control" id="contact" value="{{$data->contact}}">
                 </div>
             </div>

             <div class="form-group row">
                <label for="description" class="col-sm-4 col-form-label">Description:</label>
                <div class="col-sm-8">
                  <textarea name="description" rows="6" cols="76"></textarea>
                </div>
            </div>

            <!-- <div class="form-group row">
               <label for="start_date" class="col-sm-4 col-form-label">Start Date:</label>
               <div class="col-sm-4">
                 <input type="date" name='start_date' class="form-control" id="start_date">
               </div>
           </div>

           <div class="form-group row">
              <label for="end_date" class="col-sm-4 col-form-label">End Date:</label>
              <div class="col-sm-4">
                <input type="date" name='end_date' class="form-control" id="end_date">
              </div>
          </div> -->
          <div class="form-group row">
             <label for="duration" class="col-sm-4 col-form-label">Duration <span style='color:grey;'>(optional)</span></label>
             <div class="col-sm-4">
               <input type="number" name='duration' class="form-control" id="duration" placeholder="In days: eg 10">
             </div>
         </div>


          <div class="form-group row">
             <label for="amount" class="col-sm-4 col-form-label">Total Amount:</label>
             <div class="col-sm-4 d-flex">
               <input type="number" step=any name='amount' class="form-control" id="amount">
               <select class="selectpicker" data-dropup-auto=false name='country' >
                  <option value='PKR'>PKR</option>
                  <option value='USD'>USD</option>
                  <option value='EUR'>EUR</option>
                  <option value='GBP'>GBP</option>
                  <option value='JPY'>JPY</option>
                  <option value='CNY'>CNY</option>

              </select>

             </div>
         </div>

         <div class="form-group row">
            <label for="quantity" class="col-sm-4 col-form-label">Quantity <span style='color:grey;'>(optional)</span></label>
            <div class="col-sm-4">
              <input type="number" name='quantity' class="form-control" id="quantity">
            </div>
        </div>

        <div class="form-group row">
           <label for="terms" class="col-sm-4 col-form-label">Terms & Conditions:</label>
           <div class="col-sm-8">
             <textarea name="terms" rows="6" cols="76"></textarea>
           </div>
        </div>


          </div>
      </div>

      <div class="card">
          <div class="card-header"><h5>Items <span style='color:grey;'>(optional)</h5></span></div>
          <div class="card-body">
                <div class="table-responsive">

                  <span id="result"></span>
                  <table class="table table-bordered table-striped" id="user_table">
                <thead>
                 <tr>
                     <th width="35%">Item</th>
                     <th width="35%">Price</th>
                     <th width="30%">Action</th>
                 </tr>
                </thead>
                <tbody class='item'>

                </tbody>

            </table>

               </div>

          </div>
      </div>


            <div class="card">
                <div class="card-header"><h5>Timeline <span style='color:grey;'>(optional)</h5></span></div>
                <div class="card-body">
                      <div class="table-responsive">


                        <table class="table table-bordered table-striped" id="user_table1">
                      <thead>
                       <tr>
                           <th width="35%">Task</th>
                           <th width="35%">Date</th>
                           <th width="30%">Action</th>
                       </tr>
                      </thead>
                      <tbody class='time'>

                      </tbody>

                  </table>

                     </div>

                </div>
            </div>



    <div class="text-center py-5">
        <button type="submit" name="button" class='btn btn-primary btn-lg'>Submit</button>
    </div>

    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      var count = 1;

      dynamic_field(count);

      function dynamic_field(number)
      {
      html = '<tr>';
          html += '<td><input type="text" name="item[]" class="form-control" /></td>';
          html += '<td><input type="text" name="price[]" class="form-control" /></td>';
          if(number > 1)
          {
              html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
              $('.item').append(html);
          }
          else
          {
              html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
              $('.item').html(html);
          }
      }

      $(document).on('click', '#add', function(){
      count++;
      dynamic_field(count);
      });

      $(document).on('click', '.remove', function(){
      count--;
      $(this).closest("tr").remove();
      });

// Timeline



      });

      $(document).ready(function(){
        var count = 1;

        timeline(count);

        function timeline(number)
        {
        html = '<tr>';
            html += '<td><input type="text" name="task[]" class="form-control" /></td>';
            html += '<td><input type="date" name="date[]" class="form-control" /></td>';
            if(number > 1)
            {
                html += '<td><button type="button" name="remove1" id="" class="btn btn-danger remove1">Remove</button></td></tr>';
                $('.time').append(html);
            }
            else
            {
                html += '<td><button type="button" name="add1" id="add1" class="btn btn-success">Add</button></td></tr>';
                $('.time').html(html);
            }
        }

        $(document).on('click', '#add1', function(){
        count++;
        timeline(count);
        });

        $(document).on('click', '.remove1', function(){
        count--;
        $(this).closest("tr").remove();
        });


      });
  </script>
@endsection
