@extends('layouts.dashboard')

@section('content')

<!-- @include('user.profile') -->
<div class="content-wrapper">

<div class="px-4 pt-4">
  <table id='myTable' class="table table-bordered" style='table-layout:fixed;overflow-wrap: break-word;'>
        <thead>
            <tr>
                <th>Tender_Id</th>
                <th>Tender_Name</th>
                <th>Vendor Quotation</th>
            </tr>
        </thead>
        <tbody>
        @foreach($datas as $data)
            <tr>
                <td>{{$data->tender_id}}</td>
                <td>{{$data->tenders->name}}</td>
                <td><a href="/storage/quotations/{{$data->quotation}}" target='_blank' download><i class='fas fa-download fa-2x'></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection
