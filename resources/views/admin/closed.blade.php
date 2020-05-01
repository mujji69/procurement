
@extends('layouts.master')


@section('content')


<div class='content-wrapper' style='background-color:white;'>
    <div class='pt-4 px-4'>
    <h4 class='pb-4'>Closed Tenders</h4>
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
            <!-- <th>Status</th> -->
        </tr>
      </thead>

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

          </tr>
      @endfor

    </tbody>

    </table>

    </div>
</div>

@endsection
