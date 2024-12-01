@php

    $category_name = 'finance';
    $page_name = 'expense';
    $has_scrollspy = 0;
    $scrollspy_offset = '';


    
use App\Models\ExpenseCategory;
$categories = ExpenseCategory::all();


@endphp
@extends('layouts.app')
@section('content')

    <br>
   <hr>
<div class="col-lg-12 margin-tb">
    <div class="pull-left text-center">
        <h2 class="text-primary">Expense List</h2>
    </div>
    <hr>
    <br>
</div>
  {{-- filter -------------------------------------------------------------------- --}}
  <div class="layout-px-spacing">

    <div class="row layout-top-spacing">



  




     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                
      <div class="widget widget-table-one">

        <form action="{{ route('filter_expense') }}" method="POST">
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
                  
              <div class="form-group">
              <label for="Category" class="control-label col-sm-auto">Category: </label>
                <div class="col-sm-auto">
                <select class="form-control" id="Category" name="Category" >
                  <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->Category_Name }}">{{ $category->Category_Name }}</option>
                    @endforeach
              </select>
                  @error('Category') <p class="text-danger">{{ $message }}</p> @enderror

              </div>
              </div>

    


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
     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
          <div class="widget-three">
              <div class="widget-heading">
                  <h5 class="">Summary</h5>
              </div>
              <div class="widget-content">

                  <div class="order-summary">

                      <div class="summary-list">
                          <div class="w-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                          </div>
                          <div class="w-summary-details">
                              
                              <div class="w-summary-info">
                                  <h6>Expense : {{ $total["expense_count_eur"] }}</h6>
                                  <p class="summary-count">{{$total["eur"]}} EUR</p>
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
                                  <h6>Expense : {{ $total["expense_count_usd"] }}</h6>
                                  <p class="summary-count">{{$total["usd"]}} USD</p>
                              </div>

                              <div class="w-summary-stats">
                                  <div class="progress">
                                  </div>
                              </div>

                          </div>

                      </div>

                      <div class="summary-list">
                          <div class="w-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                          </div>
                          <div class="w-summary-details">
                              
                              <div class="w-summary-info">
                                  <h6>Expense : {{ $total["expense_count_mad"] }}</h6>
                                  <p class="summary-count">{{$total["mad"]}} MAD</p>
                              </div>

                              <div class="w-summary-stats">
                                  <div class="progress">
                                  </div>
                              </div>

                          </div>

                      </div>
                      
              

                      <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                        </div>
                        <div class="w-summary-details">
                            
                            <div class="w-summary-info">
                                <h6>Expense : {{ $total["expense_count_all"] }} </h6>
                                <p class="summary-count">{{$total["united_amount"]}} Total</p>
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
      </div>

      
      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

              
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-outline-primary btn-rounded mb-2" href="{{ route('expense.create') }}"> New Expense</a>
            </div>
        </div>
    </div>
 




</div>



        <div class="widget-content widget-content-area br-6">
                <table class="table table-striped" style="width:100%" id="bank-table1">
         <thead>
        <tr>
            <th>.</th>
            <th>Expense_Date</th>
            <th>Payment_Mode</th>
            <th>Amount</th>
            <th>Category </th>
            <th>Description</th>
            <th>Paid_Through</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenses as $value)
        <tr>
            <td>-</td>
            <td>{{ $value->Expense_Date }}</td>
            <td>{{ $value->Payment_Mode }}</td>
            <td>{{ $value->Amount }} {{ $value->Currency }}</td>
            <td>{{ $value->Category }}</td>
            <td>{{ $value->description }}</td>
     <td>
            
                <a  href="{{ route('bank_transactions',$value["Bank_id"]) }}"   target="_blank" >
                    {{ $value->Paid_Through }}
                </a>
            
            </td>            <td>
         
                <a onclick="return confirm('Are you sure?')"  style="margin-left: 10px;" href="{{ route('delete_expense',['expense_id'=>$value["id"]]) }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>


<script type="text/javascript">
  document.getElementById("start_date").value = <?php echo json_encode($filter["start_date"]); ?>;    // set the value to this input 
  document.getElementById("end_date").value = <?php echo json_encode($filter["end_date"]); ?>;    // set the value to this input 
  document.getElementById("Category").value = <?php echo json_encode($filter["Category"]); ?>;    // set the value to this input 

/* Here you can add more inputs to set value. if it's saved */

</script>
      
@endsection

  