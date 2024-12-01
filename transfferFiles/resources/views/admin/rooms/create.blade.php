@php
use App\Models\Hotellist;
$hotels = Hotellist::all();


    $category_name = 'production';
    $page_name = 'rooms_list';
    $has_scrollspy = 0;
    $scrollspy_offset = '';
@endphp
@extends('layouts.app')
  
@section('content')
<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('rooms.index') }}">Rooms List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Add New Room</a></li>
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
   
<form action="{{ route('rooms.store') }}" method="POST">
    @csrf
  
    <div class="row">
        <div class="form-group col-sm-auto">
            <label for="Room_Id">Room Id</label>
            <input type="text" class="form-control" id="Room_Id" placeholder="Room Id" name="Room_Id">
            @error('Room_Id') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        
            <div class="form-group col-sm-auto">
                <label for="Room_Name">Room Name</label>
                <input type="text" class="form-control" id="Room_Name" name="Room_Name" placeholder="Room Name">
                @error('Room_Name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        

       
    </div>
    {{-- end row --}}
    <hr>



                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-outline-success mb-2">Save</button>
                    <button style="margin-left: 20px" type="reset" class="btn btn-outline-danger mb-2">Clear</button>
                
                </div>
</form>
@endsection

{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}
