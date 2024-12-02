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
                 <th>ZohoID</th>
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
                <td>{{ $value->	ZohoID }}</td>
    
                <td>
                    {{-- <a class="btn btn-outline-primary mb-2" href="{{ route('agencylist.edit',$value["id"]) }}">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                            <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
                    </a>  --}}
                    <a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#edit_agency-{{$value->id}}" target="_blank">
                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                            <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
                    </a> 
                    <a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#deleteModalCenter_agency{{$value->id}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </a> 
              </td>
            </tr>
            @include('admin.agencys.pop_up.pop_up_edit_agency',['ZohoID'=>$value->ZohoID,'ZIP_code'=>$value->ZIP_code,'Contact_Type'=>$value->Contact_Type,'Billing_Country'=>$value->Billing_Country,'countries'=>$countries,'id'=>$value->id,'Agency_ID'=>$value->Agency_ID,'Agency_Name'=>$value->Agency_Name,'First_Name'=>$value->First_Name,'Last_Name'=>$value->Last_Name,'Email'=> $value->Email,'Email2'=>$value->Email2,'Phone'=>$value->Phone,'Mobile'=> $value->Mobile,'Emergency_Phone'=>$value->Emergency_Phone,'First_Name_1'=>$value->First_Name_1,'Last_Name_1'=>$value->Last_Name_1,'Email_1'=> $value->Email_1,'Email2_1'=>$value->Email2_1,'Phone_1'=>$value->Phone_1,'Mobile_1'=> $value->Mobile_1])
            @include('admin.agencys.pop_up.pop_up_delete_agency',['id'=>$value->id,'Agency_Name'=>$value->Agency_Name])

            @endforeach
                
    </tbody>
</table>
</div>

      
@endsection

  {{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}
