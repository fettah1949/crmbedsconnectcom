{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Register Seller </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/> --}}
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css')}}"> --}}
{{-- </head> --}}
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

<button class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#add_seller" target="_blank">Ajouter Buyer</button>
    <div class="main-container widget-content widget-content-area br-6" id="container">

        
        @php
        $date0 = date("Y-m-d");
        $date = date('Y-m-d', strtotime($date0 . " +7 day"));
        @endphp
    

       
                           
                            <table id="html5-extension" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                 
                                            <th  >Nom </th>
                                            <th>Email </th>
                                            <th>Seller</th>
                                        
                                    
                                         
                                            <th class="text-center dt-no-sorting" >Action</th>
                                                
                                    </tr>
                                </thead>
                                <tbody >
                              
                        
                        
                                    @foreach($Client_seller as $row)
                                   
                                    <tr  >
                                 
                                       <td >{{ $row->name }}</td>
                                        <td >{{ $row->email }}</td>
                                        <td >{{ $row->seller }}</td>
                                        
                                  
                                        <td class='text-center'> 
                                            
                                          
                                            <div class="btn-group">
                                              

                                               
                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference3">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#edit_seller-{{ $row->id }}" target="_blank">
                                                        Edit
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit-2 p-1 br-6 mb-1'>
                                                        <path d='M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z'></path></svg></a>
                                                    
                                                    
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item  " data-toggle="modal" data-target="#deleteModalCenter{{ $row->id }}" target="_blank">
                                                        Delete
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#1b55e2 " stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>

                                                    </a>
                                                  
                                                 
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                  
                                   
                              @include('admin.seller.pop_up.pop_up_Edit_seller',['id'=>$row->id,'name'=>$row->name,'seller01'=>$row->seller,'email'=>$row->email])
                              @include('admin.seller.pop_up.pop_up_delete_seller',['id'=>$row->id,'name'=>$row->name,'seller01'=>$row->seller,'email'=>$row->email])
                                 
                                    @endforeach 
                                </tbody>
                            </table>

            @include('admin.seller.pop_up.pop_up_add_seller')
    </div>
 

    
    {{-- <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/authentication/form-2.js')}}"></script> --}}
<script>
    function disabledfun(id)
    {
        //  alert($('#aa'+id).is(':checked'));
        if ($('#aa'+id).is(':checked')) {
            $('#passwords'+id).removeAttr("disabled");
            $('#passwords'+id).val("");
        } else {
            $('#passwords'+id).attr("disabled", true);
            $('#passwords'+id).val("");
        }
        //  $('#passwords'+id).prop("disabled", false)
        //  document.getElementById('my-input-id').disabled = false;
    }
</script>
@endsection