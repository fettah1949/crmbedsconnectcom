@php
use App\Models\Hotellist;
$hotels = Hotellist::all();


use App\Models\Room;
$rooms = Room::all();


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

@if ( $ht === '1')
<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('hotelrooms.index') }}">All Rooms List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Add New Room To</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('hotellist.show',$HotelCode) }}">{{ $HotelName }} : {{ $HotelCode }}</a></li>
    </ol>
</nav>
@endif

@if ( $ht === '2')
<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('hotelrooms.index') }}">Rooms List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Add New Room</a></li>
    </ol>
</nav>

@endif

 
<hr>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('hotelrooms.store') }}" method="POST">
    @csrf
  

    
    @if ( $ht === '1')

    <div class="row">
                        
        <div class="form-group col-sm-auto">
            <label for="Room_Id">Room Id</label>
            <input class="form-control" type="text" list="select-room-id" id="Room_Id" name="Room_Id" placeholder="Select Room Id" onkeyup='setRoomName();'>
            <datalist  id="select-room-id">
            <option value="">Select Room ID</option>
             @foreach ($rooms as $room)
                 <input type=hidden  id="{{ $room->Room_Id }}" value="{{ $room->Room_Name }}" />
                 <option value="{{ $room->Room_Id }}">{{ $room->Room_Id }}</option>
             @endforeach
            </datalist>
            @error('Room_Id') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
                    
        <div class="form-group col-sm-auto">
            <label for="Room_Name">Room Name</label>
            <input class="form-control" type="text" list="select-room" id="Room_Name" name="Room_Name" placeholder="Select Room Name" onkeyup='setRoomId();'>
            <datalist  id="select-room">
            <option value="">Select Room Name</option>
             @foreach ($rooms as $room)
                 <input type=hidden  id="{{ $room->Room_Name }}" value="{{ $room->Room_Id }}" />
                 <option value="{{ $room->Room_Name }}">{{ $room->Room_Name }}</option>
             @endforeach
            </datalist>
            @error('Room_Name') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
            
            <div class="form-group col-sm-auto">
                <input class="form-control" type="hidden" name="Hotel_Name" value="{{ $HotelName }}">
            </div>
       
            
            <div class="form-group col-sm-auto">
                <input class="form-control" type="hidden"  name="Hotel_Code" value="{{ $HotelCode }}">
            </div>
       
    </div>
    {{-- end row --}}
    <hr>

    @endif

    @if ( $ht === '2')

    
        <div class="row">
                        
            <div class="form-group col-sm-auto">
                <label for="Room_Id">Room Id</label>
                <input class="form-control" type="text" list="select-room-id" id="Room_Id" name="Room_Id" placeholder="Select Room Id" onkeyup='setRoomName();'>
                <datalist  id="select-room-id">
                <option value="">Select Room ID</option>
                 @foreach ($rooms as $room)
                     <input type=hidden  id="{{ $room->Room_Id }}" value="{{ $room->Room_Name }}" />
                     <option value="{{ $room->Room_Id }}">{{ $room->Room_Id }}</option>
                 @endforeach
                </datalist>
                @error('Room_Id') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
                        
            <div class="form-group col-sm-auto">
                <label for="Room_Name">Room Name</label>
                <input class="form-control" type="text" list="select-room" id="Room_Name" name="Room_Name" placeholder="Select Room Name" onkeyup='setRoomId();'>
                <datalist  id="select-room">
                <option value="">Select Room Name</option>
                 @foreach ($rooms as $room)
                     <input type=hidden  id="{{ $room->Room_Name }}" value="{{ $room->Room_Id }}" />
                     <option value="{{ $room->Room_Name }}">{{ $room->Room_Name }}</option>
                 @endforeach
                </datalist>
                @error('Room_Name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
                
                <div class="form-group col-sm-auto">
                    <label for="Hotel_Name">Hotel Name</label>
                    <input class="form-control" type="text" list="select-hotel" id="Hotel_Name" name="Hotel_Name" placeholder="Select Hotel" onkeyup='setHotelCode();'>
                    <datalist  id="select-hotel">
                    <option value="">Select Hotel</option>
                     @foreach ($hotels as $hotel)
                         <input type=hidden  id="{{ $hotel->Hotel_Name }}" value="{{ $hotel->Hotel_Code }}" />
                         <option value="{{ $hotel->Hotel_Name }}">{{ $hotel->Hotel_Name }}</option>
                     @endforeach
                    </datalist>
                    @error('Hotel_Name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
           
                
                <div class="form-group col-sm-auto">
                    <label for="Hotel_Code">Hotel Code</label>
                    <input class="form-control" type="text" list="select-hotel-code" id="Hotel_Code" name="Hotel_Code" placeholder="Select Hotel Code" onkeyup='setHotelName();'>
                    <datalist  id="select-hotel-code">
                    <option value="">Select Hotel</option>
                     @foreach ($hotels as $hotel)
                         <input type=hidden  id="{{ $hotel->Hotel_Code }}" value="{{ $hotel->Hotel_Name }}" />
                         <option value="{{ $hotel->Hotel_Code }}">{{ $hotel->Hotel_Code }}</option>
                     @endforeach
                    </datalist>
                    @error('Hotel_Code') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
           
        </div>
        {{-- end row --}}
        <hr>
    @endif



                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-outline-success mb-2">Save</button>
                    <button style="margin-left: 20px" type="reset" class="btn btn-outline-danger mb-2">Clear</button>
                
                </div>
</form>
<script>
    function setHotelCode(){
          var h_code = document.getElementById("Hotel_Name").value;
      document.getElementById("Hotel_Code").value = document.getElementById(h_code).value ;      
      }
      
      
      function setHotelName(){
            var h_name = document.getElementById("Hotel_Code").value;
        document.getElementById("Hotel_Name").value = document.getElementById(h_name).value ;      
        }
        
    function setRoomName(){
          var r_code = document.getElementById("Room_Id").value;
      document.getElementById("Room_Name").value = document.getElementById(r_code).value ;      
      }
      
      
      function setRoomId(){
            var r_name = document.getElementById("Room_Name").value;
        document.getElementById("Room_Id").value = document.getElementById(r_name).value ;      
        }
        
</script>
@endsection

{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}
