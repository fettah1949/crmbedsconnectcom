@php
    $category_name = 'production';
    $page_name = 'hotel_room_list';
    $has_scrollspy = 0;
    $scrollspy_offset = '';


    if( isset( $hotel ) ) {
       $HotelName = $hotel->Hotel_Name;
       $HotelCode = $hotel->Hotel_Code;
       $ht='1';
        }else {
        $HotelName = "";
        $HotelCode = "";
        $ht='2';

    }
@endphp
@extends('layouts.app')
@section('content')

<br>
<hr>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if ( $ht === '1')
            <div class="pull-left text-center">
                <h2 class="text-primary"><span style="padding-left:20px;padding-right:20px" class="btn-outline-primary">{{ $HotelName }} : {{ $HotelCode }}</span> Room List</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-outline-primary btn-rounded mb-2" href="{{ route('createH',$HotelCode) }}">Add Room</a>
            </div>
            <br>
            @endif
           
           
            @if ( $ht === '2')
            <div class="pull-left text-center">
                <h2 class="text-primary"></span> Room List</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-outline-primary btn-rounded mb-2" href="{{ route('hotelrooms.create') }}">New Room</a>
            </div>
            <br>
            @endif
         
        </div>
    </div>

<div class="table-responsive">
    <table class="table table-bordered table-striped mb-4" id="hotels-table">
        {{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> --}}
        <thead>
        <tr>
            <th>.</th>
            <th>Room Id</th>
            <th>Room Name</th>
            <th>Hotel Name</th>
            <th>Hotel Code</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $value)
        <tr>
            <td>-</td>
            <td>{{ $value->Room_Id }}</td>
            <td>{{ $value->Room_Name }}</td>
            <td>{{ $value->Hotel_Name }}</td>
            <td>{{ $value->Hotel_Code }}</td>
            <td>
                    <a class="btn btn-outline-primary mb-2" href="{{ route('hotelrooms.edit',$value["id"]) }}">
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

  