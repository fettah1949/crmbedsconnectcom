@php
use App\Models\Country;
$countries = Country::all();

use App\Models\Agencycontact;
$sellers = Agencycontact::where('Contact_Type','SELLER')->get();
//dd($sellers);

    $category_name = 'finance';
    $page_name = 'banks';
    $has_scrollspy = 0;
    $scrollspy_offset = '';
@endphp
@extends('layouts.app')
  
@section('content')
<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('banks.index') }}">Bank List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Add New Bank</a></li>
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
   
<form action="{{ route('banks.store') }}" method="POST">
    @csrf
  
    <div class="row">
        
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Nom du compte</label>
                <input type="text" class="form-control" id="exampleFormControlInput" name="Nom_du_compte" placeholder="Nom du compte">
                @error('Nom_du_compte') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Code du compte</label>
            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Code du compte" name="Code_du_compte">
            @error('Code_du_compte') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Numero de compte</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Numero_de_compte" placeholder="Numero de compte">
            @error('Numero_de_compte') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Nom de la banque</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Nom_de_la_banque" placeholder="Nom de la banque">
            @error('Nom_de_la_banque') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        
    </div>
    {{-- end row --}}
    <hr>
    


    <div class="row">
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">SWIFT</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="SWIFT" placeholder="SWIFT">
            @error('SWIFT') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
     
   <div class="form-group col-sm-auto">
       <label>Devise :</label>
       <select class="form-control" id="exampleFormControlInput" name="Devise">
       <option value="">Select Devise</option>
       <option value="EUR">EUR</option>
       <option value="MAD">MAD</option>
       <option value="USD">USD</option>
       </select>
       @error('Devise') <span class="text-danger error">{{ $message }}</span>@enderror
   </div>
        
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Balance</label>
            <input type="number" class="form-control" id="exampleFormControlInput" name="Balance" placeholder="Balance">
            @error('Balance') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput" name="Description" placeholder="Description">
            @error('Description') <span class="text-danger error">{{ $message }}</span>@enderror
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
