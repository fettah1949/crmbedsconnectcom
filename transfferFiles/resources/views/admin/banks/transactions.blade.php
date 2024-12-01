
@php
    $category_name = 'finance';
    $page_name = 'banks';
    $has_scrollspy = 0;
    $scrollspy_offset = '';

        
use App\Models\ExpenseCategory;
$categories = ExpenseCategory::all();


$transaction = 'TRANSACTION';
$transfer = 'TRANSFER';
@endphp
@extends('layouts.app')
@section('content')

<br>

<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol style="background: none" class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ route('banks.index') }}">Bank List</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Transactions of Bank: {{ $bank->Nom_du_compte }} </a></li>
    </ol>
</nav>
 
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}  
</div>
@endif

<hr>
{{-- <div class="widget-content widget-content-area br-6">

 <div class="table-responsive">
    <table class="table table-bordered">

        <thead>
        <tr>
            <th>Nom_du_compte</th>
            <th>Code_du_compte </th>
            <th>Numero_de_compte</th>
            <th>Nom_de_la_banque</th>
            <th>SWIFT</th>
            <th>Balance</th>
            <th>Devise</th>
        </tr>
    </thead>
    <tbody>        
        <tr>
            <td>{{ $bank->Nom_du_compte }}</td>
            <td>{{ $bank->Code_du_compte }}</td>
            <td>{{ $bank->Numero_de_compte }}</td>
            <td>{{ $bank->Nom_de_la_banque }}</td>
            <td>{{ $bank->SWIFT }}</td>
            <td>{{ $bank->Balance }}</td>
            <td>{{ $bank->Devise }}</td>
 
        </tr>

    </tbody>
</table>
</div>


        
</div> --}}


{{-- Filter ------------------------------------------------------------------------------------------------------ --}}

<div class="layout-px-spacing">
    
    <div class="row layout-top-spacing">
        
             <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                        
                    <div class="widget widget-account-invoice-one">
                
                
                        <div class="widget-content">
                            <div class="invoice-box">
                                
                                <div class="acc-total-info">
                                    <h5>{{ $bank->Nom_du_compte }}</h5>
                                    <p class="acc-amount">{{ $bank->Balance }} {{ $bank->Devise }}</p>
                                </div>
                
                                <div class="inv-detail">                                        
                                    <div class="info-detail-1">
                                        <p>Code du compte</p>
                                        <p>{{ $bank->Code_du_compte }}</p>
                                    </div>
                                                        
                                    <div class="info-detail-2">
                                        <p>Numero de compte</p>
                                        <p>{{ $bank->Numero_de_compte }}</p>
                                    </div>
                                                        
                                    <div class="info-detail-3">
                                        <p>Nom de la banque</p>
                                        <p>{{ $bank->Nom_de_la_banque }}</p>
                                    </div>
                                                        
                                    <div class="info-detail-4">
                                        <p>SWIFT</p>
                                        <p>{{ $bank->SWIFT }}</p>
                                    </div>
                
                                </div>
                
                             
                            </div>
                        </div>
                
                    </div>
        </div>
        
        
        
          {{-- Filter -------------------------------------------------------------------- --}}

     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                
      <div class="widget widget-table-one">

        <form action="{{ route('filter_banks',$bank->id) }}" method="POST">
            @csrf

              <div class="form-group" >
              <label  for="start_date" class="control-label col-sm-auto" >Start Date: </label>
                <div class="col-sm-auto" >
                    <input type="date" class="form-control" id="start_date" name="start_date" />
                    @error('start_date') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                  </div>
                  <div class="form-group">
                    <label for="end_date" class="control-label col-sm-auto">End Date: </label>
                      <div class="col-sm-auto">
                        <input type="date" class="form-control" id="end_date" name="end_date"  />
                        @error('end_date') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                  </div>
                  <hr>
          

    
              <br>
              <div class="col-sm-auto">
              <button type="submit" class="btn btn-outline-success mb-2">Apply</button>
              <button type="reset" class="btn btn-outline-secondary mb-2">Clear</button>
          </div>
              </form>
              @if (Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
              @endif
            </div>
          </div>


        {{-- Filter -------------------------------------------------------------------- --}}
        {{-- Filter -------------------------------------------------------------------- --}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing" style="height: fit-content">

            <div class="widget-three">
              
                <div class="widget-content">
  
                    <div class="order-summary">
  
                        <div class="summary-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                            <div class="w-summary-details">
                                
                                <div class="w-summary-info">
                                    <h6>{{ $total["transaction_count_debit"] }} Debit : </h6>
                                    <p class="summary-count">{{ $total["debit"] }} {{ $bank->Devise }}</p>
                                </div>
  
                                <div class="w-summary-stats">
                                    <div class="progress">
                                    </div>
                                </div>
  
                            </div>
  
                        </div>
  
                        <div class="summary-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                            </div>
                            <div class="w-summary-details">
                                
                                <div class="w-summary-info">
                                    <h6>{{ $total["transaction_count_credit"] }} Credit : </h6>
                                    <p class="summary-count">{{ $total["credit"] }} {{ $bank->Devise }}</p>
                                </div>
  
                                <div class="w-summary-stats">
                                    <div class="progress">
                                    </div>
                                </div>
  
                            </div>
  
                        </div>
                      
                  </div>
                    </div>
            </div>
            
                   <hr>

            <div class="widget-content">
                <div class="btn-group dropright mb-4 mr-2" role="group">
                    <button id="btnDropRightOutline" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
                    <div class="dropdown-menu" aria-labelledby="btnDropRightOutline" style="will-change: transform;">
                        <a href="{{ route('new_transactions',['bank_id'=>$bank->id,'type'=>$transaction]) }}" class="dropdown-item">Transaction</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('new_transactions',['bank_id'=>$bank->id,'type'=>$transfer]) }}" class="dropdown-item">Transfer</a>
                    </div>
                </div>
            
        </div>
            
        </div>
  
        
      
