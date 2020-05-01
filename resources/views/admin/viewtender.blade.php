@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style='background-color:white;'>
@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Active Tenders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Tenders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @php $i=0; @endphp

    <div class="content">
      <div class="container-fluid">
      <table id='myTable' class="table table-bordered" style='table-layout:fixed;overflow-wrap: break-word;'>
  <thead>
    <tr>
      <th width='50px'>No</th>
      <th width=''>Tender Name</th>
      <th width=''>Tender Description</th>
      <th>Publishing Date</th>
      <th>Closing Date</th>
      <th>Category</th>
      <th>Tender Document</th>
      <th>Responses</th>
      <th>Action</th>
    </tr>
  </thead>
  @php $n=0; @endphp
 <tbody>
   @foreach ($datas as $data)
     <tr>
       <td><b>{{++$i}}.</b></td>
       <td><a href="{{route('admin.bids',$data->id)}}">{{$data->name}}</a></td>
       <td>
       @php $n = $n + 1 ; @endphp

           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#my{{$n}}">
               view
           </button>

                           <!-- The Modal -->
           <div class="modal fade" id="my{{$n}}">
               <div class="modal-dialog modal-lg modal-dialog-centered">
               <div class="modal-content">

                   <!-- Modal Header -->
                   <div class="modal-header">
                   <h4 class="modal-title">Description</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>

                   <!-- Modal body -->
                   <div class="modal-body">
                   {{$data->description}}
                   </div>

                   <!-- Modal footer -->
                   <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   </div>

               </div>
               </div>
           </div>
           <!-- Modal End -->
       </td>
       <td>{{$data->publishing_date}}</td>
       <td>{{$data->closing_date}}</td>
       <td>{{$data->category}}</td>
       <td class=''>@if($data->document != 'no')<a href="/storage/tenders/{{$data->document}}" target='_blank' download> <i class='fas fa-download fa-2x'></i></a>@else No document available @endif</td>
       <td>{{$data->responses}} <a href="{{route('admin.bids',$data->id)}}" class='btn btn-sm btn-primary float-right' style='color:white;'>View</a> </td>
       <td>
       <form action="{{ route('admin.tender.destroy', $data->id) }}" method="post">

               <a class="btn btn-sm btn-warning" href="{{route('admin.tender.edit',$data->id)}}">Edit</a>
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-sm btn-danger">Delete</button>
             </form>
       </td>

     </tr>
   @endforeach
 </tbody>


</table>




      </div>
    </div>

    
  </div>


@endsection
