@php
    $category_name = 'production';
    $page_name = 'reservation';
    $has_scrollspy = 0;
    $scrollspy_offset = '';
@endphp
@extends('layouts.app')   
@section('content')
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h2>Edit Reservation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-primary btn-rounded mb-2" href="{{ route('reservation.index') }}"> Reservations List</a>
            </div>
            <br>
        </div>
    </div>
   
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
 
    
    <form action="{{ route('reservation.update',$reservation->tgx) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="row">
          <div class="form-group col-sm-auto ">
              <label>Booking ID</label>
              <input disabled type="text" name="tgx" class="form-control" value="{{ $reservation->tgx }}">
              @error('tgx') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="form-group col-sm-auto">
              <label>Hotel Name</label>
              <input disabled type="text" class="form-control" name="hotelName" value="{{ $reservation->hotelName }}" placeholder="hotelName">
              @error('hotelName') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
         
          <div class="form-group col-sm-auto">
              <label>Main Guest</label>
              <input disabled type="text" class="form-control" name="mainGuestName" value="{{ $reservation->mainGuestName }}" placeholder="mainGuestName">
              @error('mainGuestName') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
         
          
           <div class="form-group col-sm-auto">
               <label>Provider</label>
               <input disabled type="text" class="form-control" name="providerName" value="{{ $reservation->providerName }}" placeholder="providerName">
               @error('providerName') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        {{-- end row --}}
        <hr>
    
        <div class="row">
    
            <div class="form-group col-sm-auto">
                <label>Booking Date</label>
                <input disabled type="text" class="form-control" name="bookingDate" value="{{ $reservation->bookingDate }}" placeholder="bookingDate">
                @error('bookingDate') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
             <div class="form-group col-sm-auto">
               <label>Check in Date</label>
               <input type="text" class="form-control" name="checkinDate" value="{{ $reservation->checkinDate }}" placeholder="checkinDate">
               @error('checkinDate') <span class="text-danger">{{ $message }}</span>@enderror
           </div>
    
           
            
           <div class="form-group col-sm-auto">
               <label>check out Date</label>
               <input type="text" class="form-control" name="checkoutDate" value="{{ $reservation->checkoutDate }}" placeholder="checkoutDate">
               @error('checkoutDate') <span class="text-danger">{{ $message }}</span>@enderror
           </div>
           
            
            <div class="form-group col-sm-auto">
                <label>HCN_AC</label>
                <input type="text" class="form-control" name="HCN_AC" value="{{ $reservation->HCN_AC }}" placeholder="HCN_AC">
                @error('HCN_AC') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
       
        </div>
        {{-- end row --}}
        <hr>
        
        <div class="row">
            
            <div class="form-group col-sm-auto">
                <label>Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="">Select Status</option>
                    <option value="CN">Cancelled</option>
                    <option value="OK">Confirmed</option>
                    <option value="UN">Unknown Status</option>
                    <option value="CN-FEE">Cancelled Whith Fee</option>
                    <option value="CN-NRF">Cancelled Non Refundable</option>
                    <option value="NO-SHOW">No-Show</option>
                  </select>
                @error('status') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
             <div class="form-group col-sm-auto">
                 <label>Cancellation Date</label>
                 <input type="text" class="form-control" name="cancellationDate" value="{{ $reservation->cancellationDate }}" placeholder="cancellationDate">
                 @error('cancellationDate') <span class="text-danger">{{ $message }}</span>@enderror
             </div>
             
            
                 <div class="form-group col-sm-auto">
                     <label>Cancellation Price</label>
                     <input type="text" class="form-control" name="cancellationPrice_amount" value="{{ $reservation->cancellationPrice_amount }}" placeholder="cancellationPrice">
                     @error('cancellationPrice_amount') <span class="text-danger">{{ $message }}</span>@enderror
                 </div>
    
               
    
    </div>
      {{-- end row --}}
    <hr>
    
            <div class="row">
    
             
             <div class="form-group col-sm-auto">
                 <input type="hidden" name="sellingPrice_currency" id="sellingPrice_currency" value="{{ $reservation->sellingPrice_currency }}"  >
                 <label>Selling Price <span>:{{ $reservation->sellingPrice_currency }}</span></label>
                 <input type="text" class="form-control" id="sellingPrice_amount" name="sellingPrice_amount" value="{{ $reservation->sellingPrice_amount }}"   placeholder="sellingPrice" onkeyup='setValue();'>
                 @error('sellingPrice_amount') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-sm-auto">
                    <label>S.P.Exchange Rate</label>
                    <input type="text" class="form-control" name="un_pr_selling_exchangeRate" id="un_pr_selling_exchangeRate"  onkeyup='setValue();'>
                </div>
                
                <div class="form-group col-sm-auto">
                    <label>UN-Selling Price</label>
                    <input type="text" class="form-control" name="un_pr_selling_EUR" id="un_pr_selling_EUR" placeholder="Selling EUR" value="{{ $reservation->un_pr_selling_EUR }}"  onkeyup='setValue();'>
                    @error('un_pr_selling_EUR') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <hr>
                
        <div class="row">

                <div class="form-group col-sm-auto">
                    <input type="hidden" name="providerPrice_currency" value="{{ $reservation->providerPrice_currency }}"  >
                    <label>Provider Price <span>:{{ $reservation->providerPrice_currency }}</span></label>
                    <input type="text" id="providerPrice_amount" class="form-control" name="providerPrice_amount" value="{{ $reservation->providerPrice_amount }}"   placeholder="providerPrice" onkeyup='setValue();'>
                    @error('providerPrice_amount') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
          
                <div class="form-group col-sm-auto">
                    <label>P.P.Exchange Rate</label>
                    <input type="text" class="form-control" name="un_pr_purchasing_exchangeRate" id="un_pr_purchasing_exchangeRate"  onkeyup='setValue();'>
                </div>
                
                <div class="form-group col-sm-auto">
                    <label>UN-Provider Price</label>
                    <input type="text" class="form-control" id="un_pr_purchasing_EUR" name="un_pr_purchasing_EUR" value="{{ $reservation->un_pr_purchasing_EUR }}" placeholder="Provider EUR" onkeyup='setValue();'>
                    @error('un_pr_purchasing_EUR') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
        </div>
        {{-- end row --}}
        <hr>


        <div class="row">
                <div class="form-group col-sm-auto">
                    <label>Marge</label>
                    <input readonly id="marge" class="form-control" name="marge" value="{{ $reservation->marge }}"   placeholder="Marge">
                </div>

                <div class="form-group col-sm-auto">
                    <label for="Commission_bdsc">Comission BDSC</label>


                    <div class="input-group mb-4">
                        <input readonly class="form-control" aria-label="Default" aria-describedby="currency2" id="Commission_bdsc" name="Commission_bdsc" value="{{ $reservation->Commission_bdsc * 100 }}" placeholder="Commission_bdsc">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="currency2" >%</span>
                        </div>
                      </div>
                </div>

                <div class="form-group col-sm-auto">
                    <label>Nights Count</label>
                    <input readonly class="form-control" id="nights_count" name="nights_count" value="{{ $reservation->nights_count }}"  >
                </div>

                <div class="form-group col-sm-auto">
                    <label>Price per Night</label>
                    <input readonly class="form-control" id="price_per_night" name="price_per_night" value="{{ $reservation->price_per_night }}" placeholder="price_per_night">
                </div>

        </div>


        {{-- <hr> --}}

    
        {{-- <div class="row">
    
            
             
            <div class="form-group col-sm-auto">
                <label>invoice id seller</label>
                <input type="text" class="form-control" name="invoice_id_seller" value="{{ $reservation->invoice_id_seller }}" placeholder="invoice_id_seller">
                @error('invoice_id_seller') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
    
            
             
            <div class="form-group col-sm-auto">
                <label>invoice status seller</label>
                <select class="form-control" name="invoice_status_seller" id="invoice_status_seller">
                    <option value="">Select Status</option>
                    <option value="Invoiced">Invoiced</option>
                    <option value="Refund">Refund</option>
                    <option value="Due">Due</option>
                  </select>
                @error('invoice_status_seller') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
    
            
             
            <div class="form-group col-sm-auto">
                <label>invoice id buyer</label>
                <input type="text" class="form-control" name="invoice_id_buyer" value="{{ $reservation->invoice_id_buyer }}" placeholder="invoice_id_buyer">
                @error('invoice_id_buyer') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
    
            
             
            <div class="form-group col-sm-auto">
                <label>invoice status buyer</label>
                <select class="form-control" name="invoice_status_buyer" id="invoice_status_buyer">
                    <option value="">Select Status</option>
                    <option value="Invoiced">Invoiced</option>
                    <option value="Refund">Refund</option>
                    <option value="Due">Due</option>
                  </select>
                @error('invoice_status_buyer') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        
             
            <div class="form-group col-sm-auto">
                <label>Payment Status</label>
                <select class="form-control" name="Payment_Status" id="Payment_Status">
                    <option value="Payed">Payed</option>
                    <option value="Not-Payed">Not-Payed</option>
                  </select>
                @error('Payment_Status') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

        </div> --}}

        {{-- end row --}}
        <hr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-outline-success mb-2">Save</button>
            <a style="margin-left: 10px" href="{{ route('reservation.index') }}" class="btn btn-outline-dark mb-2">Cancel</a>
          </div>
    @php
           if($reservation->sellingPrice_currency == 'EUR'){
                   $diffrent = 1 ;
               }elseif($reservation->sellingPrice_currency == 'USD'){
                   $diffrent = 0.8285690612312536249896428867;                                
               }elseif($reservation->sellingPrice_currency == 'MAD'){
                   $diffrent = 0.0952380952380952380952380952 ;
               }

               if($reservation->providerPrice_currency == 'EUR'){
                   $diffrent2 = 1 ;
               }elseif($reservation->providerPrice_currency == 'USD'){
                   $diffrent2 = 0.8285690612312536249896428867;                                
               }elseif($reservation->providerPrice_currency == 'MAD'){
                   $diffrent2 = 0.0952380952380952380952380952 ;
               }

    @endphp
          <script type="text/javascript">



