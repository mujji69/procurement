
@extends('layouts.master')


@section('content')


<div class='content-wrapper'>
    <div class='pt-4 px-4'>
    <table class="table table-bordered" style='table-layout:fixed;overflow-wrap: break-word;'>
    
    <tr>

        <th>Oraganization Name</th>
        <th>Tender Name</th>
        <th>Awarded Date</th>
        <th>Deadline</th>
        <th>Category</th>
        <th>Tender Doc</th>
        <th>Quotation</th>
        <th>Status</th>
         
    @php $count = count($datas); @endphp

    @for($i=0;$i < $count;$i++)
        <tr>
        <td>{{$datas[$i]->org}}</td>
        <td>{{$datas[$i]->tender_name}}</td>
        <td>{{$datas[$i]->award_date}}</td>
        <td>11-28-2019</td>
        <td>{{$datas[$i]->category}}</td>
        <td><a href="/storage/tenders/{{$datas[$i]->document}}" target='_blank'>document</a></td>
        <td><a href="/storage/quotations/{{$datas[$i]->quotation}}">quotation</a></td>
        <td>{{$datas[$i]->status}}</td>
        
        </tr>  
    @endfor 
    
    </table>
        
    </div>    
</div>

@endsection