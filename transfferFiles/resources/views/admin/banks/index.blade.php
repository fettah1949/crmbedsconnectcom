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

<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
<br>
<hr>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h2 class="text-primary">Bank List</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-outline-primary btn-rounded mb-2" href="{{ route('banks.create') }}"> New Bank</a>
            </div>
            <br>
        </div>
    </div>
  
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif

        <div class="widget-content widget-content-area br-6">
                <table class="table table-striped" style="width:100%" id="bank-table1">
        {{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> --}}
        <thead>
        <tr>
            <th>.</th>
            <th>Nom_du_compte</th>
            <th>Code_du_compte</th>
            <th>Nom_de_la_banque</th>
            <th>Numero_de_compte</th>
            <th>SWIFT </th>
            <th>Balance</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($banks as $value)
        <tr>
            <td>-</td>
            <td>{{ $value->Nom_du_compte }}</td>
            <td>{{ $value->Code_du_compte }}</td>
            <td>{{ $value->Nom_de_la_banque }}</td>
            <td>{{ $value->Numero_de_compte }}</td>
            <td>{{ $value->SWIFT }}</td>
            <td>{{ $value->Balance }}  {{ $value->Devise }}</td>
            <td>{{ $value->Description }}</td>
            <td>
                <div class="dropdown custom-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
                        <a class="dropdown-item" href="{{ route('bank_transactions',$value["id"]) }}">Transactions</a>
                        <a class="dropdown-item" href="{{ route('new_transactions',['bank_id'=>$value["id"],'type'=>$transaction]) }}">New Transaction</a>
                        <a class="dropdown-item" href="{{ route('new_transactions',['bank_id'=>$value["id"],'type'=>$transfer]) }}">New Transfer</a>
                        <a class="dropdown-item" href="{{ route('banks.edit',$value["id"]) }}">Edit Bank</a>
                    </div>
                </div>
            </td>
{{--             
            <td>

                    <a class="btn btn-outline-primary mb-2" href="{{ route('banks.edit',$value["id"]) }}">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                            <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
                    </a>
                </td>
                <td>
                    <a class="btn btn-outline-primary mb-2" href="{{ route('bank_transactions',$value["id"]) }}">Enter</a>              
                </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>

      
@endsection

  