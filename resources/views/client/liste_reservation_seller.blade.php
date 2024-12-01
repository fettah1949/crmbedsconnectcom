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

            $category_name = 'production';
            $page_name = 'reservation_seller';
            $has_scrollspy = 0;
            $scrollspy_offset = '';

?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    

@extends('layouts.app')
@section('content')
 <!--  BEGIN NAVBAR  -->
 {{-- <div class="header-container fixed-top"> --}}
    {{-- <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a>
                    <img src="{{asset('storage/img/90x90.jpg')}}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a  class=""> {{ Auth::guard('Client_seller')->user()->name }} </a>
            </li>
             
                
            

     
        </ul>

   


    </header> --}}
{{-- </div> --}}
<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a >
                    <img src="{{asset('storage/img/90x90.jpg')}}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a class="nav-link"> {{ Auth::guard('Client_seller')->user()->name }} </a>
            </li>
        </ul>



        <ul class="navbar-item flex-row ml-md-auto">
            @if ($category_name != 'starter_kits')
   

        
            @endif
            
            <li class="nav-item dropdown user-profile-dropdown">
                <a style="color: red" href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{asset('storage/img/90x90.jpg')}}" alt="avatar">  Sign Out
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        
                  
                        <div class="dropdown-item">
                            <a href="{{ route('logout_seller') }}" 
                        ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                        </div>
                        
                    </div>
                </div>
            </li>

        </ul> 
    </header>
</div>
<!--  END NAVBAR  -->


<div style="margin-left: -218px !important;" class="widget-content widget-content-area br-6">
                    <!-- {{-- Filter Tab --}} -->
                @include('reservation.tab-filter',['filter'=>$filter,'type'=>'Client'])
                <!-- {{-- End filter Tab --}} -->

 </div>
 
 

