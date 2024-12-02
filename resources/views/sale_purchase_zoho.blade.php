<?php
function getBadge($var){
    switch($var){
        case "CN":
            return "badge-danger";
        case "OK":
            return "badge-success";
        case "CK":
            return "badge-secondary";
        case "KUN":
            return "badge-secondary";
        case "CN-FEE":
            return "badge-info";
        case "CN-NRF":
            return "badge-primary";
        case "NO-SHOW":
            return "badge-dark";

        // invoice status badge

        case "Invoiced":
            return "badge-success";
        case "Refund":
            return "badge-danger";
        case "Due":
            return "badge-secondary";
            

        // Payment status badge

        case "Payed":
            return "badge-success";
        case "Not-Payed":
            return "badge-danger";



    }
}

          $category_name = 'invoicing';
  $page_name = 'invoicing_sale';
  $has_scrollspy = 0;
  $scrollspy_offset = '';

?>

@extends('layouts.app')
 
@section('content')


<br>


<!-- {{-- states --}} -->

<!-- {{-- states --}} -->

<!-- {{-- States table ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}} -->

@if (Auth::guard()->user()->role==1)
    <div class="widget-content widget-content-area br-6 text-center">
        
     
                  
                        <div class="widget-content widget-content-area br-6 text-center" style="box-shadow: none;margin-top:-10">
                     
                        <form method="get" action="{{ route('redirectToZoho_purchase') }}" >
                             @csrf
                             <!--<input type="hidden" id="data_reservation" name="data_reservation" value="{{$Reservations}}">-->
                        <button type="submit"   class="btn btn-outline-success mb-2">Get New access ff</button>
                        </form>
                        <form method="post" action="{{ route('getAccessToken_purchase') }}" >
                             @csrf
                             <input type="hidden" id="data_reservation" name="data_reservation" value="{{$Reservations}}">
                             <input type="hidden" id="code" name="code" value>
                        <button type="submit"  class="btn btn-outline-success mb-2">Send In Zoho</button>
                          </form>
                    
                            <a   type="button" style="margin: 5px" class="btn btn-outline-primary col-sm-full" >
                                <h6>Turn_Over</h6> <hr style="margin-top: 5px; margin-bottom: 10px"> 
                                <span  class='shadow-none badge badge-success '>{{$res_state["t_un_sell"]}}   €</span> <span style="margin-left:10px;"  class='shadow-none badge badge-danger'> {{$res_state["t_un_purshase"]}}   €</span>
                            </a>
                        
                        
                          
                        </div>    
    </div>
@endif
<br>

<!-- {{-- States ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}} -->

 
    <div class="widget-content widget-content-area br-6">

<!--
        <div  style="width: 100%" >
            <a  style="width: 100%"  href="#filter" data-active="false" data-toggle="collapse" aria-expanded="false" class="btn btn-outline-success mb-2">
                <div style="float: left;margin-left:10px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    <span >Filter</span>
                </div>
            </a>
            <ul class="submenu list-unstyled collapse" id="filter" style="">
                 -->
                    

                    {{-- Filter Tab --}}
                @include('reservation.tab-filter',['filter'=>$filter,'type'=>'sale'])
                {{-- End filter Tab --}}
                
            <!-- </ul>
        </div>-->

    </div>
            




                        
                        
                    



          
                                  
    

 

    <div class="main-container widget-content widget-content-area br-6" id="container">

        
        @php
        $date0 = date("Y-m-d");
        $date = date('Y-m-d', strtotime($date0 . " +7 day"));
        @endphp
    

      
           
<!-- {{-- <div class="widget-content widget-content-area"> --}} -->
    @if (session()->has('status'))
<div style="    background: transparent;" class="alert alert-light-success border-0 mb-4" role="alert"> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
            <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>  {{ session() ->get('status') }} </div>

