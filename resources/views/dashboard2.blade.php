@extends('layouts.app')

@section('content')


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
                @include('reservation.tab-filter',['filter'=>$filter,'type'=>'analy','sellers'=>$sellers,'buyers'=>$buyers, 'city_listes'=>$city_listes,'hotels'=>$hotels,'Country_listes'=>$Country_listes])
                {{-- End filter Tab --}}
                
            <!-- </ul>
        </div>-->

    </div>


    <div class="layout-px-spacing">

<div class="row layout-top-spacing">
@if (Auth::guard()->user()->role==1)
 

    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget-four">
            <div class="widget-heading">
                <h5 class="">Daily booking status</h5>
            </div>
            <div class="widget-content">
                <div class="vistorsBrowser">
                    <div class="browser-list">
                        <div class="w-icon">
                        </div>
                        <div class="w-browser-details">
                            <div class="w-browser-info">
                                <h6>Total Selling</h6>
                                <p style="font-size: 19px;font-weight: 600;margin-bottom: 0;color: #888ea8;"> {{number_format($res_state["t_un_sell"], 2, ',', ' ')}}   €</p>
                            </div>
                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 100%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                        </div>
                        <div class="w-browser-details">
                            
                            <div class="w-browser-info">
                                <h6>Total Purchase</h6>
                                <p style="    font-size: 19px;font-weight: 600;margin-bottom: 0;color: #888ea8;"> {{number_format($res_state["t_un_purshase"], 2, ',', ' ')}} </p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 100%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                  
                    
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget-one">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                    <div class="w-content">
                        <span class="w-value">  {{number_format($res_state["res_marge"], 2, ',', ' ')}}  €</span>
                        <span class="w-numeric-title">Daily Margin</span>
                    </div>
                </div>
                <div class="w-chart">
                    <div id="total-orders"></div>
                </div>
            </div>
        </div>
    </div>
   
   
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{number_format($res_state["state_nightprice"], 2, ',', ' ')}} Eur</h6>
                        <p class="">ADR</p>
                    </div>
                    <div class="">
                        <!-- <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        </div> -->
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 100%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{$res_state["state_bdsc"]}} %</h6>
                        <p class="">Average Commission</p>
                    </div>
                    <div class="">
                        <!-- <div class="w-icon"> -->
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                        <!-- </div> -->
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: {{$res_state["state_bdsc"]}}%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{$res_state["state_nightcount"]}} Nights</h6>
                        <p class="">LOS</p>
                    </div>
                    <div class="">
                        <!-- <div class="w-icon"> -->
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                        <!-- </div> -->
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 100%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value"> {{number_format($res_state["state_marge"], 2, ',', ' ')}} Eur</h6>
                        <p class="">REVpar</p>
                    </div>
                    <div class="">
                        <!-- <div class="w-icon"> -->
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                        <!-- </div> -->
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 100%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{$res_state["tnight_count"]}} Nights</h6>
                        <p class="">Total_Nights</p>
                    </div>
                    <div class="">
                        <!-- <div class="w-icon"> -->
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                        <!-- </div> -->
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 100%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{$res_state["state_bw"]}} Days</h6>
                        <p class="">Booking_Window</p>
                    </div>
                    <div class="">
                        <!-- <div class="w-icon"> -->
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                        <!-- </div> -->
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-dark" role="progressbar" style="width: 100%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

  


   

  



    

   

 

    

  

  

    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-three">

            <div class="widget-heading">
                <h5 class="">Classement Destination TOP 10</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><div class="th-content">Name</div></th>
                                <th><div class="th-content th-heading">Nombre de reservation</div></th>
                                <th><div class="th-content th-heading">Marge</div></th>
                            </tr>
                        </thead>
                        <tbody>
                     
                        @foreach($Destination_top as $row)
                            <tr>
                                <td><div class="td-content product-name"><img src="{{asset('storage/img/90x90.jpg')}}" alt="product">{{$row['Country']}}</div></td>
                                <td><div class="td-content"><span class="pricing">{{$row['count_tgx']}}</span></div></td>
                                <td><div class="td-content"><span class="pricing">{{$row['marge_tgx']}}</span></div></td>
                           
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-three">

            <div class="widget-heading">
                <h5 class="">Classement City TOP 10</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th><div class="th-content">Name</div></th>
                                <th><div class="th-content th-heading">Nombre de reservation</div></th>
                                <th><div class="th-content th-heading">Marge</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($City_top as $row)
                            <tr>
                                <td><div class="td-content product-name"><img src="{{asset('storage/img/90x90.jpg')}}" alt="product">{{$row['City']}}</div></td>
                                <td><div class="td-content"><span class="pricing">{{$row['count_tgx']}}</span></div></td>
                                <td><div class="td-content"><span class="pricing">{{$row['marge_tgx']}}</span></div></td>
                           
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-three">

            <div class="widget-heading">
                <h5 class="">Classement Buyer TOP 10</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th><div class="th-content">Name</div></th>
                                <th><div class="th-content th-heading">Nombre de reservation</div></th>
                                <th><div class="th-content th-heading">Marge</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Buyer_top as $row)
                            <tr>
                                <td><div class="td-content product-name"><img src="{{asset('storage/img/90x90.jpg')}}" alt="product">{{$row['clientCode']}}</div></td>
                                <td><div class="td-content"><span class="pricing">{{$row['count_tgx']}}</span></div></td>
                                <td><div class="td-content"><span class="pricing">{{$row['marge_tgx']}}</span></div></td>
                           
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-three">

            <div class="widget-heading">
                <h5 class="">Classement Seller TOP 10 </h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><div class="th-content">Name</div></th>
                                <th><div class="th-content th-heading">Nombre de reservation</div></th>
                                <th><div class="th-content th-heading">Marge</div></th>
                                
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($Seller_top as $row)
                            <tr>
                                <td><div class="td-content product-name"><img src="{{asset('storage/img/90x90.jpg')}}" alt="product">{{$row['providerName']}}</div></td>
                                <td><div class="td-content"><span class="pricing">{{$row['count_tgx']}}</span></div></td>
                                <td><div class="td-content"><span class="pricing">{{$row['marge_tgx']}}</span></div></td>
                           
                            </tr>
                            @endforeach 
                        
                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
