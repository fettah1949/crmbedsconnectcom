@php
use App\Models\Bank;
$banks = Bank::all();

//dd($sellers);

    $category_name = 'finance';
    $page_name = 'banks';
    $has_scrollspy = 0;
    $scrollspy_offset = '';

    $currency = $bank->Devise;

  //  dd($bank);
@endphp
@extends('layouts.app')
  
@section('content')

@if ( $type === 'TRANSACTION')

<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('banks.index') }}">Transaction List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Add New Transaction</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Bank Name : {{ $bank->Nom_du_compte }} | Bank N° : {{ $bank->Numero_de_compte }}</a></li>
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
   
    
    
    
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        
        <div class="row">
            
            
            
            
            <input hidden type="text" name="type" value="{{ $type }}">
            <input hidden type="text" name="Bank_id" value="{{ $bank->id }}">
            
            
            
            <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Reference_Number<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInput" name="Reference_Number" placeholder="Reference_Number">
                            @error('Reference_Number') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                
                       <div class="form-group col-sm-auto">
                           <label for="exampleFormControlInput">Date</label>
                           <input type="date" class="form-control" id="exampleFormControlInput" name="Date" placeholder="date">
                           @error('Date') <span class="text-danger error">{{ $message }}</span>@enderror
                       </div>
            
                       <div class="form-group">
                           <label for="exampleFormControlInput">Description</label>
                           <input type="text" class="form-control" id="exampleFormControlInput" name="Description" placeholder="Description">
                           @error('Description') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    {{-- end row --}}
                    <hr>
                    
                    
                    <div class="row">
                        
                        <div class="form-group col-sm-auto">
                            <label>Type :<span style="color: red">*</span></label>
                            <select class="form-control" id="exampleFormControlInput" name="transaction_type">
                                <option value="">Select Type</option>
                                <option value="DEBIT">Debit</option>
                                <option value="CREDIT">Credit</option>
                            </select>
                            @error('transaction_type') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Amount {{ $currency }}<span style="color: red">*</span></label>
                            <input type="decimal" class="form-control" id="exampleFormControlInput" placeholder="Amount" name="Amount">
                            @error('Amount') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Payee</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" name="Payee" placeholder="Payee">
                            @error('Payee') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        
                    
                    
                    
                </div>
                {{-- end row --}}
                <hr>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-outline-success mb-2">Save</button>
                    <button style="margin-left: 20px" type="reset" class="btn btn-outline-danger mb-2">Clear</button>
                
                </div>
</form>


@endif

{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}


@if ( $type === 'TRANSFER')

<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('banks.index') }}">Transaction List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">New Transfer From</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Bank Name : {{ $bank->Nom_du_compte }} | Bank N° : {{ $bank->Numero_de_compte }}</a></li>
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
   



<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
  
    <div class="row">
        
        
            
        <input hidden type="text" name="type" value="{{ $type }}">
        <input hidden type="text" name="Bank_id" value="{{ $bank->id }}">
        <input hidden type="text" name="Bank2_id" id="bank2_id" value="">
        
        
        
        <div class="form-group col-sm-auto">
                        <label for="exampleFormControlInput">Reference_Number<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput" name="Reference_Number" placeholder="Reference_Number">
                        @error('Reference_Number') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
            
                   <div class="form-group col-sm-auto">
                       <label for="exampleFormControlInput">Date</label>
                       <input type="date" class="form-control" id="exampleFormControlInput" name="Date" placeholder="date">
                       @error('Date') <span class="text-danger error">{{ $message }}</span>@enderror
                   </div>
        
                   <div class="form-group">
                       <label for="exampleFormControlInput">Description</label>
                       <input type="text" class="form-control" id="exampleFormControlInput" name="Description" placeholder="Description">
                       @error('Description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                {{-- end row --}}
                <hr>
                
                
                <div class="row">
                    
                    
                    
                  <div class="form-group col-sm-auto">
                      <label for="amount1">Amount Debit<span style="color: red">*</span></label>
                      <div class="input-group mb-4">
                          <input type="decimal" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="amount1" placeholder="0.00" name="Amount1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">{{ $currency }}</span>
                          </div>
                        </div>
                      @error('Amount1') <span class="text-danger error">{{ $message }}</span>@enderror
                  </div>
                                        


                    <div class="form-group col-sm-auto">
                        <label for="exampleFormControlInput">Transfer To :</label>
                    
                        <input class="form-control" id="bank2" placeholder="Select Bank" name="Bank2" type="text" list="select-bank" onkeyup='setBank2();'>
                         <datalist id="select-bank">
                         
                            <option value="">Select Bank</option>
                             @foreach ($banks as $value)
                             @if ( $value->id === $bank->id )
                             @else
                             <input hidden type="text" id="{{ $value->Nom_du_compte }}2" value="{{ $value->id }}">
                             <input hidden type="text" id="{{ $value->Nom_du_compte }}" value="{{ $value->Devise }}">
                             <option value="{{ $value->Nom_du_compte }}">{{ $value->Nom_du_compte }}</option>
                             @endif
                             @endforeach
                          </datalist>  
                        @error('Bank2') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    
              
                    <div class="form-group col-sm-auto">
                        <label for="exchange">Exchange :<span style="color: red">*</span></label>
                        <input type="decimal" class="form-control" id="exchange" value="1.00" onchange='setAmount2();'>
                    </div>

                    <div class="form-group col-sm-auto">
                        <label for="amount2">Amount Credit</label>


                        <div class="input-group mb-4">
                            <input type="decimal" class="form-control" aria-label="Default" aria-describedby="currency2" id="amount2" placeholder="0.00" name="Amount2">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="currency2" >###</span>
                            </div>
                          </div>
                        @error('Amount2') <span class="text-danger error">{{ $message }}</span>@enderror
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
    function setBank2(){
               var curr2 = document.getElementById("bank2").value;
               document.getElementById("currency2").innerHTML = document.getElementById(curr2).value;

               setBank2_id();
               
    }

    function setBank2_id(){
               var curr2 = document.getElementById("bank2").value;
               var character = "2";
               var bank2id = curr2+character;
               document.getElementById("bank2_id").value = document.getElementById(bank2id).value; 
               setAmount2();

    }

               function setAmount2(){
                   
                    document.getElementById("amount2").value = document.getElementById("amount1").value * document.getElementById("exchange").value ; 
            

        }

</script>

@endif

{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}


@endsection

{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}
