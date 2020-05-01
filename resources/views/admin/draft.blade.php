@extends('layouts.master')

@section('content')

<div class='content-wrapper' style='background-color:white;'>
@php $t = 0; @endphp
  <div class="pt-4 px-4">
    <table class='table table-bordered' id='myTable'>
        <thead>
            <tr>
                <th>No.</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{++$t}}</td>
                <td><a href="{{route('admin.tender.edit',$data->id)}}">{{$data->name}}</a> </td>


            </tr>
            @endforeach
        </tbody>
    </table>
  </div>


</div>

@endsection