@else
<h1>aucun information</h1>
@endif
</div>

</div>
<script>
/*
==================================
Sales By Category | Options
==================================
*/

// $res_ok=document.getElementById("res_ok").value;
// $res_count_st_cn=document.getElementById("res_count_st_cn").value;
// $res_count_st_KUN=document.getElementById("res_count_st_KUN").value;
// $res_count_st_CN_FEE=document.getElementById("res_count_st_CN_FEE").value;
// $res_count_stCN_NRF=document.getElementById("res_count_stCN_NRF").value;
// $res_count_st_NO_SHOW=document.getElementById("res_count_st_NO_SHOW").value;
// alert($res_ok)
// chart.updateSeries([{
//   series: [100,50, 50, 100,150,25],
// }])

// function codeAddress() {
//     $res_ok=document.getElementById("res_ok").value;
// $res_count_st_cn=document.getElementById("res_count_st_cn").value;
// $res_count_st_KUN=document.getElementById("res_count_st_KUN").value;
// $res_count_st_CN_FEE=document.getElementById("res_count_st_CN_FEE").value;
// $res_count_stCN_NRF=document.getElementById("res_count_stCN_NRF").value;
// $res_count_st_NO_SHOW=document.getElementById("res_count_st_NO_SHOW").value;
// let fgp_array = [$res_ok,$res_count_st_cn,$res_count_st_KUN,$res_count_st_CN_FEE,$res_count_stCN_NRF,$res_count_st_NO_SHOW];
//     console.log("Changing chart to FGP");
//     // chart.updateSeries([{


//     //     series: [{
//     //   data: fgp_array
//     //          }],
//     // }])
//     ApexCharts.exec('#chart-2', 'updateOptions', {
//         series: fgp_array,
//         //   labels: newLabels
//         })
//  };


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





</script>
    
@endsection  