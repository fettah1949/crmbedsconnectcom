@php

    $category_name = 'finance';
    $page_name = 'banks';
    $has_scrollspy = 0;
    $scrollspy_offset = '';

    

@endphp

@extends('layouts.app')
   
@section('content')


@if ( $transaction->Type === 'TRANSACTION')


<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('bank_transactions',$bank->id) }} ">Transaction List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Edit Transaction : {{ $transaction->Reference_Number }}</a></li>
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
   
    
    
    
    <form action="{{ route('transactions.update',$transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            
            
            
            
            <input hidden type="text" name="Transaction_id" value="{{ $transaction->id }}">
            <input hidden type="text" name="Bank_id" value="{{ $bank->id }}">
            
            
                       <div class="form-group col-sm-auto">
                           <label for="exampleFormControlInput">Date</label>
                           <input type="date" class="form-control" id="exampleFormControlInput" name="Date" placeholder="date" value="{{ $transaction->Date }}">
                           @error('Date') <span class="text-danger error">{{ $message }}</span>@enderror
                       </div>
            
                       <div class="form-group">
                           <label for="exampleFormControlInput">Description</label>
                           <input type="text" class="form-control" id="exampleFormControlInput" name="Description" placeholder="Description" value="{{ $transaction->Description }}">
                           @error('Description') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    {{-- end row --}}
                    <hr>
                    
                    
                    <div class="row">
                        
                        <div class="form-group col-sm-auto">
                            <label>Type :<span style="color: red">*</span></label>
                                @if ($transaction->Credit > 0)

                                <input disabled class="form-control" value="CREDIT" >
                                <input hidden class="form-control" value="CREDIT" name="transaction_type" >

                                @elseif ($transaction->Debit > 0)

                                <input disabled class="form-control" value="DEBIT" >
                                <input hidden class="form-control" value="DEBIT" name="transaction_type" >

                                @endif
    
                            </select>
                            @error('transaction_type') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group col-sm-auto">
                            <label for="Amount">Amount {{ $bank->Devise }}<span style="color: red">*</span></label>
                            @if ($transaction->Credit > 0)
                            <input type="decimal" class="form-control" id="Amount" placeholder="0.00" name="Amount" value="{{ $transaction->Credit }}">
                            @elseif ($transaction->Debit > 0)
                            <input type="decimal" class="form-control" id="Amount" placeholder="0.00" name="Amount" value="{{ $transaction->Debit }}">
                            @endif
                            @error('Amount') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Payee</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" name="Payee" placeholder="Payee" value="{{ $transaction->Payee }}">
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





@if ( $transaction->Type === 'TRANSFER')

<br>

@php
    dd("here we are in Transfer Section");
@endphp

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
                          <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="amount1" placeholder="0.00" name="Amount1">
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
                             @foreach ($banks as $bank)
                             <input hidden type="text" id="{{ $bank->Nom_du_compte }}2" value="{{ $bank->id }}">
                             <input hidden type="text" id="{{ $bank->Nom_du_compte }}" value="{{ $bank->Devise }}">
                             <option value="{{ $bank->Nom_du_compte }}">{{ $bank->Nom_du_compte }}</option>
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
                            <input type="number" class="form-control" aria-label="Default" aria-describedby="currency2" id="amount2" placeholder="0.00" name="Amount2">
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














{{-- vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv --}}


@endsection


{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}