document.getElementById("un_pr_selling_exchangeRate").value = <?php echo json_encode($diffrent); ?>;    // set the value to this input 
document.getElementById("un_pr_purchasing_exchangeRate").value = <?php echo json_encode($diffrent2); ?>;    // set the value to this input 


            document.getElementById("status").value = <?php echo json_encode($reservation["status"]); ?>;    // set the value to this input 
            document.getElementById("invoice_status_seller").value = <?php echo json_encode($reservation["invoice_status_seller"]); ?>;    // set the value to this input 
            document.getElementById("invoice_status_buyer").value = <?php echo json_encode($reservation["invoice_status_buyer"]); ?>;    // set the value to this input 
            document.getElementById("Payment_Status").value = <?php echo json_encode($reservation["Payment_Status"]); ?>;    // set the value to this input 

            function setValue(){

                if(document.getElementById("providerPrice_amount").value > 0){

                    document.getElementById("un_pr_selling_EUR").value = document.getElementById("sellingPrice_amount").value * document.getElementById("un_pr_selling_exchangeRate").value ;    // set the value to this input 
                    document.getElementById("un_pr_purchasing_EUR").value = document.getElementById("providerPrice_amount").value * document.getElementById("un_pr_purchasing_exchangeRate").value ;    // set the value to this input 
                    
                    document.getElementById("marge").value = document.getElementById("un_pr_selling_EUR").value - document.getElementById("un_pr_purchasing_EUR").value;    // set the value to this input 
                    var bdsc = (document.getElementById("un_pr_selling_EUR").value - document.getElementById("un_pr_purchasing_EUR").value)/document.getElementById("un_pr_purchasing_EUR").value;    // set the value to this input 
                    document.getElementById("Commission_bdsc").value = (bdsc*100);
                    document.getElementById("price_per_night").value = document.getElementById("sellingPrice_amount").value / <?php echo json_encode($reservation->nights_count); ?>;    // set the value to this input 
                    
                } else {

                    document.getElementById("un_pr_selling_EUR").value = document.getElementById("sellingPrice_amount").value * document.getElementById("un_pr_selling_exchangeRate").value ;    // set the value to this input 
                    document.getElementById("un_pr_purchasing_EUR").value = document.getElementById("providerPrice_amount").value * document.getElementById("un_pr_purchasing_exchangeRate").value ;    // set the value to this input 
                   

                    document.getElementById("marge").value = 0 ;    // set the value to this input 
                    document.getElementById("Commission_bdsc").value = 0;
                    document.getElementById("price_per_night").value = 0;    // set the value to this input 
             
                }

        
        }
          </script>
        </form>
      <hr>
@endsection


{{-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm --}}