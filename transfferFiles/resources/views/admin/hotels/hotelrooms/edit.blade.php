@php
use App\Models\Hotellist;
$hotels = Hotellist::all();


    $category_name = 'production';
    $page_name = 'hotel_room_list';
    $has_scrollspy = 0;
    $scrollspy_offset = '';

@endphp

@extends('layouts.app')
   
@section('content')

<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('hotelrooms.index') }}">Room List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Edit Room: {{ $rooms->Room_Name }}</a></li>
    </ol>
</nav>
 
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
 
        
    <form action="{{ route('hotelrooms.update',$rooms->id) }}" method="POST" >
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="form-group col-sm-auto">
                <label for="Room_Id">Room Id</label>
                <input type="text" class="form-control" id="Room_Id" placeholder="Room Id" name="Room_Id" value="{{ $rooms->Room_Id }}">
                @error('Room_Id') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            
                <div class="form-group col-sm-auto">
                    <label for="Room_Name">Room Name</label>
                    <input type="text" class="form-control" id="Room_Name" name="Room_Name" placeholder="Room Name" value="{{ $rooms->Room_Name }}">
                    @error('Room_Name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            
    
                
                <div class="form-group col-sm-auto">
                    <label for="Hotel_Name">Hotel Name</label>
                    <input class="form-control" type="text" list="select-hotel" id="Hotel_Name" name="Hotel_Name" placeholder="Select Hotel" onkeyup='setHotelCode();' value="{{ $rooms->Hotel_Name }}">
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
                    <input class="form-control" type="text" list="select-hotel-code" id="Hotel_Code" name="Hotel_Code" placeholder="Select Hotel Code" onkeyup='setHotelName();' value="{{ $rooms->Hotel_Code }}">
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
    

    

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-outline-success mb-2">Update</button>
            <a style="margin-left: 10px" href="{{ route('hotelrooms.index') }}" class="btn btn-outline-dark mb-2">Cancel</a>
          </div>
 
      </form>
      <hr>
      <script>
        function setHotelCode(){
              var h_code = document.getElementById("Hotel_Name").value;
          document.getElementById("Hotel_Code").value = document.getElementById(h_code).value ;      
          }
          
          
          function setHotelName(){
                var h_name = document.getElementById("Hotel_Code").value;
            document.getElementById("Hotel_Name").value = document.getElementById(h_name).value ;      
            }
            
    </script>
    @endsection


{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}