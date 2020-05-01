@extends('layouts.master')


@section('content')

<div class="content-wrapper px-4" style='background-color:white;'>

        <table id='myTable' class="table table-bordered" style='table-layout:fixed;overflow-wrap: break-word;'>
            <thead>
              <tr>
                 <th>Organization Name</th>
                 <th>Tender_Name</th>
                 <th>Invoice Document</th>
                 <th>Status</th>
                 <th>Change Status</th>
             </tr>
            </thead>

            @php $n=0; @endphp
            <tbody>
              @foreach($datas as $data)
             <tr>
                 <td>{{$data->users->org}}</td>
                 <td>{{$data->tenders->name}}</td>
                 <td><a href="/storage/invoices/{{$data->invoice}}" target='_blank' download> <i class='fas fa-download fa-2x'></i></a></td>
                 <td>{{$data->tenders->status}}</td>
                 <td>
                     @php $n = $n + 1 ;  @endphp
                     <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#my{{$n}}' >change</button>

                         <!-- The Modal -->
                         <div class="modal fade" id="my{{$n}}">
                             <div class="modal-dialog modal-dialog-centered">
                             <div class="modal-content">

                                 <!-- Modal Header -->
                                 <div class="modal-header">


                                 <h4 class="modal-title">change the status</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 </div>

                                 <form action="{{route('changeStatus',$data->tender_id)}}" class='' method='POST' enctype='multipart/form-data'>
                                 @csrf
                                 <!-- Modal body -->

                                 <div class="modal-body">

                                     <div class="form-group row">
                                         <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                                         <div class="col-md-6">
                                             <select name="status" id="status" class='form-control'>
                                             <option></option>
                                             <option>Active</option>
                                             <option>Closed</option>
                                             <option>In-progress</option>


                                             </select>
                                         </div>
                                     </div>
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
                         <!-- end modal -->
                 </td>
             </tr>
         @endforeach

            </tbody>

    </table>
</div>


@endsection
