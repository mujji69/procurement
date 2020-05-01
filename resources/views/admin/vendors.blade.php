@extends('layouts.master')

@section('content')
@php $i = 0; @endphp
<div class="content-wrapper px-4" style='background-color:white;'>
  <table id='myTable' class='table table-bordered'>
    <thead>
      <tr>
        <th>No.</th>
        <th>Oraganization Name</th>
        <th>Services</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$data->org}}</td>
        <td>{{$data->service}}</td>
        <td><a href='{{route('vendorDetails',$data->id)}}' class='btn btn-primary' style='color:white;'>View</a> </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

@endsection
