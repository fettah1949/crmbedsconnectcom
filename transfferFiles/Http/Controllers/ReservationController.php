<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
//use App\Models\User;

use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $reservations = Reservation::All();

        $start_date = "";
        $end_date = "";
        $date_type = "";
        $status = "";
        $hotel = "";
        $agency = "";
        $provider = "";
        $Payment_Status = "";

        
        $filter = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'date_type' => $date_type,
            'status' => $status,
            'hotel' => $hotel,
            'agency' => $agency,
            'provider' => $provider,
            'Payment_Status' => $Payment_Status,

        ];

   // Statistics ///////////////////////////////////////////////////////////////////////////////////////////
        //for all status count
        $res_count_st_all = 0;

        //for all status count exept cn & ck & kun 
        $res_count_st_all_exept3 = 0;
        
        //for status OK count
        $res_count_st_ok = 0;
        
        //for marge
        $tmarge = 0;
        
        //for night counts
        $tnight_count = 0;

        //for khnits average price
        $tnight_price = 0;
        
        //for bdsc%
        $tbdsc = 0;

        //for booking window
        $tbw_day_count = 0;

        //for turn over
        $t_un_sell = 0;
        $t_un_purshase = 0;
        
        foreach ($reservations as $reser) {
            $res_count_st_all = $res_count_st_all + 1 ;
            
            if($reser->status == 'OK' OR $reser->status == 'CN-FEE'  OR $reser->status == 'CN-NRF'  OR $reser->status == 'NO-SHOW' ){
                
                $res_count_st_all_exept3 = $res_count_st_all_exept3 + 1 ;
                
                $t_un_sell = $t_un_sell + $reser->un_pr_selling_EUR;
                $t_un_purshase = $t_un_purshase + $reser->un_pr_purchasing_EUR;
                
                if($reser->status == 'OK'){
                    $res_count_st_ok = $res_count_st_ok + 1 ;
                    
                    $tnight_price = $tnight_price + $reser->price_per_night;
                    $tbdsc = $tbdsc + $reser->Commission_bdsc;
                    $tnight_count = $tnight_count + $reser->nights_count;
                    $tmarge = $tmarge + $reser-> marge;
                    $tbw_day_count = $tbw_day_count + $reser->Booking_Window;

                }
            }


        }


        if($res_count_st_all_exept3 == 0){
            $t_un_sell = 0 ;
            $t_un_purshase = 0 ;
        }

    if($res_count_st_ok == 0){
     $state_nightprice = 0;

     $state_bdsc = 0;

     $state_nightcount = 0;

     $state_marge = 0;

     $tnight_count;

     $state_bw = 0;
}else{

    //global ADR ( prix moyenne/nuitée).status=ok
    $state_nightprice = $tnight_price / $res_count_st_ok;

    //average of Commission bdsc per reservations Status OK
    $state_bdsc = $tbdsc / $res_count_st_ok;

    //LOS ( moyenne séjours en nuitée).Status OK
    $state_nightcount = $tnight_count / $res_count_st_ok;

    //REVpar(Prix moyen par resa). Status OK
    $state_marge = $tmarge / $res_count_st_ok;

    //Total nuitée. Status OK
    $tnight_count;

    // Average Booking Window. Status OK
    $state_bw = $tbw_day_count / $res_count_st_ok;

}


        $res_count_st_not_ok = $res_count_st_all - $res_count_st_ok;
        
        $res_state = array(
            'state_bdsc' => round($state_bdsc*100, 2),
            'state_nightcount'=> round($state_nightcount, 2),
            'state_marge'=> round($state_marge, 2),
            'state_nightprice'=> round($state_nightprice, 2),
            'tnight_count' => round($tnight_count, 2),
            'res_ok' => $res_count_st_ok,
            'res_not_ok' => $res_count_st_not_ok,
            'state_bw' => round($state_bw, 2),
            't_un_sell' => $t_un_sell,
            't_un_purshase' => $t_un_purshase
        );
        
    
    // End Statistics ///////////////////////////////////////////////////////////////////////////////////////////
        
        $data = [
    

            'Reservations'=>$reservations,
            'filter' => $filter,
            'res_state'=> $res_state
    
        ];    
        
        ReservationController::getdata();
        return view('reservation.index',$data) ;  

    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //get filter parametre
        
       // dd($request);
        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $date_type = $request->input('date_type');
        $status = $request->input('status');
        $hotel = $request->input('hotel');
        $agency = $request->input('agency');
        $provider = $request->input('provider');
        $Payment_Status = $request->input('Payment_Status');

        
        $matchThese = array();
        $a_status = ['status' => $status];
        $a_hotel = ['hotelCode' => $hotel];
        $a_agency = ['clientCode' => $agency];
        $a_provider = ['providerName' => $provider];
        $a_Payment_Status = ['Payment_Status' => $Payment_Status];

        
        if($status != ""){
              $matchThese = $matchThese + $a_status;
        }
        if($hotel != ""){
            $matchThese =$matchThese + $a_hotel;
        }
        if($agency != ""){
            $matchThese =$matchThese + $a_agency;
        }
        if($provider != ""){
            $matchThese =$matchThese + $a_provider;
        }
        if($Payment_Status != ""){
            $matchThese =$matchThese + $a_Payment_Status;
        }

     
        if($date_type != "" && $start_date != "" && $end_date != "" ){
            $reservations = Reservation::where($matchThese)->whereBetween($date_type, [$start_date, $end_date])->get();
        }else{
            $reservations = Reservation::where($matchThese)->get();
        }
        $filter = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'date_type' => $date_type,
            'status' => $status,
            'hotel' => $hotel,
            'agency' => $agency,
            'provider' => $provider,
            'Payment_Status' => $Payment_Status,


        ];

         // Statistics ///////////////////////////////////////////////////////////////////////////////////////////
        //for all status count
        $res_count_st_all = 0;

        //for all status count exept cn & ck & kun 
        $res_count_st_all_exept3 = 0;
        
        //for status OK count
        $res_count_st_ok = 0;
        
        //for marge
        $tmarge = 0;
        
        //for night counts
        $tnight_count = 0;

        //for khnits average price
        $tnight_price = 0;
        
        //for bdsc%
        $tbdsc = 0;

        //for booking window
        $tbw_day_count = 0;

        //for turn over
        $t_un_sell = 0;
        $t_un_purshase = 0;
        
        foreach ($reservations as $reser) {
            $res_count_st_all = $res_count_st_all + 1 ;
            
            if($reser->status == 'OK' OR $reser->status == 'CN-FEE'  OR $reser->status == 'CN-NRF'  OR $reser->status == 'NO-SHOW' ){
                
                $res_count_st_all_exept3 = $res_count_st_all_exept3 + 1 ;
                
                $t_un_sell = $t_un_sell + $reser->un_pr_selling_EUR;
                $t_un_purshase = $t_un_purshase + $reser->un_pr_purchasing_EUR;
                
                if($reser->status == 'OK'){
                    $res_count_st_ok = $res_count_st_ok + 1 ;
                    
                    $tnight_price = $tnight_price + $reser->price_per_night;
                    $tbdsc = $tbdsc + $reser->Commission_bdsc;
                    $tnight_count = $tnight_count + $reser->nights_count;
                    $tmarge = $tmarge + $reser-> marge;
                    $tbw_day_count = $tbw_day_count + $reser->Booking_Window;

                }
            }


        }

        if($res_count_st_all_exept3 == 0){
            $t_un_sell = 0 ;
            $t_un_purshase = 0 ;
        }


    if($res_count_st_ok == 0){
     $state_nightprice = 0;

     $state_bdsc = 0;

     $state_nightcount = 0;

     $state_marge = 0;

     $tnight_count;

     $state_bw = 0;
}else{

    //global ADR ( prix moyenne/nuitée).status=ok
    $state_nightprice = $tnight_price / $res_count_st_ok;

    //average of Commission bdsc per reservations Status OK
    $state_bdsc = $tbdsc / $res_count_st_ok;

    //LOS ( moyenne séjours en nuitée).Status OK
    $state_nightcount = $tnight_count / $res_count_st_ok;

    //REVpar(Prix moyen par resa). Status OK
    $state_marge = $tmarge / $res_count_st_ok;

    //Total nuitée. Status OK
    $tnight_count;

    // Average Booking Window. Status OK
    $state_bw = $tbw_day_count / $res_count_st_ok;

}


        $res_count_st_not_ok = $res_count_st_all - $res_count_st_ok;
        
        $res_state = array(
            'state_bdsc' => round($state_bdsc*100, 2),
            'state_nightcount'=> round($state_nightcount, 2),
            'state_marge'=> round($state_marge, 2),
            'state_nightprice'=> round($state_nightprice, 2),
            'tnight_count' => round($tnight_count, 2),
            'res_ok' => $res_count_st_ok,
            'res_not_ok' => $res_count_st_not_ok,
            'state_bw' => round($state_bw, 2),
            't_un_sell' => $t_un_sell,
            't_un_purshase' => $t_un_purshase
        );
    
    // End Statistics ///////////////////////////////////////////////////////////////////////////////////////////
        

        
 
        $data = [
     
            'Reservations'=>$reservations,
            'filter' => $filter,
            'res_state'=> $res_state
    
        ];    
        return view('reservation.index',$data) ;    

        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Reservation::create($request->all());
     
        return redirect()->route('reservation.index')
                        ->with('success','Reservation created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('reservation.show',compact('reservation'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
       // dd($reservation);
        return view('reservation.edit',compact('reservation'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'hotelName' => 'nullable',
            'mainGuestName' => 'nullable',
            'providerName' => 'nullable',
            'bookingDate' => 'nullable',
            'checkinDate' => 'nullable',
            'checkoutDate' => 'nullable',
            'status' => 'nullable',
            'cancellationDate' => 'nullable',
            'cancellationPrice_amount' => 'nullable',
            'providerPrice_currency' => 'nullable',
            'providerPrice_amount' => 'nullable',
            'sellingPrice_currency' => 'nullable',
            'sellingPrice_amount' => 'nullable',
            'un_pr_selling_EUR' => 'nullable',
            'un_pr_purchasing_EUR' => 'nullable',
            'invoice_id_seller' => 'nullable',
            'invoice_status_seller' => 'nullable',
            'invoice_id_buyer' => 'nullable',
            'invoice_status_buyer' => 'nullable',
            'Payment_Status' => 'nullable',
            'marge' => 'nullable',
            'Commission_bdsc' => 'nullable',
            'price_per_night' => 'nullable',

        ]);
    
        $reservation->update($request->all());
    
        return redirect()->route('reservation.index')
                        ->with('success','Reservation updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
    
        return redirect()->route('reservation.index')
                        ->with('success','Reservation deleted successfully');
    }
    
     /////////API
  public function getdata()
  {
         
       $Booking_to_D =  date("Y-m-d");

       $Booking_from_D = date('Y-m-d', strtotime($Booking_to_D . " - 1 day"));


// retrive by 7 days 
              //  $d_id = '1';
            //    $startdate = User::where('id',$d_id)->first();
              //  $Booking_to_D = $startdate->name;

             //   $Booking_from_D = date('Y-m-d', strtotime($Booking_to_D . " - 6 day"));

             //   $startdate = User::find($d_id);
             //   $startdate->name = $Booking_from_D;
            
             //   $startdate->save();
// end retrive by 7 days


      $accesToken = "9+F3anOx2FTiBxeW0OPZ0ujTR5VYCbtrRALONciTk9c=";
      $password = "CyxL829raKXp";

      
      $access = array('accessToken' => $accesToken, 'password'=> $password );
      $bookingDate = array('from' => $Booking_from_D, 'to'=> $Booking_to_D );


      //dd($bookingDate);
      $Req_W_CN = array("access" => $access,"bookingDate" => $bookingDate, "includeCancellations"=>true);

      
      try {
          $result = ReservationController::getData_API($Req_W_CN);
  
          
          if ($result["reservationSearchRS"]){
              foreach ($result["reservationSearchRS"] as $key => $value) {
                  $res = new Res_obj($result["reservationSearchRS"][$key]);
                  if ($res->status != "OK" && Reservation::find($res->tgx)){
                      $resa =  Reservation::find($res->tgx);
                      $resa -> status = $res->status;
                      $resa -> summaryStatus = $res->summaryStatus;
                      $resa -> internalStatus = $res->internalStatus;
                      $resa -> bookingStatus = $res->bookingStatus;

                      $resa -> cancellationDate = $res->cancellationDate;

                      //bookingDate = LastActionDate
                      $resa -> bookingDate = $res->lastActionDate;

                      //selling price =  cancellation price
                      $resa -> sellingPrice_amount = $res->cancellationPrice_amount;
                      $resa -> sellingPrice_currency = $res -> cancellationPrice_currency;

                          //reset intern calculated data
                          $resa -> un_pr_purchasing_EUR = 0;
                          $resa -> Commission_bdsc = 0;
                          $resa -> nights_count = 0;
                          $resa -> price_per_night = 0;
                          $resa ->  marge = 0;
                  

                            //united Price case Status CN
                              if($res -> cancellationPrice_currency == 'EUR'){
                                  $diffrent = 1 ;
                              }elseif($res -> cancellationPrice_currency == 'USD'){
                                  $diffrent = 0.8285690612312536249896428867;                                
                              }elseif($res -> cancellationPrice_currency == 'MAD'){
                                  $diffrent = 0.0952380952380952380952380952 ;
                              }

                              $un_pr_selling_EUR = $res -> cancellationPrice_amount * $diffrent;

                              $resa -> un_pr_selling_EUR = $un_pr_selling_EUR;
                              /////////////////////////

                          
                      

                      $resa -> cancellationPrice_currency = $res -> cancellationPrice_currency ;
                      $resa -> cancellationPrice_amount = $res -> cancellationPrice_amount ;
                      $resa -> cancellationPrice_binding = $res -> cancellationPrice_binding ;
                      $resa -> cancellationPrice_commission = $res -> cancellationPrice_commission;

                      $resa -> save();

                  }
                  else{
                      if (!Reservation::find($res->tgx)){
                          $res->Save_Res();
                      }
                  }
                 

              }

             // dd($bookingDate,$result);

          }
          
      } catch ( Exception $e) {
         // echo $e -> getMessage();
      }

  }

  function getData_API($data){
      $urlSearch = "https://distribution-reservationsapi.xmltravelgate.com/api/search";
      $payload = json_encode($data);
      $ch = curl_init($urlSearch);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($payload))
      );

      $result = curl_exec($ch);
      $response = json_decode($result,true);
      curl_close($ch);
      return $response;
  }
      //////////////////////////////////////////////////////////API
}