@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="px-4 pt-4">
      <div class="card">
          <div class="card-body">
                <div class="form-group row">
                   <label for="org" class="col-sm-4 col-form-label">Organization Name:</label>
                   <div class="col-sm-8">
                     <input type="text" name='org' class="form-control" id="org" value="{{$data->org_name}}" readonly>
                   </div>
               </div>

               <div class="form-group row">
                  <label for="address" class="col-sm-4 col-form-label">Address:</label>
                  <div class="col-sm-8">
                    <input type="text" name='address' class="form-control" id="address" value="{{$data->address}}" readonly>
                  </div>
              </div>

              <div class="form-group row">
                 <label for="contact" class="col-sm-4 col-form-label">Contact:</label>
                 <div class="col-sm-8">
                   <input type="text" name='contact' class="form-control" id="contact" value="{{$data->phone}}" readonly>
                 </div>
             </div>

             <div class="form-group row">
                <label for="description" class="col-sm-4 col-form-label">Description:</label>
                <div class="col-sm-8">
                  <textarea name="description" rows="6" cols="76" readonly>{{$data->proposal}}</textarea>
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
          @if($data->duration != null)
          <div class="form-group row">
             <label for="duration" class="col-sm-4 col-form-label">Duration <span style='color:grey;'>(optional)</span></label>
             <div class="col-sm-4">
               <input type="number" name='duration' class="form-control" id="duration" value='{{$data->duration}}' placeholder="In days: eg 10" readonly>
             </div>
         </div>
         @endif


          <div class="form-group row">
             <label for="amount" class="col-sm-4 col-form-label">Total Amount:</label>
             <div class="col-sm-4 d-flex">
               <input type="number" step=any name='amount' class="form-control" id="amount" value='{{$data->price}}' readonly>
               <div class='form-control col-md-2'>{{$data->country}}</div>

             </div>
         </div>

         @if($data->quantity != null)
         <div class="form-group row">
            <label for="quantity" class="col-sm-4 col-form-label">Quantity <span style='color:grey;'>(optional)</span></label>
            <div class="col-sm-4">
              <input type="number" name='quantity' class="form-control" id="quantity" value='{{$data->quantity}}' readonly>
            </div>
        </div>
        @endif
        <div class="form-group row">
           <label for="terms" class="col-sm-4 col-form-label">Terms & Conditions:</label>
           <div class="col-sm-8">
             <textarea name="terms" rows="6" cols="76" readonly>{{$data->terms}}</textarea>
           </div>
        </div>


          </div>
    </div>
    @if($items->toArray() != null)
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

               </tr>
              </thead>
              <tbody class='item'>
                @foreach($items as $item)
                <tr>
                  <td>{{$item->item}}</td>
                  <td>{{$item->price}}</td>
                </tr>
                @endforeach
              </tbody>

          </table>

             </div>

        </div>
    </div>
    @endif

          @if($timelines->toArray() != null)
          <div class="card">
              <div class="card-header"><h5>Timeline <span style='color:grey;'>(optional)</h5></span></div>
              <div class="card-body">
                    <div class="table-responsive">


                      <table class="table table-bordered table-striped" id="user_table1">
                    <thead>
                     <tr>
                         <th width="35%">Task</th>
                         <th width="35%">Date</th>

                     </tr>
                    </thead>
                    <tbody class='time'>
                      @foreach($timelines as $timeline)
                      <tr>
                        <td>{{$timeline->task}}</td>
                        <td>{{$timeline->date}}</td>
                      </tr>
                      @endforeach
                    </tbody>

                </table>

                   </div>

              </div>
          </div>
          @endif

  </div>
</div>
@endsection