<br>
    <div style="margin-left: -218px !important;" class="main-container widget-content widget-content-area br-6" id="container">

            

        

       
                
                
                            {{-- <table id="zero-config" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center " >Status</th>
                                        
                                            <th>File number</th>
                                            <th>Hotel</th> 
                                            <th>Agent Name</th>
                                            
                                            <th>HCN</th>
                                        
                                            <th class="mt ">Booking_Date</th>
                                            <th>Check_In_Date</th>
                                            <th>Check_Out_Date</th>
                                             
                                    </tr>
                                </thead>
                                <tbody >
                            
                        
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
                                        <td class='provider' reservation-provider = '{{ $row["provider_h"] }}'>{{ $row["provider_h"] }}</td>
                                        <td class='hotelCode' reservation-hotelCode = '{{ $row["Hotel_Name"] }}'>{{ $row["Hotel_Name"] }}</td>
                                        <td class='client' reservation-client = '{{ $row["Client_id"] }}'></td>
                                        <td class='providerName' style="display:none" reservation-providerName = '{{$row["providerName"]}}'>{{ $row["providerName"] }}</td>
                                        <td class='mainGuestName'  style="display:none" reservation-mainGuestName = '{{$row["mainGuestName"]}}'>{{ $row["mainGuestName"] }}</td>
                                        <td >{{ $row["HCN_AC"] }}</td>
                                        @php
                                        $bookingDate = explode(" ", $row["bookingDate"]);
                                        $checkinDate = explode(" ", $row["checkinDate"]);
                                        $checkoutDate = explode(" ", $row["checkoutDate"]);
                            
                                        @endphp
                                        <td class='bookingDate' reservation-bookingDate = '{{date('d-m-Y', strtotime($bookingDate[0]))}}'> {{date('d-m-Y', strtotime($bookingDate[0]))}} {{date('H:s', strtotime($bookingDate[1]))}}</td>
                                        
                                        <td class='checkinDate' reservation-checkinDate = '{{$row["checkinDate"]}}'>{{date('d-m-Y', strtotime($checkinDate[0]))}}</td>
                                        
                                        <td class='checkoutDate' reservation-checkoutDate = '{{$row["checkoutDate"]}}'>{{date('d-m-Y', strtotime($checkoutDate[0]))}}</td>
                                        
                                       
                                        
                                        
                                          
                                    </tr>
                        
                                    @endforeach 
                                </tbody>
                            </table> --}}


                            <table id="default-ordering" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                          <th class="text-center" >Status</th>
                                        
                                            <th>BOOKING_ID</th>
                                            <!--<th>File number</th>-->
                                            <th>Hotel</th> 
                                            <th>Client id</th>
                                            
                                            <th>HCN</th>
                                        
                                            <th class="">Booking Date</th>
                                            <th>Check_In Date</th>
                                            <th>Check_Out Date</th>
                                            <th>SELLING PRICE</th>
                                            <th></th>
                                             
                                    </tr>
                                </thead>
                                <tbody >
                              
                        
                             {{-- {{'ffff'. $Reservations[0]->provider_h  }} --}}
                                    @foreach($Reservations as $row)
                                    {{-- {{ $row }} --}}
                                    <tr class='' >
                                        {{-- <td class='checkbox-column'  ></td>               {{ getBadge($row["status"]) }}              --}}
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
                                        <td class='provider' reservation-provider = '{{ $row["tgx"] }}'>{{ $row["tgx"] }}</td>
                                        <!--<td class='provider' reservation-provider = '{{ $row["provider"] }}'>{{ $row["provider"] }}</td>-->
                                        <td class='hotelCode' reservation-hotelCode = '{{ $row["Hotel_Name"] }}'>{{ $row["Hotel_Name"] }}</td>
                                        <td class='client' reservation-client = '{{ $row["Client_id"] }}'>{{$row["Client_id"]}}</td>
                                        <td >{{ $row["HCN_AC"] }}</td>
                                        @php
                                        $bookingDate = explode(" ", $row["bookingDate"]);
                                        $checkinDate = explode(" ", $row["checkinDate"]);
                                        $checkoutDate = explode(" ", $row["checkoutDate"]);
                               
                                        @endphp
                                        <td class='bookingDate' reservation-bookingDate = '{{date('Y-m-d', strtotime($bookingDate[0]))}}'> {{date('Y-m-d', strtotime($bookingDate[0]))}} {{date('H:s', strtotime($bookingDate[1]))}}</td>
                                        
                                        <td class='checkinDate' reservation-checkinDate = '{{$row["checkinDate"]}}'>{{$row["checkinDate"]}}</td>
                                        
                                        <td class='checkoutDate' reservation-checkoutDate = '{{$row["checkoutDate"]}}'>{{date('Y-m-d', strtotime($checkoutDate[0]))}}</td>
                                        <td class='provider' reservation-provider = '{{ $row["sellingPrice_amount"] }}'>{{ $row["sellingPrice_amount"] }}</td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <!--<button type="button" class="btn btn-success btn-sm">Confirm</button>-->
                                                <!--<button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">-->
                                                <!--    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>-->
                                                <!--</button>-->
                                                <!--<div class="dropdown-menu" aria-labelledby="dropdownMenuReference3">-->
                                                <!--    <a class="dropdown-item" data-toggle="modal" data-target="#edit_reservation-{{$row["tgx"]}}" target="_blank">-->
                                                <!--        Edit-->
                                                <!--        <svg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>-->
                                                <!--        <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg></a>-->
                                                    
                                                      
                                                <!--    <div class="dropdown-divider"></div>-->
                                                <!--    <a class="dropdown-item"  data-toggle="modal" data-target="#Note_reservation-{{$row["tgx"]}}" target="_blank">-->
                                                <!--        Note-->
                                                <!--        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#1b55e2 " stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>-->

                                                <!--    </a>-->
                                                  
                                              
                                                <!--</div>-->
                                                 <button type="button" data-target="#detail_reservation"  onclick="getDetailAjax('{{$row["tgx"]}}')" data-toggle="modal"  style="font-size: 9px;" class="btn btn-secondary  btn-sm" >Détail</button>

                                            </div>

                                        </td>
                                 
                                      
                                    </tr>
                                    @include('client.pop_up.pop_up_Note_seller',['tgx'=>$row["tgx"],'provider_01'=>$row["provider"],'Note'=>$row["Note"]])
                                    @include('client.pop_up.pop_up_edit_reservation_seller',['tgx'=>$row["tgx"],'provider_01'=>$row["provider"]])
    
                                    @endforeach 
                                    
                                     @include('reservation.pop_up.pop_up_detail_reservation')
                                </tbody>
                            </table>

                    
    </div>
     <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
     <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
     <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
     {{-- <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> --}}
     <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
     <script src="{{asset('assets/js/app.js')}}"></script>
     
     <script>
     function rechercheAjax()
{
    // console.log('fettah');
}

