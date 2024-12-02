@php
    $category_name = 'contact';
    $page_name = 'agencys';
    $has_scrollspy = 0;
    $scrollspy_offset = '';
@endphp
@extends('layouts.app')
 
@section('content')

<br>
<hr>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h2 class="text-primary">Agency List</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-outline-primary btn-rounded mb-2" href="{{ route('agencylist.create') }}"> New Agency</a>
            </div>
            <br>
        </div>
    </div>

<div class="table-responsive">
    <table class="table table-bordered table-striped mb-4" id="hotels-table">
        {{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> --}}
        <thead>
            <tr>
                <th>.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agencys as $value)
            <tr>
                <td>-</td>
                <td>{{ $value->Agency_Name }}</td>
                <td>{{ $value->Email }}</td>
                <td>{{ $value->Phone }}</td>
                <td>{{ $value->Billing_Country }}</td>
                <td>{{ $value->Contact_Type }}</td>
    
                <td>
                    <a class="btn btn-outline-primary mb-2" href="{{ route('agencylist.edit',$value["id"]) }}">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                            <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
                    </a> 
              </td>
            </tr>
            @endforeach
                
    </tbody>
</table>
</div>

      
@endsection

  {{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}
