@extends('layouts.app')

@section('content')
<?php
function getBadge($var){
    switch($var){
        case "CN":
            return "badge-danger";
        case "OK":
            return "badge-success";
        case "CK":
            return "badge-warning";
        case "KUN":
            return "badge-warning";

    }
}
function getCurency($var){
    switch($var){
        case "EUR":
            return "€";
        case "USD":
            return "$";
        case "MAD":
            return "MAD";
        default:
            return $var;

    }
}

?>

<div class="layout-px-spacing">
                
    <div class="row layout-top-spacing" id="cancel-row">
    
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <div class="widget-content widget-content-area br-6">

                <table id="style-1" class="table table-hover" style="width:100%">
                
                    
                    <thead>
                        <tr>
                            <th class="checkbox-column ck"></th>
                            <th>Booking ID</th>
                            <th>Hotel</th>
                            <th>Costumer</th>
                            <th class="text-center" >Status</th>
                            <th>Booking Date</th>
                            <th>Check-In Date</th>
                            <th>Check-Out Date</th>
                            <th>Selling Price</th>
                            <th style="display:none">Purchasing Price</th>
                            <th>Currency</th> 
                            <th class="text-center" >Action</th>
                                
                        </tr>
                    </thead>
                    

                    <tbody>
                        @foreach($reservations as $row)
                            <tr class='res_tab'>
                                <td class='checkbox-column'></td>                           
                                <td class='tgx' reservation-tgx = '{{$row["tgx"]}}' > {{$row["tgx"]}} </td>
                                <td class='clientCode' reservation-clientCode = '{{$row["clientCode"]}}'>{{ $row["clientCode"] }}</td>
                                <td class='mainGuestName' reservation-mainGuestName = '{{$row["mainGuestName"]}}'>{{ $row["mainGuestName"] }}</td>
                                <td class='text-center'><span class='shadow-none badge {{ getBadge($row["status"]) }} '>{{ $row["status"] }}</span></td>
                                <td class='bookingDate' reservation-bookingDate = '{{$row["bookingDate"]}}'>{{ $row["bookingDate"] }}</td>
                                <td class='checkinDate' reservation-checkinDate = '{{$row["checkinDate"]}}'>{{ $row["checkinDate"] }}</td>
                                <td class='checkoutDate' reservation-checkoutDate = '{{$row["checkoutDate"]}}'>{{ $row["checkoutDate"] }}</td>
                                <td class='sellingPrice_amount' reservation-sellingPrice_amount = '{{$row["sellingPrice_amount"]}}'>{{ $row["sellingPrice_amount"] }}</td>
                                <td class='providerPrice_amount' style="display:none" reservation-providerPrice_amount = '{{$row["providerPrice_amount"]}}'>{{ $row["providerPrice_amount"] }}</td>
                                <td class='text-center'>{{ getCurency($row["sellingPrice_currency"])}}</td>
                                <td class='text-center'>
                                    <div  class='action-btn bs-tooltip edit' data-trigger='hover' data-placement='top' title='Edit'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                                        <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    
                    
                    </tbody>
                </table>
                
            </div>
            <div class="modal fade bd-example-modal-xl" id="editReservation" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myExtraLargeModalLabel">Edit Reservation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="addContactModalTitle" method="post" >
                                            @csrf
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="contact-name">
                                                            <i class="flaticon-user-11"></i>
                                                            <label for="c-tgx">Booking ID</label>
                                                            <input type="text" id="c-tgx" name="c-tgx" class="form-control" readonly placeholder="Name">
                                                            <span class="validation-text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="contact-email">
                                                            <i class="flaticon-mail-26"></i>
                                                            <label for="c-clientCode">Hotel</label>
                                                            <input type="text" id="c-clientCode" name="c-clientCode" class="form-control" readonly placeholder="Email">
                                                            <span class="validation-text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="contact-phone">
                                                            <i class="flaticon-telephone"></i>
                                                            <label for="c-bookingDate">Booking Date</label>
                                                            <input type="text" id="c-bookingDate" name="c-bookingDate" class="form-control" readonly placeholder="Phone">
                                                            <span class="validation-text"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="contact-occupation">
                                                            <i class="flaticon-fill-area"></i>
                                                            <label for="c-mainGuestName">Costumer</label>
                                                            <input type="text" id="c-mainGuestName" name="c-mainGuestName" class="form-control" readonly placeholder="Cos">
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="contact-location">
                                                            <i class="flaticon-location-1"></i>
                                                            <label for="c-CheckingDate">Checking Date</label>
                                                            <input type="text" id="c-CheckingDate" name="c-CheckingDate" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="contact-location">
                                                            <i class="flaticon-location-1"></i>
                                                            <label for="c-CheckoutDate">Checkout Date</label>
                                                            <input type="text" id="c-CheckoutDate" name="c-CheckoutDate" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="contact-location">
                                                            <i class="flaticon-location-1"></i>
                                                            <label for="c-providerPrice_amount"> Purchasing Price </label>
                                                            <input type="text" id="c-providerPrice_amount" name="c-providerPrice_amount" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="contact-location">
                                                            <i class="flaticon-location-1"></i>
                                                            <label for="c-sellingPrice_amount">Selling Price</label>
                                                            <input type="text" id="c-sellingPrice_amount" name="c-sellingPrice_amount" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                                
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button id="btn-edit" type = "submit" class="btn btn-outline-success mb-2">Save</button>

                                            <button class="btn btn-dark mb-2" data-dismiss="modal">  Discard</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
        
        
        </div>

    </div>

</div>



@endsection  