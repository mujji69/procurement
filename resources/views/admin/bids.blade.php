@extends('layouts.master')


@section('content')

<div class="content-wrapper px-4" style="background-color:white;">
     <h3>Recommended</h3>

        <table class="table table-bordered" style='table-layout:fixed;overflow-wrap: break-word;'>

            <tr>
                <th>Organization Name</th>
                <th>Date</th>
                <th>Quotation</th>
                <th>Details</th>
                <th></th>

            </tr>

            <tr>
                <td>{{$recommended->users->org}}</td>
                <td>{{$recommended->created_at}}</td>
                <td class=''>@if($recommended->quotation != 'no')<a href="/storage/quotations/{{$recommended->quotation}}" target='_blank' download> <i class='fas fa-download fa-2x'></i></a>@else No document available @endif</td>

                <td>
                    <a class="btn btn-primary" href='{{route('information',$recommended->id)}}'>
                        view
                    </a>


                </td>
                <td>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#po">
                   <i class='fas fa-upload'></i> Send PO </button>
                   <div class="modal fade" id="po">
                     <div class="modal-dialog modal-dialog-centered ">
                       <div class="modal-content">

                         <!-- Modal Header -->
                         <div class="modal-header">


                           <h4 class="modal-title">upload purchase order</h4>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                         </div>

                         <form action="{{route('selected',$recommended->id)}}" class='' method='POST' enctype='multipart/form-data'>
                           @csrf
                         <!-- Modal body -->

                         <div class="modal-body">
                           <input type="" id='' name='tender_id' value = '{{$recommended->tender_id}}' hidden>

                           <input type="date" id='adate' name='adate' hidden>
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
<!-- end modal send PO -->

                </td>

            </tr>

        </table>


     <button id='clickme' class='btn btn-secondary'>View All</button>

    <div class='' >
        <table id="myTabl" class="table table-bordered" style='table-layout:fixed;overflow-wrap: break-word;display:none;'>
          <thead>
            <tr>
                <th>Organization Name</th>
                <th>Date</th>
                <th>Vendor Quotation</th>
                <th>Quotation Text</th>
                <th></th>

            </tr>
          </thead>

            @php $i=0; $n=0; @endphp
            <tbody>
              @foreach($datas as $data)

              <tr>
                  <td>{{$data->users->org}}</td>
                  <td>{{$data->created_at}}</td>


                  <td class=''>@if($data->quotation != 'no')<a href="/storage/quotations/{{$data->quotation}}" target='_blank' download> <i class='fas fa-download fa-2x'></i></a>@else No document available @endif</td>

                  <td>


                      <a class="btn btn-primary" href="{{route('information',$data->id)}}">
                          view
                      </a>


                  </td>
                  <td>
                    @php $n = $n + 1; @endphp
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#s{{$n}}">
                     <i class='fas fa-upload'></i> Send PO </button>
                     <div class="modal fade" id="s{{$n}}">
                       <div class="modal-dialog modal-dialog-centered ">
                         <div class="modal-content">

                           <!-- Modal Header -->
                           <div class="modal-header">


                             <h4 class="modal-title">upload purchase order</h4>
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>

                           <form action="{{route('selected',$data->id)}}" class='' method='POST' enctype='multipart/form-data'>
                             @csrf
                           <!-- Modal body -->

                           <div class="modal-body">
                             <input type="" id='' name='tender_id' value = '{{$data->tender_id}}' hidden>
                             <input type="date" id='bdate' name='adate' hidden>
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
<!-- end modal send PO -->

                  </td>

              </tr>
              @endforeach
            </tbody>

        </table>
    </div>

</div>

  <script>
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;

document.getElementById('adate').value= today;
document.getElementById('bdate').value= today;
console.log(today);

// table
    document.getElementById("clickme").addEventListener("click", function(button) {
   if (document.getElementById("myTabl").style.display === "none")
    	document.getElementById("myTabl").style.display = "";
   else document.getElementById("myTabl").style.display = "none";
});
  </script>
@endsection