<div class="table-responsive">
    <table class="table table-striped mb-4" id="hotels-table">

        <thead>
        <tr>
            <th>.</th>
            <th>Date</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Payee</th>
            <th>Description </th>
            <th>Reference_Number</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $value)
        
        <tr>

            @if (  $value->Debit  > 0)
            <td style="background: rgba(255, 0, 0, 0.034)">-</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Date }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Debit }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Credit }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Payee }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Description }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Reference_Number }}</td>
            <td style="background: rgba(255, 0, 0, 0.034)">{{ $value->Type }}</td>
        <td style="background: rgba(255, 0, 0, 0.034)">

                @if (  $value->Type === "TRANSACTION")
                <a href="{{ route('edit_transactions',['bank_id'=>$bank->id,'transaction_id'=>$value["id"]]) }}">
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                        <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
                </a>
                
                <a onclick="return confirm('Are you sure?')"  style="margin-left: 10px;" href="{{ route('delete_transactions',['transaction_id'=>$value["id"]]) }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </a>

                @elseif ($value->Type === "TRANSFER")

                <a onclick="return confirm('Are you sure?')"  style="margin-left: 10px;" href="{{ route('delete_transactions',['transaction_id'=>$value["id"]]) }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </a>

                @else
                     
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
                          
                @endif
             
            </td>

            @elseif (  $value->Credit  > 0)
            <td style="background: rgba(9, 255, 0, 0.034)">-</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Date }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Debit }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Credit }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Payee }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Description }}</td>
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Reference_Number }}</td>  
            <td style="background: rgba(9, 255, 0, 0.034)">{{ $value->Type }}</td>
    
            
            <td style="background: rgba(9, 255, 0, 0.034)">

                @if (  $value->Type === "TRANSACTION")
                <a href="{{ route('edit_transactions',['bank_id'=>$bank->id,'transaction_id'=>$value["id"]]) }}">
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                        <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
                </a>
                
                                <a onclick="return confirm('Are you sure?')"  style="margin-left: 10px;" href="{{ route('delete_transactions',['transaction_id'=>$value["id"]]) }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </a>
                @else
                     
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
                          
                @endif

                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>


</div>


</div>
</div>

<script type="text/javascript">
    document.getElementById("start_date").value = <?php echo json_encode($filter["start_date"]); ?>;    // set the value to this input 
    document.getElementById("end_date").value = <?php echo json_encode($filter["end_date"]); ?>;    // set the value to this input 
  
  /* Here you can add more inputs to set value. if it's saved */
  
  </script>
      
@endsection

  