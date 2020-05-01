<table id='myTable' class="table table-bordered">
  <thead>
    <tr>

      <th>Tender Id</th>
      <th>Tender Name</th>
      <th>Awarded Date</th>
      <th>Deadline</th>
      <th>Category</th>
      <th>Tender Document</th>
      <th>Vendor Quotation</th>

    </tr>
  </thead>

     @php $count = count($datas_complete);  @endphp
     <tbody>
       @for($i=0;$i < $count;$i++)
        <tr>
          <td>{{$datas_complete[$i]->tender_id}}</td>
          <td>{{$datas_complete[$i]->tender_name}}</td>
          <td>{{$datas_complete[$i]->award_date}}</td>
          <td>11-28-2019</td>
          <td>{{$datas_complete[$i]->category}}</td>
          <td><a href="/storage/tenders/{{$datas_complete[$i]->document}}" target='_blank'><i class='fas fa-download fa-2x'></i></a></td>
          <td><a href="/storage/quotations/{{$datas_complete[$i]->quotation}}"><i class='fas fa-download fa-2x'></i></a></td>



        </tr>

      @endfor

     </tbody>

</table>