@endif
                            <table id="html5-extension" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center " >Status  </th>
                                            <th>Booking_ID </th>
                                            <th>BDC_ID   </th>
                                            <th>Hotel</th> 
                                            <th style="display:none">Code Hotel</th> 
                                            <th>Client_ID</th>
                                            <th style="display:none">Provider_Name</th>
                                            <th style="display:none">Gust name</th>
                                            <th style="display:none">Invoice Date</th>
                                            <th style="display:none">Invoice Number</th>
                                            <th>HCN_AC</th>
                                            <th>Agent name</th>
                                            <th>Agency</th>
                                            <th  >Booking_Date</th>
                                            <th>Check_In_Date</th>
                                            <th>Check_Out_Date</th>
                                            @if (Auth::guard()->user()->role==1)
                                            <th>Selling_Price</th>
                                            
                                            <th>Marge</th>
                                            @endif
                                            <th style="display:none">Currency Code</th>
                                            <th style="display:none">VAT</th>
                                            <th style="display:none">Exchance Rate</th>
                                            <th style="display:none">Provider Price</th>
                                            <th style="display:none">Currency Code</th>
                                            <th style="display:none">Exchance Rate</th>
                                             <th style="display:none">Selling_Price</th>
                                             
                                            {{-- <th style="display:none">Purchasing_Price</th>
                                            <th style="display:none">Cancelation_Date</th>
                                            <th style="display:none">Cancelation_Price</th>
                                            <th style="display:none">Invoice_Seller</th>
                                            <th style="display:none">Invoice_Buyer</th>
                                            <th style="display:none">Payment_Status</th> --}}

                                            <!-- <th class="text-center dt-no-sorting" >Action</th> -->
                                            <th  style="display:none">Booking_ID </th>
                                                
                                        </tr>
                                </thead>
                                <tbody id="data_reservation_tbody">
                              
                        
                                    @foreach($Reservations as $row)
       
                                    <tr class='res_tab' >
                                        <td class='text-center'><span class='shadow-none badge   '>

                                            {{ $row["status"] }}
                                            @if($row["status"]=='CN')
                                            <div class="t-dot bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="High"></div>
                                            @elseif($row["status"]=='OK')
                                            <div class="t-dot bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="High"></div>
                                            @elseif($row["status"]=='CK')
                                            <div class="t-dot bg-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="High"></div>
                                            @elseif($row["status"]=='KUN')
                                            <div class="t-dot bg-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="High"></div>
                                            @elseif($row["status"]=='NO-SHOW')
                                            <div class="t-dot " data-toggle="tooltip" data-placement="top" title="" data-original-title="High"></div>

                                            @endif


                                        
                                        </span></td>
                                        <td class='tgx' reservation-tgx = '{{$row["tgx"]}}' > {{$row["tgx"]}} </td>
                                        <td class='provider' reservation-provider = '{{ $row["provider_h"] }}'>|{{$row["provider_h"] }}</td>
                                        <td class='hotelCode' reservation-hotelCode = '{{ $row["Hotel_Name"] }}'>{{ $row["Hotel_Name"] }}</td>
                                        <td style="display:none" >{{ $row["hotelCode"] }}</td>
                                        <td class='client' reservation-client = '{{ $row["client"] }}'>{{ $row["client"] }}</td>
                                        <td class='providerName' style="display:none" reservation-providerName = '{{$row["providerName"]}}'>{{ $row["providerName"] }}</td>
                                        <td class='mainGuestName'  style="display:none" reservation-mainGuestName = '{{$row["mainGuestName"]}}'>{{ $row["mainGuestName"] }}</td>
                                        <td class='Invoice_Date'  style="display:none" ></td>
                                        <td class='Invoice_Number'  style="display:none" ></td>
                                        <td >{{ $row["HCN_AC"] }}</td>
                                        <td >{{ $row["Agent_name"] }}</td>
                                        <td class='clientCode' reservation-mainGuestName = '{{$row["clientCode"]}}'>{{ $row["clientCode"] }}</td>
                                        @php
                                        $bookingDate = explode(" ", $row["bookingDate"]);
                                        $checkinDate = explode(" ", $row["checkinDate"]);
                                        $checkoutDate = explode(" ", $row["checkoutDate"]);
                               
                                        @endphp
                                        <td class='bookingDate' reservation-bookingDate = '{{$row["bookingDate"]}}'> {{date('Y-m-d', strtotime($bookingDate[0]))}} {{date('H:m', strtotime($bookingDate[1]))}}</td>
                                        
                                        <td class='checkinDate' reservation-checkinDate = '{{$row["checkinDate"]}}'>{{date('d-m-Y', strtotime($checkinDate[0]))}}</td>
                                        
                                        <td class='checkoutDate' reservation-checkoutDate = '{{$row["checkoutDate"]}}'>{{date('d-m-Y', strtotime($checkoutDate[0]))}}</td>
                                        @if (Auth::guard()->user()->role==1)
                                        <td class='sellingPrice_amount' reservation-sellingPrice_amount = '{{$row["sellingPrice_amount"]}}'>
                                            <span style="float: left">{{ $row["sellingPrice_amount"] }}</span>
                                            <span style="float: left;margin-left:3px;"> 
                                                @if($row["sellingPrice_currency"] == 'EUR') 
                                                
                                                    €
                                                @elseif($row["sellingPrice_currency"] == 'USD')
                                                
                                                    $
                                                @endif
                                            
                                            </span>
                                        </td>
                                        
                                        
                                        <td class="text-center">{{ $row["marge"] }} €</td>
                                        @endif

                                        <td style="display:none">{{ $row["sellingPrice_currency"] }}</td>
                                        <td style="display:none"></td>
                                        <td style="display:none">{{ $row["quoteSelling_booking"] }}</td>
                                        <td style="display:none" >
                                            {{ $row["providerPrice_amount"] }}
                                            
                                        </td>
                                        <td style="display:none">{{ $row["providerPrice_currency"] }}</td>
                                        <td style="display:none">{{ $row["quotePurchasing_booking"] }}</td>
                                        <td style="display:none">{{ $row["sellingPrice_amount"] }} </td>
                                     
                                        <td class='text-center'> 
                                            
                                           
                                           
                                            
                                           
                                            <!-- <div class="btn-group">
                                                <button type="button" data-target="#Confirm{{$row["tgx"]}}"  data-toggle="modal"  style="font-size: 9px;"
                                                
                                                @if(($row["HCN_AC"]!=null || $row["Agent_name"]!=null ) && $row["Etat_Hcn"]==1 )
                                                class="btn btn-success btn-sm"
                                                @elseif (($row["HCN_AC"]==null || $row["Agent_name"]==null ) && $date<=$row["checkinDate"])
                                                class="btn btn-info btn-sm"
                                                @elseif (($row["HCN_AC"]==null || $row["Agent_name"]==null ) && $date0<=$row["checkinDate"] && $date>=$row["checkinDate"])
                                                class="btn btn-warning  btn-sm"
                                                @else
                                                class="btn btn-danger  btn-sm"
                                                @endif
                                                
                                                
                                                
                                                >Confirm HCN</button>

                                               
                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split @if($row["Note"]!=Null) notification @endif" id="dropdownMenuReference3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                               
                                                        @if($row["Note"]!=Null)
                                                        <span class="badge">1</span>
                                                        @endif
                                              
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference3">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#edit_reservation-{{$row["tgx"]}}" target="_blank">
                                                        Edit
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                                                        <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg></a>
                                                    
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#update_innvoice-{{$row["tgx"]}}">
                                                        {{ $row["Payment_Status"] }}
                                                        @if($row["Payment_Status"]=="Payed")
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        @endif
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item @if($row["Note"]!=Null) btn-success @endif" data-toggle="modal" data-target="#Note_reservation-{{$row["tgx"]}}" target="_blank">
                                                        Note
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#1b55e2 " stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>

                                                    </a>
                                                  
                                                  
                                                </div>
                                            </div> -->
                                        </td>
                                        <td class='bookingDate' style="display:none"  reservation-bookingDate = '{{date('Y-m-d', strtotime($bookingDate[0]))}}'> {{date('Y-m-d', strtotime($bookingDate[0]))}} </td>
                                    </tr>
                                    

                             
                                    <!-- <div class="modal fade" id="Confirm{{$row["tgx"]}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel2">{{$row["tgx"]}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               
                                                    @if($row["Etat_Hcn"]==1) 
                                                    La reservation est validé
                                                    @else

                                                        @if($row["HCN_AC"]!=null || $row["Agent_name"]!=null )
                                                        Voulez-vous confirmer HCN de cette reservation ?
                                                        @else
                                                        Pas de HCN ou Agent name pour confirmer la reservation !
                                                        @endif
                                                        <form id="form_confirme_hcn{{$row["tgx"]}}" action="{{ url("/production/Confirm_HCN")  }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="tgx" value="{{ $row["tgx"] }}">
                                                        
                                                        </form>
                                                    @endif
                                                    <div id="notif"></div>
                                            </div>
                                            <div class="modal-footer">
                                                @if($row["Etat_Hcn"]==0) 
                                                <button type="button" class="btn btn-danger " data-dismiss="modal">Fermer</button>
                                                <button   onclick="event.preventDefault(); document.getElementById('form_confirme_hcn{{$row['tgx']}}').submit();" type="button" class="btn btn-success" 
                                                @if($row["HCN_AC"]==null && $row["Agent_name"]==null) 
                                                disabled
                                                
                                                @endif
                                                
                                                id="enregister">Enregister</button>
                                
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                     </div> -->
                                    @endforeach 
                                </tbody>
                            </table>

                   
        <!--  END CONTENT AREA  -->
    </div>


    
<script type="text/javascript">

//   function submitActions() {

// function myFunction()
// {
//     // $("th").removeClass("sorting_asc");
//         alert('ff');
// }
// window.addEventListener('load', (event) => {
//     $("th").removeClass("sorting_asc");
//     $(".mt").addClass("sorting_desc");
// });
    // });
    function check_code()
    {
        //  alert($('#Code').val());
        if($('#Type_code').val()!="" && $('#Code').val()=="")
        {
            $('#code_message').text("merci d'ajouter le code");
            $('#Type_message').text("");
            $("#Code").prop('required',true);

        }
        if($('#Code').val()!="" && $('#Type_code').val()=="")
        {
            $('#code_message').text("");
            $('#Type_message').text("merci d'ajouter le Type de code")
            $("#Type_code").prop('required',true);
        }
        if($('#Code').val()=="" && $('#Type_code').val()=="" )
        {
            $("#Code").prop('required',false);
            $("#Type_code").prop('required',false);
            $('#code_message').text("");
            $('#Type_message').text("");
        }
        if($('#Code').val()!=""  )
        {
            $('#code_message').text("");
            

        }
        if($('#Type_code').val()!="" )
        {
            $('#Type_message').text("");
            

        }
    }
function vide()
{
    // $("#hotel").empty();
    $('#hotel').val(null).trigger('change');
    window.document.getElementById('hotel').selectedIndex = 0;

    $('#rangeCalendarFlatpickr').val(null).trigger('change');
    window.document.getElementById('rangeCalendarFlatpickr').selectedIndex = 0;

    $('#date_type').val(null).trigger('change');
    window.document.getElementById('date_type').selectedIndex = 0;

    $('#status').val(null).trigger('change');
    window.document.getElementById('status').selectedIndex = 0;

    $('#agency').val(null).trigger('change');
    window.document.getElementById('agency').selectedIndex = 0;

    $('#provider').val(null).trigger('change');
    window.document.getElementById('provider').selectedIndex = 0;

    $('#Payment_Status').val(null).trigger('change');
    window.document.getElementById('Payment_Status').selectedIndex = 0;

    $('#Type_code').val(null).trigger('change');
    window.document.getElementById('Type_code').selectedIndex = 0;

    $("#Code").val('');
    $('#Type_message').text("");
    $('#code_message').text("");
    $("#Code").prop('required',false);
    $("#Type_code").prop('required',false);
}
 
    // document.getElementById("start_date").value = <?php echo json_encode($filter["start_date"]); ?>;    // set the value to this input 
    // document.getElementById("end_date").value = <?php echo json_encode($filter["end_date"]); ?>;    // set the value to this input 
    // document.getElementById("rangeCalendarFlatpickr").value =  json_encode($filter["rangeCalendarFlatpickr"]);    // set the value to this input 
    // document.getElementById("date_type").value = <?php echo json_encode($filter["date_type"]); ?>;    // set the value to this input 
    // document.getElementById("status").value = <?php echo json_encode($filter["status"]); ?>;    // set the value to this input 
    //  document.getElementById("hotel").value = <?php echo json_encode(''); ?>;    // set the value to this input 
    // document.getElementById("agency").value = <?php echo json_encode($filter["agency"]); ?>;    // set the value to this input 
    // document.getElementById("provider").value = <?php echo json_encode($filter["provider"]); ?>;   // set the value to this input 
    // document.getElementById("Payment_Status").value = <?php echo json_encode($filter["Payment_Status"]); ?>;   // set the value to this input 

 function rechercheAjax()
    {
        var rangeCalendarFlatpickr = $('#rangeCalendarFlatpickr').val();
        var date_type = $('#date_type').val();
        var Type_code = $('#Type_code').val();
        var status = $('#status').val();
        var hotel = $('#hotel').val();
        var agency = $('#agency').val();
        var provider = $('#provider').val();
        var Payment_Status = $('#Payment_Status').val();
        var Type_code = $('#Type_code').val();
        var Code = $('#Code').val();
    
        // alert('dddddddddddddddddddddddddddd');
        //  var APP_URL = {!!json_encode(url('/'))!!}
        const form = document.getElementById("fs");
        const formData = new FormData(form);
        $.ajax({
            type : "GET",
            url : "https://crm.bedsconnect.com/public/search_sale_ajax",
            data : {
                "_token" : "{{ csrf_token() }}",
                rangeCalendarFlatpickr : rangeCalendarFlatpickr,
                date_type : date_type,
                Type_code : Type_code,
                status : status,
                hotel : hotel,
                agency : agency,
                provider : provider,
                Payment_Status : Payment_Status,
                Code : Code,
                Type_code : Type_code,
            },
            success: function(response) {
                    // Handle the response here
                    // console.log('fettah');
                    // Assuming response is an array of data
                var formattedResponse = ''; // Initialize an empty string to store the formatted HTML

            // Loop through the response array and create HTML rows
            var fettah = [];
            for (var i = 0; i < response.length; i++) {
                var item = response[i];
                formattedResponse += '<tr>';
                formattedResponse += '<td>' + item.status + '</td>'; // Replace property2 with actual property
                formattedResponse += '<td>' + item.tgx + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.provider_h + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.Hotel_Name + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.client + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.HCN_AC + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.Agent_name + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.clientCode + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.bookingDate + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.checkinDate + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.checkoutDate + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.sellingPrice_amount + '</td>'; // Replace property1 with actual property
                formattedResponse += '<td>' + item.marge + '</td>'; // Replace property1 with actual property
                // Add more properties as needed
                formattedResponse += '</tr>';
                fettah[i] = response[i];
            }


            $('#data_reservation_tbody').html(formattedResponse);
                    $('#data_reservation').val(JSON.stringify(fettah));
                    console.log(fettah);
                },
                
            
        })
    }
    const urlParams = new URLSearchParams(window.location.search);
        const authorizationCode = urlParams.get('code');
        // alert(authorizationCode);
        if (authorizationCode) {
            console.log('Authorization Code from URL:', authorizationCode);
          
            
        }
    
        document.getElementById('code').value = authorizationCode;
        
</script>
<style>

    /* NOTE */
    .text p {
    font-family: Comic Sans, helvetica, arial, sans-serif;
    }

    .note {
        /* float: left;
        display: block;
        position: relative; */
        padding: 1em;
        /* width: 574px; */
        min-height: 230px;
        margin: 0 0px 1px 0;
        background: linear-gradient(top, rgba(0,0,0,.05), rgba(0,0,0,.25));
        background-color: #2e2e2e;
        box-shadow: 5px 5px 10px -2px rgba(33,33,33,.3);
        transform: rotate(2deg);
        transform: skew(0deg,0deg);
        transition: transform .15s;
        z-index: 1;

    }
    .note:hover {
    cursor: move;
    }


        textarea {
            color: white;
            background-color: transparent;
            border: none;
            resize: vertical;
            /* font-family: "Gloria Hallelujah", cursive; */
            width: 100%;
        height: 59%;
            padding: 5px;
        font-size: 12pt;
    }

    textarea:focus {
                outline: none;
                border: none;
                box-shadow: 0 0 5px 1px rgba(0,0,0,.2) inset;
    }
    
    .notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
}


</style>

@endsection



          
   


