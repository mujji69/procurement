@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container pt-4 px-4">
      <h3 class='pb-5' style='font-weight:bold;'>INVOICE DETAILS</h3>
      <table class="table table-bordered">
          <thead>
            <tr>
              <th>Invoice</th>
              <th>Status</th>

            </tr>
          </thead>
          @php $count = count($datas) ;   @endphp
          <tbody>
            @for($i=0;$i<$count;$i++)
            <tr>

              <td><a class='' href="/storage/invoices/{{$datas[$i]->invoice}}" target='_blank'><i class='fas fa-download fa-2x'></i></a></td>
              <td>{{$datas[$i]->status}}</td>

            </tr>
            @endfor
          </tbody>
        </table>
    </div>
</div>

@endsection
