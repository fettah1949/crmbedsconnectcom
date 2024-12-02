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
            $page_name = 'reservation';
            $has_scrollspy = 0;
            $scrollspy_offset = '';

?>

@extends('layouts.app')
 
@section('content')


<br>


{{-- states --}}

{{-- states --}}

{{-- States table ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}


<div class="widget-content widget-content-area br-6 text-center">
    
    <a type="button" style="margin: 5px" class="btn btn-outline-primary col-sm-full" >
        <h6>ADR</h6><hr style="margin-top: 5px; margin-bottom: 10px"> <span class="badge badge-pills badge-light">{{$res_state["state_nightprice"]}} Eur</span>
    </a>
    
    
    <a type="button" style="margin: 5px" class="btn btn-outline-info col-sm-full" >
        <h6>BDSC_Average</h6><hr style="margin-top: 5px; margin-bottom: 10px">  <span class="badge badge-pills badge-light">{{$res_state["state_bdsc"]}} %</span>
    </a>
    
    
    <a type="button" style="margin: 5px" class="btn btn-outline-success col-sm-full" >
        <h6>LOS</h6><hr style="margin-top: 5px; margin-bottom: 10px">  <span class="badge badge-pills badge-light">{{$res_state["state_nightcount"]}} Nights</span>
    </a>
                
 
         
                <a  type="button" style="margin: 5px" class="btn btn-outline-success col-sm-full" >
                 <h6>REVpar</h6><hr style="margin-top: 5px; margin-bottom: 10px">  <span class="badge badge-pills badge-light">{{$res_state["state_marge"]}} Eur</span>
                </a>
 
         
                <a   type="button" style="margin: 5px" class="btn btn-outline-info col-sm-full" >
                    <h6>Total_Nights</h6><hr style="margin-top: 5px; margin-bottom: 10px">  <span class="badge badge-pills badge-light">{{$res_state["tnight_count"]}} Nights</span>
                </a>
                
                
                
                    <div class="widget-content widget-content-area br-6 text-center" style="box-shadow: none;margin-top:-10">
                
                        <a   type="button" style="margin: 5px" class="btn btn-outline-primary col-sm-full" >
                            <h6>Turn_Over</h6> <hr style="margin-top: 5px; margin-bottom: 10px"> 
                            <span  class='shadow-none badge badge-success '>{{$res_state["t_un_sell"]}}   €</span> <span style="margin-left:10px;"  class='shadow-none badge badge-danger'> {{$res_state["t_un_purshase"]}}   €</span>
                        </a>
                    
                    
                        <a   type="button" style="margin: 5px" class="btn btn-outline-primary col-sm-full" >
                            <h6>Total_Status</h6> <hr style="margin-top: 5px; margin-bottom: 10px"> 
                            <span  class='shadow-none badge badge-success '>{{$res_state["res_ok"]}}</span> <span style="margin-left:10px;"  class='shadow-none badge badge-danger'> {{$res_state["res_not_ok"]}}</span>
                        </a>
                    
                        
                        <a   type="button" style="margin: 5px" class="btn btn-outline-success col-sm-full" >
                            <h6>Booking_Window</h6><hr style="margin-top: 5px; margin-bottom: 10px">  <span class="badge badge-pills badge-light">{{$res_state["state_bw"]}} Days</span>
                        </a>
                
                    </div>    
</div>
<br>

{{-- States ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}


<div class="widget-content widget-content-area br-6">


<div  style="width: 100%" >
    <a  style="width: 100%"  href="#filter" data-active="false" data-toggle="collapse" aria-expanded="false" class="btn btn-outline-success mb-2">
        <div style="float: left;margin-left:10px">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            <span >Filter</span>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse" id="filter" style="">
        
            

{{-- Filter Tab --}}
@include('reservation.tab-filter')
{{-- End filter Tab --}}
        
    </ul>
</div>
</div>





    <div class="row layout-top-spacing" id="cancel-row">


        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <div class="widget-content widget-content-area br-6">

                <table id="style-1" class="table table-hover" style="width:100%">
                
                    
                   <thead>
                        <tr>
                        <th class="checkbox-column ck" ></th>
                            <th>Booking_ID</th>
                            <th>BDC_ID</th>
                            <th>Hotel</th>
                            <th>Client_ID</th>
                            <th style="display:none">Provider_Name</th>
                            <th style="display:none">Costumer</th>
                            <th>Agency</th>
                            <th class="text-center" >Status</th>
                            <th class="mt">Booking_Date</th>
                            <th>Check_In_Date</th>
                            <th>Check_Out_Date</th>
                            <th>Selling_Price</th>
                            <th>Marge</th>
                            <th style="display:none">Purchasing_Price</th>
                            <th style="display:none">Cancelation_Date</th>
                            <th style="display:none">Cancelation_Price</th>
                            <th >Invoice_Seller</th>
                            <th >Invoice_Buyer</th>
                            <th >Payment_Status</th>
                            <th class="text-center" >Action</th>
                                
                        </tr>
                    </thead>
                    

                    <tbody>
                        @foreach($Reservations as $row)
                            <tr class='res_tab'>
                                <td class='checkbox-column'></td>                           
                                <td class='tgx' reservation-tgx = '{{$row["tgx"]}}' > {{$row["tgx"]}} </td>
                                <td class='hotelCode' reservation-hotelCode = '{{ $row["provider"] }}'>{{ $row["provider"] }}</td>
                                <td class='hotelCode' reservation-hotelCode = '{{ $row["hotelName"] }}'>{{ $row["hotelName"] }}</td>
                                <td class='client' reservation-client = '{{ $row["client"] }}'>{{ $row["client"] }}</td>
                                <td class='providerName' style="display:none" reservation-providerName = '{{$row["providerName"]}}'>{{ $row["providerName"] }}</td>
                                <td class='mainGuestName'  style="display:none" reservation-mainGuestName = '{{$row["mainGuestName"]}}'>{{ $row["mainGuestName"] }}</td>
                                <td class='clientCode' reservation-mainGuestName = '{{$row["clientCode"]}}'>{{ $row["clientCode"] }}</td>
                                <td class='text-center'><span class='shadow-none badge {{ getBadge($row["status"]) }} '>{{ $row["status"] }}</span></td>
                                <td class='bookingDate' reservation-bookingDate = '{{$row["bookingDate"]}}'>{{ $row["bookingDate"] }}</td>
                                
                                <td class='checkinDate' reservation-checkinDate = '{{$row["checkinDate"]}}'>{{ $row["checkinDate"] }}</td>
                                
                                <td class='checkoutDate' reservation-checkoutDate = '{{$row["checkoutDate"]}}'>{{ $row["checkoutDate"] }}</td>
                                
                                <td class='sellingPrice_amount' reservation-sellingPrice_amount = '{{$row["sellingPrice_amount"]}}'>
                                    <span style="float: left">{{ $row["sellingPrice_amount"] }}</span>
                                    <span style="float: left;margin-left:3px;"> {{ $row["sellingPrice_currency"] }}</span>
                                </td>
                                   
                                <td class="text-center">{{ $row["marge"] }} €</td>
                                
                                <td class='providerPrice_amount' style="display:none" reservation-providerPrice_amount = '{{$row["providerPrice_amount"]}}'>{{ $row["providerPrice_amount"] }}</td>
                                
                                <td class='cancelationDate' style="display:none" reservation-cancelationDate = '{{$row["cancellationDate"]}}'>{{ $row["cancellationDate"] }}</td>
                                <td class='cancelationPrice' style="display:none" reservation-cancelationPrice = '{{$row["cancellationPrice_amount"]}}'>{{ $row["cancellationPrice_amount"] }}</td>

                                <td class='text-center'><span class='shadow-none badge {{ getBadge($row["invoice_status_seller"]) }} '>{{ $row["invoice_status_seller"] }}</span></td>
                                <td class='text-center'><span class='shadow-none badge {{ getBadge($row["invoice_status_buyer"]) }} '>{{ $row["invoice_status_buyer"] }}</span></td>
                                <td class='text-center'><span class='shadow-none badge {{ getBadge($row["Payment_Status"]) }} '>{{ $row["Payment_Status"] }}</span></td>

                                <td class='text-center'>
                                    <a class="btn btn-outline-primary mb-2" href="{{ route('reservation.edit',$row["tgx"]) }}" target="_blank" rel="noopener noreferrer">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                                        <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
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
    document.getElementById("date_type").value = <?php echo json_encode($filter["date_type"]); ?>;    // set the value to this input 
    document.getElementById("status").value = <?php echo json_encode($filter["status"]); ?>;    // set the value to this input 
    document.getElementById("hotel").value = <?php echo json_encode($filter["hotel"]); ?>;    // set the value to this input 
    document.getElementById("agency").value = <?php echo json_encode($filter["agency"]); ?>;    // set the value to this input 
    document.getElementById("provider").value = <?php echo json_encode($filter["provider"]); ?>;   // set the value to this input 
    document.getElementById("Payment_Status").value = <?php echo json_encode($filter["Payment_Status"]); ?>;   // set the value to this input 

/* Here you can add more inputs to set value. if it's saved */

</script>
        

    </div>





                <!--  BEGIN SIDEBAR  -->

      
@endsection

  