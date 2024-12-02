@php
use App\Models\Country;
$countries = Country::all();

use App\Models\Agencycontact;
$sellers = Agencycontact::where('Contact_Type','SELLER')->get();
//dd($sellers);

    $category_name = 'production';
    $page_name = 'hotel_list';
    $has_scrollspy = 0;
    $scrollspy_offset = '';
@endphp
@extends('layouts.app')
  
@section('content')
<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('hotellist.index') }}">Hotel List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Add New Hotel</a></li>
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
   
<form action="{{ route('hotellist.store') }}" method="POST">
    @csrf
  
    <div class="row">
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Hotel Code</label>
            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Hotel Code" name="Hotel_Code">
            @error('Hotel_Code') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">bdc_id</label>
                <input type="text" class="form-control" id="exampleFormControlInput" name="bdc_id" placeholder="bdc_id">
                @error('bdc_id') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Giata id</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Giata_id" placeholder="Giata id">
            @error('Giata_id') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Seller id</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="provider_id" placeholder="Seller id">
            @error('provider_id') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    {{-- end row --}}
    <hr>


    <div class="row">
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Hotel Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Hotel_Name" placeholder="Hotel Name">
            @error('Hotel_Name') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Latitude</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Latitude" placeholder="Latitude">
            @error('Latitude') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Longitude</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Longitude" placeholder="Longitude">
            @error('Longitude') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Address</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Address" placeholder="Address">
            @error('Address') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    {{-- end row --}}
    <hr>


    <div class="row">
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">City</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="City" placeholder="City">
            @error('City') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Zip Code</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Zip_Code" placeholder="Zip Code">
            @error('Zip_Code') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Email</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Email" placeholder="Email">
            @error('Email') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Country</label>
            <input class="form-control" type="text" list="select-contry" id="Country" name="Country" placeholder="Select Country" onkeyup='setCountryCode();'>
            <datalist  id="select-contry">
            <option value="">Select Country</option>
             @foreach ($countries as $country)
                 <input type=hidden  id="{{ $country->nom_en_gb }}" value="{{ $country->alpha2 }}" />
                 <option value="{{ $country->nom_en_gb }}">{{ $country->nom_en_gb }}</option>
             @endforeach
            </datalist>
            @error('Country') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    {{-- end row --}}
    <hr>


    <div class="row">
        <div class="form-group col-sm-auto">
            <label >Country Code</label>
            <input type="text" class="form-control" id="Country_Code" name="Country_Code" placeholder="Country Code">
            @error('Country_Code') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Seller</label>
            <input class="form-control" type="text" placeholder="Select Seller" list="select-seller" name="provider" >
            <datalist id="select-seller">
            <option value="">Select Seller</option>
             @foreach ($sellers as $seller)
                 <option value="{{ $seller->Agency_Name }}">{{ $seller->Agency_Name }}</option>
             @endforeach
            </datalist>
            @error('provider') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>
    {{-- end row --}}
    <hr>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-outline-success mb-2">Save</button>
                    <button style="margin-left: 20px" type="reset" class="btn btn-outline-danger mb-2">Clear</button>
                
                </div>
</form>
<script>
      function setCountryCode(){
            var c_code = document.getElementById("Country").value;
        document.getElementById("Country_Code").value = document.getElementById(c_code).value ;      
        }
</script>
@endsection

{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}
