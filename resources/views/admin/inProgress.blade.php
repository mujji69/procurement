
@extends('layouts.master')


@section('content')


<div class='content-wrapper' style='background-color:white;'>
    <div class='pt-4 px-4'>
    <h4 class='pb-4'>In-Progress Tenders</h4>
    <table id='myTable' class="table table-bordered" style='table-layout:fixed;overflow-wrap: break-word;'>
    <thead>
      <tr>

          <th>Oraganization Name</th>
          <th>Tender Name</th>
          <th>Awarded Date</th>
          <th>Deadline</th>
          <th>Category</th>
          <th>Tender Document</th>
          <th>Vendor Quotation</th>
          <th>Change Status</th>
          <!-- <th>Status</th> -->
      </tr>
    </thead>
    @php $n = 0; @endphp
    @php $count = count($datas); @endphp
    <tbody>
      @for($i=0;$i < $count;$i++)
          <tr>
          <td>{{$datas[$i]->org}}</td>
          <td>{{$datas[$i]->tender_name}}</td>
          <td>{{$datas[$i]->award_date}}</td>
          <td>11-28-2019</td>
          <td>{{$datas[$i]->category}}</td>
          <td><a href="/storage/tenders/{{$datas[$i]->document}}" target='_blank'><i class='fas fa-download fa-2x'></i></a></td>
          <td><a href="/storage/quotations/{{$datas[$i]->quotation}}"><i class='fas fa-download fa-2x'></i></a></td>
          <!-- <td>{{$datas[$i]->status}}</td> -->
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

                      <form action="{{route('changeStatusTender',$datas[$i]->tender_id)}}" class='' method='POST' enctype='multipart/form-data'>
                      @csrf
                      <!-- Modal body -->

                      <div class="modal-body">

                          <div class="form-group row">
                              <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                              <div class="col-md-6">
                                  <select name="status" id="status" class='form-control'>

                                  <option>In-progress</option>
                                  <option>Closed</option>



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
      @endfor

    </tbody>

    </table>

    </div>
</div>

@endsection
