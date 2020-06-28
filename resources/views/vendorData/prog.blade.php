<table id='myTable1' class="table table-bordered">
<thead>
  <tr>

    <th>Tender Id</th>
    <th>Tender Name</th>
    <th>Awarded Date</th>
    <th>Deadline</th>
    <th>Category</th>
    <th>Tender Document</th>
    <th>Vendor Quotation</th>
    <th>Send Invoice</th>
    <th>Invoice Details</th>


  </tr>
</thead>
  @php $m = 0 ; @endphp
   @php $count = count($datas_progress); $n = 0; @endphp
   <tbody>
     @for($i=0;$i < $count;$i++)
      <tr>
        <td>{{$datas_progress[$i]->tender_id}}</td>
        <td>{{$datas_progress[$i]->tender_name}}</td>
        <td>{{$datas_progress[$i]->award_date}}</td>
        <td>11-28-2019</td>
        <td>{{$datas_progress[$i]->category}}</td>
        <td><a href="/storage/tenders/{{$datas_progress[$i]->document}}" target='_blank'><i class='fas fa-download fa-2x'></i></a></td>
        <td><a href="/storage/quotations/{{$datas_progress[$i]->quotation}}"><i class='fas fa-download fa-2x'></i></a></td>
        <td>
          @php $n = $n + 1 ; @endphp

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#my{{$m}}">
             send </button>

             <!-- modal -->
                       <div class="modal fade" id="my{{$m}}">
                       <div class="modal-dialog modal-dialog-centered">
                       <div class="modal-content">

                       <!-- Modal Header -->
                       <div class="modal-header">


                       <h4 class="modal-title">Invoice Details</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       </div>

                       <form action="{{route('invoice',$datas_progress[$i]->tender_id)}}" class='' method='POST' enctype='multipart/form-data'>
                       @csrf
                       <!-- Modal body -->

                       <div class="modal-body">

                       <input id='invoice' type="file" name='invoice'>
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

        <td>  <a href="{{route('view',$datas_progress[$i]->tender_id)}}" class='btn btn-primary'>view</a> </td>
      </tr>

    @endfor

   </tbody>

</table>
