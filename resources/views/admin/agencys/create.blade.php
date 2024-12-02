@php
use App\Models\Country;
$countries = Country::all();

    $category_name = 'contact';
    $page_name = 'agencys';
    $has_scrollspy = 0;
    $scrollspy_offset = '';
@endphp
@extends('layouts.app')
  
@section('content')
<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('agencylist.index') }}">Agency List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Add New Agency</a></li>
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
   
<form action="{{ route('agencylist.store') }}" method="POST">
    @csrf
  
    <form>
        {{-- <input type="reset" value="Reset"> --}}
    
{{-- row --}}
{{-- <div class="row">
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Agency ID</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Agency ID" name="Agency_ID">
        @error('Agency_ID') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">VAT ID</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="VAT ID" name="VAT_ID">
        @error('VAT_ID') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Agency Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Agency Name" name="Agency_Name">
        @error('Agency_Name') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">First Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="First Name" name="First_Name">
        @error('First_Name') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
</div>
<hr> --}}

{{-- end row --}}

{{-- row --}}
{{-- <div class="row">
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Last Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Last Name" name="Last_Name">
        @error('Last_Name') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Email</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email" name="Email">
        @error('Email') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Email2</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email2" name="Email2">
        @error('Email2') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Email3</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email3" name="Email3">
        @error('Email3') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
</div>
<hr> --}}
{{-- end row --}}
     

{{-- row --}}
{{-- <div class="row">
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Phone</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Phone" name="Phone">
        @error('Phone') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Mobile</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Mobile" name="Mobile">
        @error('Mobile') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Emergency Phone</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Emergency Phone" name="Emergency_Phone">
        @error('Emergency_Phone') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Payment Terms</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Payment Terms" name="Payment_Terms">
        @error('Payment_Terms') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
</div>
<hr> --}}
{{-- end row --}}
     

{{-- row --}}
{{-- <div class="row">
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Billing Address</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Billing Address" name="Billing_Address">
        @error('Billing_Address') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Billing City</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Billing City" name="Billing_City">
        @error('Billing_City') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Billing State</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Billing State" name="Billing_State">
        @error('Billing_State') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    

    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Billing Country</label>
    
        <input class="form-control" name="Billing_Country" type="text" list="select-contry" placeholder="Select Country">
         <datalist id="select-contry">
         
            <option value="">Select Country</option>
             @foreach ($countries as $country)
                 <option value="{{ $country->nom_en_gb }}">{{ $country->nom_en_gb }}</option>
             @endforeach
          </datalist>  
        @error('Billing_Country') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
</div>


<hr> --}}
{{-- end row --}}
     

{{-- row --}}
{{-- <div class="row">
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">ZIP code</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="ZIP code" name="ZIP_code">
        @error('ZIP_code') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Booking Manager</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Booking Manager" name="Booking_Manager">
        @error('Booking_Manager') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Booking Manager email</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Booking Manager email" name="Booking_Manager_email">
        @error('Booking_Manager_email') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Booking Manager Phone</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Booking Manager Phone" name="Booking_Manager_Phone">
        @error('Booking_Manager_Phone') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
</div>
<hr> --}}
{{-- end row --}}
     

{{-- row --}}
{{-- <div class="row">
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Support Email</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Support Email" name="Support_Email">
        @error('Support_Email') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Support Email 2</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Support Email 2" name="Support_Email_2">
        @error('Support_Email_2') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Support Email 3</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Support Email 3" name="Support_Email_3">
        @error('Support_Email_3') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Support Email 4</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Support Email 4" name="Support_Email_4">
        @error('Support_Email_4') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
</div>
<hr> --}}
{{-- end row --}}
     

{{-- row --}}
{{-- <div class="row">
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Financial Manager</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Financial Manager" name="Financial_Manager">
        @error('Financial_Manager') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Financial Manager email</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Financial Manager email" name="Financial_Manager_email">
        @error('Financial_Manager_email') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Financial Manager email2</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Financial Manager email2" name="Financial_Manager_email2">
        @error('Financial_Manager_email2') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Financial Manager email3</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Financial Manager email3" name="Financial_Manager_email3">
        @error('Financial_Manager_email3') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
</div>
<hr> --}}
{{-- end row --}}
     