function vide()
{


    $('#rangeCalendarFlatpickr').val(null).trigger('change');
    window.document.getElementById('rangeCalendarFlatpickr').selectedIndex = 0;

    $('#date_type').val(null).trigger('change');
    window.document.getElementById('date_type').selectedIndex = 0;

    $('#status').val(null).trigger('change');
    window.document.getElementById('status').selectedIndex = 0;


    $('#Type_code').val(null).trigger('change');
    window.document.getElementById('Type_code').selectedIndex = 0;

    $("#Code").val('');
    $('#Type_message').text("");
    $('#code_message').text("");
    $("#Code").prop('required',false);
    $("#Type_code").prop('required',false);
}


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
      
    
    
     function getDetailAjax($tgx)
    {
          $('#formattedResponse').html("");
                    $('#formattedResponse_1').html("");
                    $('#formattedResponse_Config').html("");
                    $('#formattedResponse_Price_conditions').html("");
                    $('#formattedResponse_Quote').html("");
                    $('#formattedResponse_Pricing').html("");
                    $('#formattedResponse_Rooms').html("");
                     $('#tgx').html(tgx);

        $.ajax({
            type : "GET",
            url : "https://crm.bedsconnect.com/public/getdetail",
            data : {
                "_token" : "{{ csrf_token() }}",
                tgx : $tgx,
                
            },
            success: function(response) {
                    // Handle the response here
                    console.log(response);
                    
                    // Assuming response is an array of data
               var formattedResponse = ''; // Initialize an empty string to store the formatted HTML
               var formattedResponse_1 = ''; // Initialize an empty string to store the formatted HTML
               var formattedResponse_Config = ''; // Initialize an empty string to store the formatted HTML
               var formattedResponse_rooms = ''; // Initialize an empty string to store the formatted HTML
               var formattedResponse_Quote = ''; // Initialize an empty string to store the formatted HTML
               var formattedResponse_Pricing = ''; // Initialize an empty string to store the formatted HTML
               var formattedResponse_Rooms = ''; // Initialize an empty string to store the formatted HTML
               var formattedResponse_Price_conditions = ''; // Initialize an empty string to store the formatted HTML
                              
       
               tgx = response[0]['locators']['tgx'] ;
            ////   formattedResponse += '<tr> <td>  <label > Supplier Locator : </label> ' + response[0]['locators']['provider'] + '</td> </tr>'; // Replace property1 with actual property
               formattedResponse += '<tr> <td>  <label> Agency Locator : </label> ' + response[0]['locators']['client'] + '</td> </tr>'; // Replace property1 with actual property
               if(typeof response[0]['correlationID'] !== 'undefined' )
               formattedResponse += '<tr> <td>  <label> CorrelationID : </label> ' + response[0]['correlationID'] + '</td> </tr>'; // Replace property1 with actual property

               formattedResponse_1 += '<tr> <td>  <label> Status :</label> ' + response[0]['status'] + '</td> </tr>'; // Replace property1 with actual property
               formattedResponse_1 += '<tr> <td>  <label> Booking Date : </label> ' + response[0]['bookingDate'] + '</td> </tr>'; // Replace property1 with actual property
               if(typeof response[0]['cancellationDate'] !== 'undefined' )
               formattedResponse_1 += '<tr> <td>  <label> cancellation Date : </label> ' + response[0]['cancellationDate'] + '</td> </tr>'; // Replace property1 with actual property
            //   if(typeof response[0]['clientCode'] !== 'undefined' )
            //   formattedResponse_1 += '<tr> <td>  <label> Agency : </label> '+ response[0]['clientName'] +'</td> </tr>'; // Replace property1 with actual property
            //   if(typeof response[0]['providerCode'] !== 'undefined' )
            //   formattedResponse_1 += '<tr> <td>  <label> Supplier : </label> (' + response[0]['providerCode']+ ')'+response[0]['providerName'] +'</td> </tr>'; // Replace property1 with actual property
            //   if(typeof response[0]['accessCodeHX'] !== 'undefined' )
            //   formattedResponse_1 += '<tr> <td>  <label> Status  :</label> ' + response[0]['accessCodeHX'] + '</td> </tr>'; // Replace property1 with actual property
                var hotelName ='';
                if(typeof response[0]['hotelName'] !== 'undefined' )
                hotelName = response[0]['hotelName'] ;
                
               formattedResponse_Config += '<tr> <td>  <label> Hotel  :</label> (' + response[0]['hotelCode'] + ') '+ hotelName + '</td> </tr>'; // Replace property1 with actual property
               formattedResponse_Config += '<tr> <td>  <label> Check-in Date  :</label> ' + response[0]['checkinDate'] + '</td> </tr>'; // Replace property1 with actual property
               formattedResponse_Config += '<tr> <td>  <label> Check-out Date : </label> ' + response[0]['checkoutDate']+ '</td> </tr>'; // Replace property1 with actual property
               formattedResponse_Config += '<tr> <td>  <label> Meal Plan : </label> (' + response[0]['mealPlanCode']+ ') '+response[0]['mealPlanName'] +'</td> </tr>'; // Replace property1 with actual property
               formattedResponse_Config += '<tr> <td>  <label> Market  :</label> ' + response[0]['market'] + '</td> </tr>'; // Replace property1 with actual property
               formattedResponse_Config += '<tr> <td>  <label> Nationality  :</label> ' + response[0]['nationality'] + '</td> </tr>'; // Replace property1 with actual property
               if(typeof response[0]['responseRemarks'] !== 'undefined' )
               formattedResponse_Config += '<tr> <td>  <label> Response Remarks (response) : </label> ' + response[0]['responseRemarks'] + '</td> </tr>'; // Replace property1 with actual property
               if(typeof response[0]['requestRemarks'] !== 'undefined' )
               formattedResponse_Config += '<tr> <td>  <label> User Remarks (response) : </label> ' + response[0]['requestRemarks'] + '</td> </tr>'; // Replace property1 with actual property


               formattedResponse_Price_conditions += '<tr> <td>  <label> Payment Type  :</label> ' + response[0]['paymentInfo']['paymentTypeProvider'] + '</td> </tr>'; // Replace property1 with actual property
               if(typeof response[0]['cancellationPrice'] !== 'undefined' )
               formattedResponse_Price_conditions += '<tr> <td>  <label> Cancellation Price :</label> ' + response[0]['cancellationPrice']['amount'] +' '+ response[0]['cancellationPrice']['currency'] +'</td> </tr>'; // Replace property1 with actual property
               if(typeof response[0]['sellingPrice'] !== 'undefined' )
               formattedResponse_Price_conditions += '<tr> <td>  <label> Selling Price : </label> ' + response[0]['sellingPrice']['amount']+ ' ' +response[0]['sellingPrice']['currency']+' / Binding='+ response[0]['sellingPrice']['binding']+ ' / Commission='+ response[0]['sellingPrice']['commission']+ '</td> </tr>'; // Replace property1 with actual property
            //   if(typeof response[0]['providerPrice'] !== 'undefined' )
            //   formattedResponse_Price_conditions += '<tr> <td>  <label> Provider Price  :</label> ' + response[0]['providerPrice']['amount']+ ' ' +response[0]['providerPrice']['currency']+' / Binding='+ response[0]['providerPrice']['binding']+ ' / Commission='+ response[0]['providerPrice']['commission']+ '</td> </tr>'; // Replace property1 with actual property
            //   if(typeof response[0]['providerPrice'] !== 'undefined' )
            //   formattedResponse_Price_conditions += '<tr> <td>  <label> Currency Exchange : </label>  ' + response[0]['providerPrice']['currency']+ ' </td> </tr>'; // Replace property1 with actual property
              
               formattedResponse_Quote += '<tr> <td>  <label> Selling Price : </label> ' + response[0]['quoteSellingPrice']['amount']+ ' ' +response[0]['quoteSellingPrice']['currency']+' / Binding='+ response[0]['quoteSellingPrice']['binding']+ ' / Commission='+ response[0]['quoteSellingPrice']['commission']+ '</td> </tr>'; // Replace property1 with actual property
            //   formattedResponse_Quote += '<tr> <td>  <label> Provider Price : </label> ' + response[0]['quoteProviderPrice']['amount']+ ' ' +response[0]['quoteProviderPrice']['currency']+' / Binding='+ response[0]['quoteProviderPrice']['binding']+ ' / Commission='+ response[0]['quoteProviderPrice']['commission']+ '</td> </tr>'; // Replace property1 with actual property
               formattedResponse_Quote += '<tr> <td>  <label> Currency Exchange : </label>  ' + response[0]['quoteProviderPrice']['currency']+ '  </td> </tr>'; // Replace property1 with actual property
               if(response[0]['quoteNonRefundable'] == false)
               $quoteNonRefundable = 'Refundable';
               else
               $quoteNonRefundable = 'Non Refundable';
   
                $seling_cencel_pena = $quoteNonRefundable;
                for (var i = 0; i < response[0]['quoteCancelPenalties'].length; i++) {
                    $seling_cencel_pena +=' ';
                    $seling_cencel_pena +='/ '+ response[0]['quoteCancelPenalties'][i]['hoursBefore']+' hours Before = '+ response[0]['quoteCancelPenalties'][i]['value']+' '+response[0]['quoteCancelPenalties'][i]['currency'];

                }
        
               formattedResponse_Quote += '<tr> <td>  <label> Selling cencel Penalties  </label>  '+$seling_cencel_pena+'  </td> </tr>'; // Replace property1 with actual property
               if(response[0]['quoteProviderNonRefundable'] == false)
               $quoteProviderNonRefundable = 'Refundable';
               else
               $quoteProviderNonRefundable = 'Non Refundable';
        
                $Provider_cencel_pena = $quoteProviderNonRefundable;
                for (var i = 0; i < response[0]['quoteProviderCancelPenalties'].length; i++) {
                    $Provider_cencel_pena +=' ';
                    $Provider_cencel_pena +='/ '+ response[0]['quoteProviderCancelPenalties'][i]['hoursBefore']+' hours Before = '+ response[0]['quoteProviderCancelPenalties'][i]['value']+' '+response[0]['quoteProviderCancelPenalties'][i]['currency'];

                }
            //   formattedResponse_Quote += '<tr> <td>  <label> Purchasing cencel Penalties  </label>  '+$Provider_cencel_pena+'  </td> </tr>'; // Replace property1 with actual property
               $market ='';
           
               if(response[0]['priceBreakdown']['comissionMarkupType'] == "M") $market = 'Market';
               else if(response[0]['priceBreakdown']['comissionMarkupType'] == "C") $market = 'Commission';
            //   formattedResponse_Pricing += '<tr> <td>  <label> Type : </label> ' + $market + '</td> </tr>'; // Replace property1 with actual property
            //   formattedResponse_Pricing += '<tr> <td>  <label> Final Markup  :</label> ' + response[0]['priceBreakdown']['totalComission'] + ' %</td> </tr>'; // Replace property1 with actual property
            //   formattedResponse_Pricing += '<tr> <td>  <label> Tax : </label> ' + response[0]['priceBreakdown']['tax'] + ' %</td> </tr>'; // Replace property1 with actual property
            //   formattedResponse_Pricing += '<tr> <td>  <label> Breakdown :</label>   </td> </tr>'; // Replace property1 with actual property
            //   formattedResponse_Pricing += '<tr> <td>  <label> Base Markup  :</label> ' + response[0]['priceBreakdown']['baseComission'] + ' %</td> </tr>'; // Replace property1 with actual property
            //   formattedResponse_Pricing += '<tr> <td>  <label> Base Rappel  :</label> ' + response[0]['priceBreakdown']['baseRappel'] + ' %</td> </tr>'; // Replace property1 with actual property
            //   formattedResponse_Pricing += '<tr> <td>  <label> Selling Pricing Rules : Total : </label> ' + response[0]['priceBreakdown']['rulesComission'] + ' %</td> </tr>'; // Replace property1 with actual property


               formattedResponse_Rooms += '<tr> <td>  <label> main Guest Name  :</label> ' + response[0]['mainGuestName'] + '</td> </tr>'; // Replace property1 with actual property

            

            // // Loop through the response array and create HTML rows
                     var fettah = [];
                     
                      if(typeof response[0]['rooms'] !== 'undefined' ){
                        
                             for (var i = 0; i < response[0]['rooms'].length; i++) {
                      
                                $inc = i +1;
                                formattedResponse_Rooms += '<tr> <td>  <label> Room N° '+ $inc +' : </label> (' + response[0]['rooms'][i].code +') '+response[0]['rooms'][i].description+' / Num pax : '+response[0]['rooms'][i].pax.length +'</td> </tr>'; // Replace property1 with actual property
        
        
                            }
                      }
                   
                    
                    $('#formattedResponse').html(formattedResponse);
                    $('#formattedResponse_1').html(formattedResponse_1);
                    $('#formattedResponse_Config').html(formattedResponse_Config);
                    $('#formattedResponse_Price_conditions').html(formattedResponse_Price_conditions);
                    $('#formattedResponse_Quote').html(formattedResponse_Quote);
                    $('#formattedResponse_Pricing').html(formattedResponse_Pricing);
                    $('#formattedResponse_Rooms').html(formattedResponse_Rooms);
                    $('#Pricing_id').hide();
                     $('#tgx').html(tgx);
            }


            
                    
                
            
        })
    }
    
    
         $(document).ready(function() {
             App.init();
         });
     </script>
    <script src="{{asset('plugins/table/datatable/datatables01.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script>        
        $('#default-ordering').DataTable( {
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
            //    "sLengthMenu": "Results :  _MENU_",
            },
            "order": [[ 5, "DESC" ]],
            // "order": [13, "DESC" ],
            "orderable": true,
            "searchable": true,
                // 'aaSorting'   : [[4, 'DESC']],
            // "stripeClasses": [],
            "lengthMenu": [50,100, 200, 300, 400],
            "pageLength": 20,
            drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered'); }
	    } );
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
		font-family: "Gloria Hallelujah", cursive;
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
		



	</style>
  
    @endsection
