<div class="modal fade" id="edit_reservation-{{$tgx}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel2">Reservation {{$tgx}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>


        <form action="{{ route('reservation.update',$tgx) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tgx" value="{{ $tgx }}" />
        <div class="modal-body">
            {{-- @method('PUT') --}}
            <div class="row">
                    {{-- <div class="col-sm-3">
                        <div class="form-group col-sm-auto ">
                            <label>Booking ID</label>
                            <input disabled type="text" name="tgx" class="form-control" value="{{ $tgx }}">
                            @error('tgx') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div> --}}
                    <div class="col-sm-6">
                        <div class="form-group col-sm-auto">
                            <label>Hotel Name</label>
                            <input disabled type="text" class="form-control" name="hotelName" value="{{ $hotelName }}" title="{{ $hotelName }}" placeholder="hotelName">
                            @error('hotelName') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group col-sm-auto">
                            <label>Main Guest</label>
                            <input disabled type="text" class="form-control" name="mainGuestName" title="{{ $mainGuestName }}" value="{{ $mainGuestName }}" placeholder="mainGuestName">
                            @error('mainGuestName') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                   
            </div> 
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group col-sm-auto">
                        <label>Provider</label>
                        <!-- <input disabled type="text" class="form-control" name="providerName" value="{{ $providerCode }}" title="{{ $providerCode }}" placeholder="providerName"> -->
                        <select class="form-control" name="providerCode" id="providerCode">
                            <option value="">Select provider </option>
                            @foreach ($agency_contact as $agency_contacte)
                         <option @if($providerCode == $agency_contacte->Agency_ID) selected @endif value="{{ $agency_contacte->Agency_ID }}">{{ $agency_contacte->Agency_ID }}</option>
                            @endforeach
                          </select>
                        @error('providerName') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            <div id="notif"></div>
            </div>
            <hr> 
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group col-sm-auto">
                        <label>Booking Date</label>
                        <input disabled type="text" class="form-control" name="bookingDate" value="{{ $bookingDate }}" placeholder="bookingDate">
                        @error('bookingDate') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group col-sm-auto">
                        <label>Check in Date</label>
                        <input type="text" class="form-control" name="checkinDate" value="{{ $checkinDate }}" placeholder="checkinDate">
                        @error('checkinDate') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group col-sm-auto">
                        <label>check out Date</label>
                        <input type="text" class="form-control" name="checkoutDate" value="{{ $checkoutDate }}" placeholder="checkoutDate">
                        @error('checkoutDate') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group col-sm-auto">
                        <label>HCN_AC</label>
                        <input type="text" class="form-control" name="HCN_AC" value="{{ $HCN_AC }}" placeholder="HCN_AC">
                        @error('HCN_AC') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
              <div id="notif"></div>
           </div>
           <hr>
           @if (Auth::guard()->user()->role==1)
           <div class="row">
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">Select Status </option>
                            <option @if($status =="CN") selected @endif value="CN">Cancelled</option>
                            <option @if($status =="OK") selected @endif value="OK">Confirmed</option>
                            <option @if($status =="UN") selected @endif value="UN">Unknown Status</option>
                            <option @if($status =="CN-FEE") selected @endif value="CN-FEE">Cancelled Whith Fee</option>
                            <option @if($status =="CN-NRF") selected @endif value="CN-NRF">Cancelled Non Refundable</option>
                            <option @if($status =="NO-SHOW") selected @endif value="NO-SHOW">No-Show</option>
                        </select>
                        @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>Cancellation Date</label>
                        <input type="text" class="form-control" name="cancellationDate" value="{{ $cancellationDate }}" placeholder="cancellationDate">
                        @error('cancellationDate') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
             
               <div class="col-sm-4">
                 <div class="form-group col-sm-auto">
                     <label>Cancellation Price</label>
                     <input type="text" class="form-control" name="cancellationPrice_amount" value="{{ $cancellationPrice_amount }}" placeholder="cancellationPrice">
                     @error('cancellationPrice_amount') <span class="text-danger">{{ $message }}</span>@enderror
                 </div>
    
                </div>
               
    
           </div>

           <hr>
    
            <div class="row">
                @php
                $dt =  date("Y-m-d");
                            // $dt=                $dt->format('Y-m-d');
                 @endphp
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <input type="hidden" name="sellingPrice_currency" id="sellingPrice_currency" value="{{ $sellingPrice_currency }}"  >
                        <label>Selling Price <span>:{{ $sellingPrice_currency }}</span></label>
                        <input type="text" class="form-control" id="sellingPrice_amount{{$tgx}}" name="sellingPrice_amount" value="{{ $sellingPrice_amount }}"   placeholder="sellingPrice" onkeyup='setValue("{{$tgx}}");'>
                        @error('sellingPrice_amount') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>S.P.Exchange Rate</label>
                        @if ($dt>= $checkoutDate)
                        <input type="text" class="form-control"  name="un_pr_selling_exchangeRate" id="un_pr_selling_exchangeRate{{$tgx}}"  value="{{$quoteSelling_checkout}}"  onkeyup='setValue("{{$tgx}}");'>
                        @else
                        <input type="text" class="form-control"  name="un_pr_selling_exchangeRate"  id="un_pr_selling_exchangeRate{{$tgx}}" value="{{ $quoteSelling_booking }}"  onkeyup='setValue("{{$tgx}}");' >
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>UN-Selling Price</label>
                      
                        <input type="text" class="form-control" name="un_pr_selling_EUR" 
                        id="un_pr_selling_EUR{{$tgx}}" placeholder="Selling EUR" value="{{ $un_pr_selling_EUR }}"  onkeyup='setValue("{{$tgx}}");'>
                       
                        @error('un_pr_selling_EUR') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @if($sellingPrice_binding == 1)
            <div class="row">
                @php
                $dt =  date("Y-m-d");
                            // $dt=                $dt->format('Y-m-d');
                 @endphp
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <input type="hidden" name="sellingPrice_currency" id="sellingPrice_currency" value="{{ $sellingPrice_currency }}"  >
                        <label>Selling BAR Rate <span>:{{ $sellingPrice_currency }}</span></label>
                        <input type="text" class="form-control" id="sellingPrice_amount{{$tgx}}" name="sellingPrice_amount" value="{{ $sellingPrice_amount }}"   placeholder="sellingPrice" onkeyup='setValue("{{$tgx}}");'>
                        @error('sellingPrice_amount') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>Commission</label>
                      
                        <input type="text" class="form-control"  name="sellingPrice_commission"
                         id="sellingPrice_commission{{$tgx}}" 
                        value="{{ $sellingPrice_commission }}"  onkeyup='setValue("{{$tgx}}");' >
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>Selling Net Rate</label>
                      
                        <input type="text" class="form-control" name="sellingPrice_amount_binding" 
                        id="sellingPrice_amount_binding{{$tgx}}" placeholder="Selling EUR" value="{{ $sellingPrice_amount_binding }}"  onkeyup='setValue("{{$tgx}}");'>
                       
                        @error('sellingPrice_amount_binding') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            @endif
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <input type="hidden" name="providerPrice_currency" value="{{ $providerPrice_currency }}"  >
                        <label>Provider Price <span>:{{ $providerPrice_currency }}</span></label>
                        <input type="text" id="providerPrice_amount{{$tgx}}" class="form-control" name="providerPrice_amount" value="{{ $providerPrice_amount }}"   placeholder="providerPrice" onkeyup='setValue("{{$tgx}}");'>
                        @error('providerPrice_amount') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
              </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>P.P.Exchange Rate</label>
                       
                        
                        @if ($dt>= $checkoutDate)
                     <input type="text" class="form-control" name="un_pr_purchasing_exchangeRate" 
                     id="un_pr_purchasing_exchangeRate{{$tgx}}"value="{{ $quotePurchasing_checkout }}"   >
                        @else
                        <input type="text" class="form-control" name="un_pr_purchasing_exchangeRate" 
                     id="un_pr_purchasing_exchangeRate{{$tgx}}" value="{{ $quotePurchasing_booking }}"   >
                        @endif
                    </div>
                    {{-- onkeyup='setValue("{{$tgx}}");' --}}
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>UN-Provider Price</label>
                        <input type="text" class="form-control" id="un_pr_purchasing_EUR{{$tgx}}" name="un_pr_purchasing_EUR" value="{{ $un_pr_purchasing_EUR }}" placeholder="Provider EUR" onkeyup='setValue("{{$tgx}}");'>
                        @error('un_pr_purchasing_EUR') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
           </div>
              @if($providerPrice_binding == 1)
           <div class="row">
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <input type="hidden" name="providerPrice_currency" value="{{ $providerPrice_currency }}"  >
                        <label>Provider BAR Rate <span>:{{ $providerPrice_currency }}</span></label>
                        <input type="text" id="providerPrice_amount{{$tgx}}" class="form-control" name="providerPrice_amount" value="{{ $providerPrice_amount }}"   placeholder="providerPrice" onkeyup='setValue("{{$tgx}}");'>
                        @error('providerPrice_amount') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
              </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>Commission</label>
                       
                        
                        
                        <input type="text" class="form-control" name="providerPrice_commission" 
                     id="providerPrice_commission{{$tgx}}" value="{{ $providerPrice_commission }}"   >
                        
                    </div>
                 
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-auto">
                        <label>Provider Net Rate</label>
                        <input type="text" class="form-control" id="providerPrice_amount_binding{{$tgx}}" name="providerPrice_amount_binding" value="{{ $providerPrice_amount_binding }}" placeholder="Provider EUR" onkeyup='setValue("{{$tgx}}");'>
                        @error('providerPrice_amount_binding') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
           </div>
           @endif
           <hr>


           <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group col-sm-auto">
                            <label>Marge</label>
                            <input readonly id="marge{{$tgx}}" class="form-control" name="marge" value="{{ $marge }}"   placeholder="Marge">
                        </div>
                    </div>
                   <div class="col-sm-3">
                        <div class="form-group col-sm-auto">
                            <label for="Commission_bdsc">Comission BDSC</label>
        
        
                            <div class="input-group mb-4">
                                <input readonly class="form-control" aria-label="Default" aria-describedby="currency2" id="Commission_bdsc{{$tgx}}" name="Commission_bdsc" value="{{ number_format($Commission_bdsc * 100, 2, '.', ' ') }}" placeholder="Commission_bdsc">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="currency2" >%</span>
                                </div>
                           </div>
                        </div>
                    </div>
                   <div class="col-sm-3">
                        <div class="form-group col-sm-auto">
                            <label>Nights Count</label>
                            <input readonly class="form-control" id="nights_count{{$tgx}}" name="nights_count" value="{{$nights_count}}"  >
                        </div>
                   </div>
                   <div class="col-sm-3">
                        <div class="form-group col-sm-auto">
                            <label>Price per Night</label>
                            <input readonly class="form-control" id="price_per_night" name="price_per_night" value="{{ $price_per_night }}" placeholder="price_per_night">
                        </div>
                   </div>
   
           </div>
              @if($sellingPrice_binding == 1 && $providerPrice_binding == 1)
                <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group col-sm-auto">
                                    <label>Marge  </label>
                                    <input readonly id="marge_binding{{$tgx}}" class="form-control" name="marge" value="{{ $marge_binding }}"   placeholder="marge binding">
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group col-sm-auto">
                                    <label for="Commission_bdsc">Comission  </label>
            
                
                                    <div class="input-group mb-4">
                                        <input readonly class="form-control" aria-label="Default" aria-describedby="currency2" id="commission_bdsc_binding{{$tgx}}" name="commission_bdsc_binding" value="{{ number_format($commission_bdsc_binding * 100, 2, '.', ' ') }}" placeholder="Commission_bdsc">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="currency2" >%</span>
                                        </div>
                                </div>
                                </div>
                            </div>
        
                </div>
                @endif
           @endif
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" id="copy">Enregistre</button>

            </div>
            
        </div>
    </form>
    </div>
</div>
</div>
 @php
// if($sellingPrice_currency == 'EUR'){
//         $diffrent = 1 ;
//     }elseif($sellingPrice_currency == 'USD'){
//         $diffrent = 0.8285690612312536249896428867;                                
//     }elseif($sellingPrice_currency == 'MAD'){
//         $diffrent = 0.0952380952380952380952380952 ;
//     }

//     if($providerPrice_currency == 'EUR'){
//         $diffrent2 = 1 ;
//     }elseif($providerPrice_currency == 'USD'){
//         $diffrent2 = 0.8285690612312536249896428867;                                
//     }elseif($providerPrice_currency == 'MAD'){
//         $diffrent2 = 0.0952380952380952380952380952 ;
//     }

@endphp 
<script type="text/javascript">


function setValue(id){
   
    // alert(document.getElementById("sellingPrice_amount"+id).value);

    if(document.getElementById("providerPrice_amount"+id).value > 0){
        document.getElementById("un_pr_selling_EUR"+id).value = document.getElementById("sellingPrice_amount"+id).value * document.getElementById("un_pr_selling_exchangeRate"+id).value ;    // set the value to this input 
        document.getElementById("un_pr_purchasing_EUR"+id).value = document.getElementById("providerPrice_amount"+id).value * document.getElementById("un_pr_purchasing_exchangeRate"+id).value ;    // set the value to this input 
       var marge_001=  document.getElementById("un_pr_selling_EUR"+id).value - document.getElementById("un_pr_purchasing_EUR"+id).value;    // set the value to this input 
        document.getElementById("marge"+id).value =marge_001.toFixed(2);
       
        var bdsc = (document.getElementById("un_pr_selling_EUR"+id).value - document.getElementById("un_pr_purchasing_EUR"+id).value)/document.getElementById("un_pr_purchasing_EUR"+id).value;    // set the value to this input 
        document.getElementById("Commission_bdsc"+id).value = (bdsc*100).toFixed(2);
        
    } else {

        document.getElementById("un_pr_selling_EUR"+id).value = document.getElementById("sellingPrice_amount"+id).value * document.getElementById("un_pr_selling_exchangeRate"+id).value ;    // set the value to this input 
        document.getElementById("un_pr_purchasing_EUR"+id).value = document.getElementById("providerPrice_amount"+id).value * document.getElementById("un_pr_purchasing_exchangeRate"+id).value ;    // set the value to this input 
    

        document.getElementById("marge"+id).value = 0 ;    // set the value to this input 
        document.getElementById("Commission_bdsc"+id).value = 0;
        document.getElementById("price_per_night"+id).value = 0;    // set the value to this input 

    }


}

              </script> 