{{-- row --}}
{{-- <div class="row">
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Financial Manager email4</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Financial Manager email4" name="Financial_Manager_email4">
        @error('Financial_Manager_email4') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Financial Manager Phone</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Financial Manager Phone" name="Financial_Manager_Phone">
        @error('Financial_Manager_Phone') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Notes</label>
        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Notes" name="Notes">
        @error('Notes') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
    <div class="form-group col-sm-auto">
        <label>Contact Type</label>
        <select class="form-control" id="exampleFormControlInput" name="Contact_Type">
        <option value="">Select Type</option>
        <option value="SELLER">Seller</option>
        <option value="BUYER">Buyer</option>
        <option value="HSS">HSS</option>
        </select>
        @error('Contact_Type') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
</div>
<hr> --}}
{{-- end row --}}


<div class="modal-body">

    <div class="row">

            <div class="col-sm-6">
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">Agency ID</label>
                    <input  type="text" class="form-control" id="exampleFormControlInput" placeholder="Agency ID"  name="Agency_ID">
                    @error('Agency_ID') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
                
            </div>
            <div class="col-sm-6">
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">Agency Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Agency Name"  name="Agency_Name">
                    @error('Agency_Name') <span class="text-danger error">{{ $message }}</span>@enderror
                
                </div>
            </div>
        
    </div> 

    <hr>
    
    <h3>Booking Department</h3> 
    <div class="row">
            <div class="col-sm-6">
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">First Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="First Name"  name="First_Name">
                    @error('First_Name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
        
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">Last Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Last Name"  name="Last_Name">
                    @error('Last_Name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">Email</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email"  name="Email">
                    @error('Email') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">Email2</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email2"  name="Email2">
                    @error('Email2') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">Phone</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Phone"  name="Phone">
                    @error('Phone') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">Mobile</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Mobile"  name="Mobile">
                    @error('Mobile') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">Emergency Phone</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Emergency Phone"  name="Emergency_Phone">
                    @error('Emergency_Phone') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </div>
            
            
    <div id="notif"></div>
</div>
<hr>
<h3>Escalation</h3> 
{{-- @if (Auth::guard()->user()->role==1) --}}
<div class="row">
        <div class="col-sm-6">
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">First Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="First Name"  name="First_Name_1">
                @error('First_Name_1') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Last Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Last Name"  name="Last_Name_1">
                @error('Last_Name_1') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Email</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email"  name="Email_1">
                @error('Email_1') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Email2</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email2"  name="Email2_1">
                @error('Email2_1') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Phone</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Phone"  name="Phone_1">
                @error('Phone_1') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Mobile</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Mobile"  name="Mobile_1">
                @error('Mobile_1') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
          
        </div>
        <div class="col-sm-6">
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Emergency Phone</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Emergency Phone"  name="Emergency_Phone">
                @error('Emergency_Phone') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        
           
        </div>
</div>
<hr> 
<div class="row"> 
       
        <div class="col-sm-6">
            <div class="form-group col-sm-auto">
                <label>Contact Type</label>
                <select class="form-control" id="Contact_Type" value="Contact_Type " name="Contact_Type">
                <option  value="">Select Type</option>
                <option   value="SELLER">Seller</option>
                <option   value="BUYER">Buyer</option>
                <option   value="HSS">HSS</option>
                </select>
                @error('Contact_Type') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Code country</label>
                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="ZIP code"  name="ZIP_code">
                @error('ZIP_code') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            
        </div>
        <div class="col-sm-6">
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Billing Country</label>
            
                <input class="form-control" name="Billing_Country" type="text" list="select-contry" placeholder="Select Country"  >
                <datalist id="select-contry">
                
                    <option value="">Select Country</option>
                    
                    @foreach ($countries as $country)
                        <option value="{{ $country->nom_en_gb }}">{{ $country->nom_en_gb }}</option>
                    @endforeach
                </datalist>  
                @error('Billing_Country') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
         
        </div>


</div>
        

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-outline-success mb-2">Save</button>
                    <button style="margin-left: 20px" type="reset" class="btn btn-outline-danger mb-2">Clear</button>
                
                </div>
</form>
@endsection
{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}
