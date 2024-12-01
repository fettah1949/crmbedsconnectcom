@php
use App\Models\Bank;
$banks = Bank::all();

use App\Models\ExpenseCategory;
$categories = ExpenseCategory::all();

    $category_name = 'finance';
    $page_name = 'expense';
    $has_scrollspy = 0;
    $scrollspy_offset = '';
@endphp
@extends('layouts.app')
  
@section('content')
<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('expense.index') }}">Expenses</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">New Expense</a></li>
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
   
<form action="{{ route('expense.store') }}" method="POST">
    @csrf
  
    <div class="row">
        
            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Date</label>
                <input type="date" class="form-control" id="exampleFormControlInput" name="Expense_Date">
                @error('Expense_Date') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group col-sm-auto">
                <label for="exampleFormControlInput">Category :</label>
            
                <input class="form-control" id="category" placeholder="Select Category" name="Category" type="text" list="select-category">
                 <datalist id="select-category">
                 
                    @foreach ($categories as $category)
                     <option value="{{ $category->Category_Name }}">{{ $category->Category_Name }}</option>
                     @endforeach
                  </datalist>  
                @error('Category') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
             

            <div class="form-group col-sm-auto">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
             
        
            <div class="form-group col-sm-auto">
                <label>Payment Mode :</label>
                <select class="form-control" id="payment_mode" name="Payment_Mode" >
                <option value="">Select Payment</option>
                <option value="CASH">Cash</option>
                <option value="BANK">Bank</option>
            </select>
            @error('Payment_Mode') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        
        
        
        
            </div>
            {{-- end row --}}
            <hr>
            
      
    


<div class="row" >
    
    <div class="form-group col-sm-auto">
        <label for="exampleFormControlInput">Paid Through :</label>
    
        <input class="form-control" id="bank" placeholder="Select Bank" name="Bank" type="text" list="select-bank" onkeyup='setBank();'>
         <datalist id="select-bank">
         
            <option value="">Select Bank</option>
             @foreach ($banks as $bank)
             <input hidden type="text" id="{{ $bank->Nom_du_compte }}2" value="{{ $bank->id }}">
             <input hidden type="text" id="{{ $bank->Nom_du_compte }}" value="{{ $bank->Devise }}">
             <option value="{{ $bank->Nom_du_compte }}">{{ $bank->Nom_du_compte }}</option>
             @endforeach
          </datalist>  
        @error('Bank') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

  
    <div class="form-group col-sm-auto">
        <label for="amount">Amount</label>


        <div class="input-group mb-4">
            <input type="decimal" class="form-control" aria-label="Default" aria-describedby="currency" id="amount" placeholder="0.00" name="Amount">
            <div class="input-group-prepend">
              <span class="input-group-text" id="currency" >###</span>
            </div>
          </div>
        @error('Amount') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    
 
    
    
</div>
    
{{-- end row --}}
<hr>

    <div class="row">
     
    
        <div class="form-group col-sm-auto">
            <label for="exampleFormControlInput">Staf Name</label>
            <input disabled type="text" class="form-control" id="exampleFormControlInput" name="Staf_Name" value="{{ $staf_name }}">
            @error('Staf_Name') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
        


        
    </div>
    {{-- end row --}}
    <hr>

    <input hidden type="text" name="Paid_Through" id="Paid_Through" value="">
    <input hidden type="text" name="Currency" id="currency_symb" value="">
    

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-outline-success mb-2">Save</button>
                    <button style="margin-left: 20px" type="reset" class="btn btn-outline-danger mb-2">Clear</button>
                
                </div>
</form>



<script>
    function setBank(){
               var curr2 = document.getElementById("bank").value;
               document.getElementById("currency").innerHTML = document.getElementById(curr2).value;
               document.getElementById("currency_symb").value = document.getElementById(curr2).value;

               setBank_id();
               
    }

    function setBank_id(){
               var curr2 = document.getElementById("bank").value;
               var character = "2";
               var bankid = curr2+character;
               document.getElementById("Paid_Through").value = document.getElementById(bankid).value; 

    }

           

</script>


@endsection

{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}
