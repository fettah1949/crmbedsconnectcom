@php
    $category_name = 'finance';
    $page_name = 'banks';
    $has_scrollspy = 0;
    $scrollspy_offset = '';


$transaction = 'TRANSACTION';
$transfer = 'TRANSFER';
@endphp
@extends('layouts.app')
@section('content')

<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('banks.index') }}">Bank List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Transactions of All Bank </a></li>
    </ol>
</nav>
 
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}  
</div>
@endif

<hr>

<div class="table-responsive">
    <table class="table table-striped mb-4" id="hotels-table">

        <thead>
        <tr>
            <th>.</th>
            <th>Date</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Payee</th>
            <th>Description </th>
            <th>Reference_Number</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $value)
        
        <tr>

            @if (  $value->Debit  > 0)
            <td style="background: rgba(255, 0, 0, 0.034)">-</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Date }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Debit }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Credit }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Payee }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Description }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Reference_Number }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Type }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">


                
                <a  href="{{ route('bank_transactions',$value["Bank_id"]) }}"   target="_blank"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>

            </td>

            @elseif (  $value->Credit  > 0)
            <td style="background: rgba(9, 255, 0, 0.034)">-</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Date }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Debit }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Credit }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Payee }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Description }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Reference_Number }}</td>  
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Type }}</td>
    
            <td style="background: rgba(9, 255, 0, 0.034)">

                <a  href="{{ route('bank_transactions',$value["Bank_id"]) }}"   target="_blank"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>

                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
<br>


</div>

      
@endsection

  