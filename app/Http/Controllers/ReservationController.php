<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Hotellist;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Agencycontact;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
//use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response  
     * //   ReservationController::exec_base();
     */
    public function index()
    {
         
      
            //    die('ffffff');
        //    ReservationController::crono_taux();
         ReservationController::getdata();
         return ReservationController::commission_rese();
   



        //  ReservationController::crono_taux();
        $dt =  Carbon::now();
        $dt= $dt->format('Y-m-d');
        $date1= $dt;
        $date2 = date('Y-m-d', strtotime('+1 day'));     
         $date = new DateTime();
        $dateDeb = $date -> format('Y/m/01');
        $agency_contact = Agencycontact::
        where('Contact_Type','SELLER')->get();
        // $dateFin = $date -> format('Y/m/t');
        //  return $dateFin;
               $reservations = Reservation::
        // whereDate('bookingDate','>=', $date2)
        leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
        // ->leftJoin('hotellists', 'reservations.providerName', '=', 'hotellists.provider')
       ->whereDate('bookingDate','>=',$date1 )
        ->whereDate('bookingDate','<=', $date2)

         ->orderBy('bookingDate','DESC')
         ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h','reservations.provider as provider_Code')
            ->get();


 
                
    
      $dateapi=date('Y-m-d', strtotime('-1 day'));

    
      $i=0;



  
   
        
    
     

        

  
        
        
        $start_date = "";
        $end_date = "";
        $date_type = "";
        $status = "";
        $hotel = "";
        $agency = "";
        $provider = "";
        $Payment_Status = "";
        $Type_code = "";
        $Code = "";

        
        $filter = [
            'Type_code' => $Type_code,
            'Code' => $Code,
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
        // return count($reservations);
        
        foreach ($reservations as $reser) {
            $res_count_st_all = $res_count_st_all + 1 ;
            
            if($reser->status == 'OK' OR $reser->status == 'CN-FEE'  OR $reser->status == 'CN-NRF'  OR $reser->status == 'NO-SHOW' )
            {
                
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


            //average of Commission bdsc per reservations Status OK
            $state_bdsc = ($t_un_sell - $t_un_purshase)/$t_un_purshase;


            //global ADR ( prix moyenne/nuitée).status=ok
            $state_nightprice = $tnight_price / $res_count_st_ok;
        
        
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
        
       
        $sellers = Agencycontact::where('Contact_Type','SELLER')->get();
        $buyers = Agencycontact::where('Contact_Type','BUYER')->get();
        $city_listes = Hotellist::select('hotellists.City as City')-> groupBy('City')->get();
        $Country_listes = Hotellist::select('hotellists.Country as Country')-> groupBy('Country')->get();
        $hotels = Hotellist::limit(10)->get();
 
        $data = [
     
            'Reservations'=>$reservations,
            'filter' => $filter,
            'res_state'=> $res_state,
            'agency_contact'=> $agency_contact,
            'sellers'=> $sellers,
            'buyers'=> $buyers,
            'city_listes'=> $city_listes,
            'hotels'=> $hotels,
    
        ];
        
          

        
       
        
        return view('reservation.index',$data) ;  

    }
    
    
     public function getOptions()
    {
     
        
        $options = Hotellist::all(); // Remplacez Option par votre modèle et ajustez selon vos besoins
        // return response()->json($options);
        return  $options ;
    }

       public function crono_taux()
       {
            // return 'fettah.';
            $dt =  Carbon::now();
            $dt= $dt->format('Y-m-d');
            $dateapi=date('Y-m-d');
            $QUOTE=Quote::where("DATE",$dt)->count(); 
            //    return  $QUOTE;
           if($QUOTE==0)
           {
               $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/".$dateapi."?symbols=eur&base=usd",     
              CURLOPT_HTTPHEADER => array(
               "Content-Type: text/plain",
               "apikey: 3qpOD41mwUS02koZK7p1EV8t7m7x4wwR"
             ),
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_ENCODING => "",
             CURLOPT_MAXREDIRS => 10,
             CURLOPT_TIMEOUT => 0,
             CURLOPT_FOLLOWLOCATION => true,
             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "GET"
              ));
           
                $response = curl_exec($curl);
                
                curl_close($curl);
                // return $response;
                $json = json_decode($response, true);  
                $eur_usd= $json['rates']['EUR'];
                $curl = curl_init();
        
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/".$dateapi."?symbols=eur&base=mad",     
                    CURLOPT_HTTPHEADER => array(
                    "Content-Type: text/plain",
                    "apikey: 3qpOD41mwUS02koZK7p1EV8t7m7x4wwR"
                    ),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET"
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                // return $response;
                $json = json_decode($response, true);  
                $eur_mad= $json['rates']['EUR'];
        
  
                Quote::create([
                    'USD'=>$eur_usd,
                    'MAD'=>$eur_mad,
                    'DATE'=>$dt,
                    
                ]);
           }
       }
    // public function crono_taux()
    // {
    //     // Définir les dates de début et de fin
    //     $startDate = Carbon::createFromFormat('Y-m-d', '2024-10-08');
    //     $endDate = Carbon::now()->format('Y-m-d');
    //     $currentDate = $startDate;

    //     while ($currentDate <= $endDate) {
    //         // Vérifier si un enregistrement existe déjà pour la date
    //         $QUOTE = Quote::where("DATE", $currentDate->format('Y-m-d'))->count();

    //         if ($QUOTE == 0) {
    //             // Effectuer la requête pour USD -> EUR
    //             $curl = curl_init();
    //             curl_setopt_array($curl, array(
    //                 CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/" . $currentDate->format('Y-m-d') . "?symbols=eur&base=usd",
    //                 CURLOPT_HTTPHEADER => array(
    //                     "Content-Type: text/plain",
    //                     "apikey: uoZlXr97d3IWrlVRKKWZNVseukdcYw3J"
    //                 ),
    //                 CURLOPT_RETURNTRANSFER => true,
    //                 CURLOPT_ENCODING => "",
    //                 CURLOPT_MAXREDIRS => 10,
    //                 CURLOPT_TIMEOUT => 0,
    //                 CURLOPT_FOLLOWLOCATION => true,
    //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //                 CURLOPT_CUSTOMREQUEST => "GET"
    //             ));
    //             $response = curl_exec($curl);
    //             curl_close($curl);

    //             $json = json_decode($response, true);
    //             $eur_usd = $json['rates']['EUR'] ?? null;

    //             // Effectuer la requête pour MAD -> EUR
    //             $curl = curl_init();
    //             curl_setopt_array($curl, array(
    //                 CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/" . $currentDate->format('Y-m-d') . "?symbols=eur&base=mad",
    //                 CURLOPT_HTTPHEADER => array(
    //                     "Content-Type: text/plain",
    //                     "apikey: uoZlXr97d3IWrlVRKKWZNVseukdcYw3J"
    //                 ),
    //                 CURLOPT_RETURNTRANSFER => true,
    //                 CURLOPT_ENCODING => "",
    //                 CURLOPT_MAXREDIRS => 10,
    //                 CURLOPT_TIMEOUT => 0,
    //                 CURLOPT_FOLLOWLOCATION => true,
    //                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //                 CURLOPT_CUSTOMREQUEST => "GET"
    //             ));
    //             $response = curl_exec($curl);
    //             curl_close($curl);

    //             $json = json_decode($response, true);
    //             $eur_mad = $json['rates']['EUR'] ?? null;

    //             // Vérification pour éviter les erreurs si l'API ne retourne pas de données
    //             if ($eur_usd && $eur_mad) {
    //                 Quote::create([
    //                     'USD' => $eur_usd,
    //                     'MAD' => $eur_mad,
    //                     'DATE' => $currentDate->format('Y-m-d'),
    //                 ]);
    //             } else {
    //                 // Loguer une erreur si les données ne sont pas disponibles
    //                 Log::error("Taux de change non disponible pour la date : " . $currentDate->format('Y-m-d'));
    //             }
    //         }

    //         // Passer à la date suivante
    //         $currentDate->addDay();
    //     }
    // }

       public function commission_rese(){
           $i =0;
            $reservations = Reservation::
                            where('sellingPrice_binding',1)->where('commission_bdsc_binding',Null)->get();
                                return  $reservations;
            foreach ($reservations as $reservation)
            {
                // echo $i++ ;
                
                //  echo '--> '. $reservation->tgx; 
              $reservationsfirst = Reservation::find($reservation->tgx); 
            
                     if($reservationsfirst->sellingPrice_binding==1)
                     {
                         $commission_selling = ($reservationsfirst-> sellingPrice_amount *  ($reservationsfirst-> sellingPrice_commission / 100) ) ;
                         $newpricselling =$reservationsfirst-> sellingPrice_amount - $commission_selling;
                         $reservationsfirst-> sellingPrice_amount_binding = $newpricselling ;
                         $commission_provider =  ($reservationsfirst-> providerPrice_amount *  ($reservationsfirst-> providerPrice_commission / 100) ) ;
                         $newpricprovider =$reservationsfirst-> providerPrice_amount - $commission_provider;
                         $reservationsfirst-> providerPrice_amount_binding = $newpricprovider ;
                         $reservationsfirst-> marge_binding =  $newpricselling - $newpricprovider;
                         $reservationsfirst->commission_bdsc_binding = ($newpricselling -  $newpricprovider) /  $newpricprovider;
                         $reservationsfirst -> save();
                        
                    }
            }
            //  return  'Fin De Traitement';
       }
       
       public function reservation_quote(){
                   $reservation_0_quotes=Reservation::all();
        //  return $reservation_0_quotes; voila 1
        $dt =  Carbon::now();
        $dt= $dt->format('Y-m-d');

          foreach ($reservation_0_quotes as $reservation_0_quote)
            {
                    
                   
                    //  return $bookingDate_001[0];
                    $p = Reservation::findOrFail($reservation_0_quote->tgx);
                    
                 if($p-> quoteSelling_checkout==0)
                  {
                    // return $p;
                    if($dt>=$reservation_0_quote->checkoutDate)
                    {
                    $Date_Quote = $reservation_0_quote->checkoutDate;
                    // return $Date_Quote;
                    $QUOTE=Quote::where("DATE",$Date_Quote)->first(); 
                    }else{
                     $Date_Quote = explode(" ",$reservation_0_quote->bookingDate);
                     $QUOTE=Quote::where("DATE",$Date_Quote[0])->first(); 
                    }
                    
        
        
         
        
                                        if($reservation_0_quote->providerPrice_currency=='USD')
                                        {
                                            if($dt>=$reservation_0_quote->checkoutDate)
                                            $p-> quotePurchasing_checkout=$QUOTE->USD;
                                            else
                                            $p-> quotePurchasing_booking=$QUOTE->USD;
                                            $p -> save();
                                                if($reservation_0_quote->status != "OK")
                                                {
                                                $p -> un_pr_purchasing_EUR = $reservation_0_quote->cancellationPrice / $QUOTE->USD;
                                                $p -> save();
                                                }else
                                                {
                                                // $p-> un_pr_purchasing_EUR=$reservation_0_quote->providerPrice_amount / $QUOTE->USD;
                                                if($reservation_0_quote-> quotePurchasing_booking<=1)
                                                {$p-> un_pr_purchasing_EUR=$reservation_0_quote->providerPrice_amount * $QUOTE->USD;
                                                    // $p-> un_pr_selling_EUR= $reservation_0_quote->un_pr_purchasing_EUR * $reservation_0_quote-> quotePurchasing_booking;
                                                    $p -> save();
                                                }else{
                                                    $p-> un_pr_purchasing_EUR=$reservation_0_quote->providerPrice_amount / $QUOTE->USD;
                                                    // $p-> un_pr_selling_EUR= $reservation_0_quote->un_pr_purchasing_EUR / $reservation_0_quote-> quotePurchasing_booking;
                                                    $p -> save();
                                                }
                                                }
                                                // $p -> save();
                                        }
                                        else if($reservation_0_quote->providerPrice_currency=='MAD')
                                        {
                            
                                            //  $p-> quotePurchasing_booking=$QUOTE->MAD;
                                             if($dt>=$reservation_0_quote->checkoutDate)
                                             $p-> quotePurchasing_checkout=$QUOTE->MAD;
                                             else
                                             $p-> quotePurchasing_booking=$QUOTE->MAD;
                                             $p -> save();
                                            if($reservation_0_quote->status != "OK")
                                            {
                                              $p -> un_pr_purchasing_EUR = $reservation_0_quote->cancellationPrice * $QUOTE->MAD;
                                              $p -> save();
                                            }else
                                            {
                                            // $p-> un_pr_purchasing_EUR=$reservation_0_quote->providerPrice_amount * $QUOTE->MAD;
                                            if($reservation_0_quote-> quotePurchasing_booking<=1)
                                            {
                                                // return   $QUOTE->MAD;
                                                $p-> un_pr_purchasing_EUR= $reservation_0_quote->providerPrice_amount * $QUOTE->MAD;
                                                 $p -> save();
                                                 
                                            }else{
                                                
                                                $p-> un_pr_purchasing_EUR= $reservation_0_quote->providerPrice_amount / $QUOTE->MAD;
                                                 $p -> save();
                                            }
                                            }
                            
                                            // $p -> save();
                                        }
                                        else if($reservation_0_quote->providerPrice_currency=='EUR')
                                        {
                                            // $p-> quotePurchasing_booking=1;
                                            if($dt>=$reservation_0_quote->checkoutDate)
                                            $p-> quotePurchasing_checkout=1;
                                            else
                                            $p-> quotePurchasing_booking=1;
                                            $p -> save();
                                            if($reservation_0_quote->status != "OK")
                                            {
                                              $p -> un_pr_purchasing_EUR = $reservation_0_quote->cancellationPrice / 1;
                                              $p -> save();
                                            }else
                                            {
                                              $p-> un_pr_purchasing_EUR=$reservation_0_quote->providerPrice_amount / 1;  
                                              $p -> save();
                                            }
                                            
                            
                                            // $p -> save();
                                        }
                    
                                $p ->  marge = $p->un_pr_selling_EUR - $p->un_pr_purchasing_EUR;
                                if($reservation_0_quote->un_pr_purchasing_EUR !=0)
                                {
                                $p->Commission_bdsc = ($reservation_0_quote->un_pr_selling_EUR - $reservation_0_quote->un_pr_purchasing_EUR) / $reservation_0_quote->un_pr_purchasing_EUR;
                                // $p -> save();
                                }
                          
                          
                          $p -> save();
                           
                        //    return   $p ->  marge;
                        // return $reservation_0_quote->un_pr_selling_EUR;
                  }
            }
       }
       
      public function Confirm_HCN(Request $request)
        {
            // return $request;
            $resa =  Reservation::find($request['tgx']);
                
            $resa ->Etat_Hcn = 1;  
        
                    
             $resa -> save(); 
            return redirect()->back()->with('status','Reservation confirme successfully.');
            // return redirect()->route('reservation.index')
            // ->with('success','Reservation confirme successfully.');
            
        }
     

    public function search_sale_ajax(Request $request)
    {
        //get filter parametre
        //   return 'zakaria';
         //    dd($request);
        
         $rangeCalendarFlatpickr = $request->input('rangeCalendarFlatpickr');
         $date_to=explode("to", $rangeCalendarFlatpickr);
        //   return count($date_to);
        if($rangeCalendarFlatpickr!="")
        {
        
                if(count($date_to)==1)
                {
                    $start_date = $date_to[0];
                    $end_date = $date_to[0];
                }else
                {
                    $start_date = $date_to[0];
                    $end_date = $date_to[1]; 
                }
        }else
        {
            $start_date ="";
            $end_date = "";  
        }
        
        $date_type = $request->input('date_type');
        $Type_code = $request->input('Type_code');
        $Code = $request->input('Code');
        $status = $request->input('status');
        $hotel = $request->input('hotel');
        $agency = $request->input('agency');
        $provider = $request->input('provider');
        $Payment_Status = $request->input('Payment_Status');
        //  return  $Type_code;
        
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

     //  return  $matchThese;
        if($date_type != "" && $start_date != "" && $end_date != "" ){
            // DB::enableQueryLog();
            $reservations = Reservation::where($matchThese)
            // ->whereBetween($date_type, [$start_date, $end_date])
            ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
            ->whereDate($date_type,'>=', $start_date)
            ->whereDate($date_type,'<=',$end_date )
             ->orderBy($date_type,'Desc');
             if($Type_code != "")
             {
                 $reservations->where('reservations.'.$Type_code,'=',$Code);
             }
             $reservations= $reservations->get();
            // dd(DB::getQueryLog());
        }else{
            //  DB::enableQueryLog();
            $reservations = Reservation::limit(100)
            ->where($matchThese)
            ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h');

            if($Type_code != "")
            {
                $reservations->where('reservations.'.$Type_code,'=',$Code);
            }
            $reservations->orderBy('bookingDate','Desc');
           
            
            $reservations= $reservations->get();
            //   dd(DB::getQueryLog());
        }
        // return  $reservations;
        // return $rangeCalendarFlatpickr;
        $filter = [
            'Type_code' => $Type_code,
            'Code' => $Code,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'date_type' => $date_type,
            'status' => $status,
            'hotel' => $hotel,
            'agency' => $agency,
            'provider' => $provider,
            'Payment_Status' => $Payment_Status,
            'rangeCalendarFlatpickr ' => $rangeCalendarFlatpickr,


        ];
        //   return $filter;
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
                    if($t_un_purshase!=0)
                    $state_bdsc = ($t_un_sell - $t_un_purshase)/$t_un_purshase;
                    else
                    $state_bdsc =0;


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
        

        $sellers = Agencycontact::where('Contact_Type','SELLER')->get();
        $buyers = Agencycontact::where('Contact_Type','BUYER')->get();
        $city_listes = Hotellist::select('hotellists.City as City')-> groupBy('City')->get();
        $Country_listes = Hotellist::select('hotellists.Country as Country')-> groupBy('Country')->get();
        $hotels = Hotellist::get();
 
        $data = [
     
            'Reservations'=>$reservations,
            'filter' => $filter,
            'res_state'=> $res_state,
            'sellers'=> $sellers,
            'buyers'=> $buyers,
            'city_listes'=> $city_listes,
            'hotels'=> $hotels,
    
        ];    
         return $reservations;
        return view('sale_purchase',$data) ;    

        
    }
    public function search_sale(Request $request)
    {
        //get filter parametre
        // return 'zakaria';
        //    dd($request);
        
         $rangeCalendarFlatpickr = $request->input('rangeCalendarFlatpickr');
         $date_to=explode("to", $rangeCalendarFlatpickr);
        //   return count($date_to);
        if($rangeCalendarFlatpickr!="")
        {
        
                if(count($date_to)==1)
                {
                    $start_date = $date_to[0];
                    $end_date = $date_to[0];
                }else
                {
                    $start_date = $date_to[0];
                    $end_date = $date_to[1]; 
                }
        }else
        {
            $start_date ="";
            $end_date = "";  
        }
        
        $date_type = $request->input('date_type');
        $Type_code = $request->input('Type_code');
        $Code = $request->input('Code');
        $status = $request->input('status');
        $hotel = $request->input('hotel');
        $agency = $request->input('agency');
        $provider = $request->input('provider');
        $Payment_Status = $request->input('Payment_Status');
        //  return  $Type_code;
        
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

     //  return  $matchThese;
        if($date_type != "" && $start_date != "" && $end_date != "" ){
            // DB::enableQueryLog();
            $reservations = Reservation::where($matchThese)
            // ->whereBetween($date_type, [$start_date, $end_date])
            ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
            ->whereDate($date_type,'>=', $start_date)
            ->whereDate($date_type,'<=',$end_date )
             ->orderBy($date_type,'Desc');
             if($Type_code != "")
             {
                 $reservations->where('reservations.'.$Type_code,'=',$Code);
             }
             $reservations= $reservations->get();
            // dd(DB::getQueryLog());
        }else{
            //  DB::enableQueryLog();
            $reservations = Reservation::limit(100)
            ->where($matchThese)
            ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h');

            if($Type_code != "")
            {
                $reservations->where('reservations.'.$Type_code,'=',$Code);
            }
            $reservations->orderBy('bookingDate','Desc');
           
            
            $reservations= $reservations->get();
            //   dd(DB::getQueryLog());
        }
        // return  $reservations;
        // return $rangeCalendarFlatpickr;
        $filter = [
            'Type_code' => $Type_code,
            'Code' => $Code,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'date_type' => $date_type,
            'status' => $status,
            'hotel' => $hotel,
            'agency' => $agency,
            'provider' => $provider,
            'Payment_Status' => $Payment_Status,
            'rangeCalendarFlatpickr ' => $rangeCalendarFlatpickr,


        ];
        //   return $filter;
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
                    if($t_un_purshase!=0)
                    $state_bdsc = ($t_un_sell - $t_un_purshase)/$t_un_purshase;
                    else
                    $state_bdsc =0;


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
        // return $filter;
        return view('sale_purchase',$data) ;    

        
    }
    public function getAccessToken(Request $request)
    {
        // return 1;
    
        // return $request['data_reservation'];
    
        $client_id = '1000.YIYUYBX00819NAPR1F7LTNSWLIOKEZ';
        $client_secret = '654c9980d7894bb51ef2d723e96f36479eeacf2e23';
        $tokenEndpoint = 'https://accounts.zoho.com/oauth/v2/token';
        $authorizationCode = $request['code'];
         $data_reservation = $request['data_reservation'];
        $redirectURI = 'https://crm.bedsconnect.com/public/invoicing/sale/';
    
      $response = Http::asForm()->post($tokenEndpoint, [
           'code' => $authorizationCode,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirectURI,
            'grant_type' => 'authorization_code',
        ]);
    
        $responseData = $response->json();
        // return  $responseData;
        $accessToken = $responseData['access_token'];
        // return  $accessToken;
        // URL for the Zoho API endpoint to create a sales order
        $sales_order_api_url = "https://www.zohoapis.com/books/v3/salesorders?organization_id=773874311";
    
        // Add the access token to the request headers
        $headers = array(
            "Authorization" => "Zoho-oauthtoken " . $accessToken,
            "Content-Type" => "application/json"
        );
        $dt =  Carbon::now();
            $dt= $dt->format('Y-m-d');
            $date1= $dt;
            $date2 = date('Y-m-d', strtotime('+1 day'));     
             $date = new DateTime();
            $dateDeb = $date -> format('Y/m/01');
            $dateFin = $date -> format('Y/m/t');
            // return $dateFin;
              $reservations = Reservation::
            leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
          ->whereDate('bookingDate','>=',$date1 )
            ->whereDate('bookingDate','<=', $date2)
        //  ->where('tgx', 'FBGKM')
             ->where(function ($query) {
            $query->where('reservations.status', '=', 'ok')
                  ->orWhere('reservations.status', '=', 'cn')
                  ->where('reservations.sellingPrice_amount','!=',0)
                  ;
              })
             ->orderBy('bookingDate','DESC')
             ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
                ->get();
                $test_array=0;
                if($data_reservation)
                {
                    $reservations = $data_reservation;
                    $reservations = json_decode($reservations, true); 
                    $test_array=1;
                    //  return $reservations;
                }
                //  return $reservations ; 
         $i=0;
           foreach ($reservations as $rese)
              { 
                        if($test_array == 0)
                        {
                            // return 5555555555555555;
                                 $Hotellist = Hotellist::
                                where('Hotel_Code',$rese->hotelCode)
                                ->first();
                    
                                $Agencycontact = Agencycontact::
                                where('Agency_ID',$rese->clientCode)
                                ->first();
                        
                        
                                $data = [
                                    "customer_id" => $Agencycontact->ZohoID,
                                    "salesorder_number" => $rese->tgx,
                                    "reference_number" => $rese->provider_h,
                                    "date" => date('Y-m-d', strtotime($rese->bookingDate)),
                                    
                                     
                               "line_items" => [
                                        [
                                            "sku" => $rese->hotelCode,
                                            "name" => $Hotellist->Hotel_Name,
                                            "rate" => $rese->sellingPrice_amount,
                                            "quantity" => 1,
                                            "unit" => "qty",
                                           
                                         
                                            "item_custom_fields" => [
                                                 [
                                                      "api_name"=> "cf_numresa",
                                                      "value"=> $rese->tgx,
                                               
                                                ],
                                                 [
                                                      "api_name"=> "cf_date_reservation",
                                                      "value"=> date('Y-m-d', strtotime($rese->bookingDate)),
                                               
                                                ],
                                                 [
                                                      "api_name"=> "cf_chek_in",
                                                      "value"=> date('Y-m-d', strtotime($rese->checkinDate)),
                                               
                                                ],
                                                 [
                                                      "api_name"=> "cf_chek_out",
                                                      "value"=> date('Y-m-d', strtotime($rese->checkoutDate)),
                                               
                                                ],
                                                 [
                                                      "api_name"=> "cf_prov_resid",
                                                      "value"=> $rese->client,
                                               
                                                ]
                                  
                                             
                                            ],
                                        ],
                                    ],
                                ];
                        }else
                        {
                             //  return $rese['hotelCode'];
                                
                                         $Hotellist = Hotellist::
                                where('Hotel_Code',$rese['hotelCode'])
                                ->first();
                    
                                $Agencycontact = Agencycontact::
                                where('Agency_ID',$rese['clientCode'])
                                ->first();
                                
                                
                                $data = [
                                    "customer_id" => $Agencycontact->ZohoID,
                                    "salesorder_number" => $rese['tgx'],
                                    "reference_number" => $rese['provider_h'],
                                    "date" => date('Y-m-d', strtotime($rese['bookingDate'])),
                                   
                                     
                               "line_items" => [
                                        [
                                            "sku" => $rese['hotelCode'],
                                            "name" => $Hotellist->Hotel_Name,
                                            "rate" => $rese['sellingPrice_amount'],
                                            "quantity" => 1,
                                            "unit" => "qty",
                                             "discount" => $rese['commission_bdsc_binding'] ,
                                            "item_custom_fields" => [
                                                 [
                                                      "api_name"=> "cf_numresa",
                                                      "value"=> $rese['tgx'],
                                               
                                                ],
                                                 [
                                                      "api_name"=> "cf_date_reservation",
                                                      "value"=> date('Y-m-d', strtotime($rese['bookingDate'])),
                                               
                                                ],
                                                 [
                                                      "api_name"=> "cf_chek_in",
                                                      "value"=> date('Y-m-d', strtotime($rese['checkinDate'])),
                                               
                                                ],
                                                 [
                                                      "api_name"=> "cf_chek_out",
                                                      "value"=> date('Y-m-d', strtotime($rese['checkoutDate'])),
                                               
                                                ],
                                                 [
                                                      "api_name"=> "cf_prov_resid",
                                                      "value"=> $rese['client'],
                                               
                                                ]
                                  
                                             
                                            ],
                                        ],
                                    ],
                                ];
                        }
                
              
                $i=$i+1;
                 // Make the API request using Laravel's Http facade
              $response = Http::withHeaders($headers)->post($sales_order_api_url, $data);
              }
    
    
        // Get the response body as an array
        // $response_data = $response->json();   
        return redirect()->back()->with('status','Successfully');
    
    
        return $response_data;
       
    
     
    }
 public function getAccessToken_purchase(Request $request)
    {
        // return 1;
    
        // return $request['data_reservation'];
    
        $client_id = '1000.X0VZ0900A06J0IKEZY95BLMSDRPBKK';
        $client_secret = '297e7925a3b8866cc5a940950f2c1b8aed11215164';
        $tokenEndpoint = 'https://accounts.zoho.com/oauth/v2/token';
        $authorizationCode = $request['code'];
         $data_reservation = $request['data_reservation'];
        $redirectURI = 'https://crm.bedsconnect.com/public/invoicing/purchase/';
    
      $response = Http::asForm()->post($tokenEndpoint, [
           'code' => $authorizationCode,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirectURI,
            'grant_type' => 'authorization_code',
        ]);
        
        
        // $authorizationUrl_item = 'https://accounts.zoho.com/oauth/v2/auth';
        // $query_item = http_build_query([
        //     'client_id' => $client_id,
        //     'state' => '_item',
        //     'scope' => 'ZohoInventory.items.READ',
        //     'redirect_uri' => $redirectURI,
        //     'access_type' => 'offline',
        //     'response_type' => 'code',
        // ]);
        //   redirect("$authorizationUrl_item?$query_item");
          
        //   return 
    
        $responseData = $response->json();
         // return  $responseData;
        $accessToken = $responseData['access_token'];
        return  $accessToken;
        // URL for the Zoho API endpoint to create a sales order HCNVC
        $purchase_order_api_url = "https://inventory.zoho.com/inventory/v2/purchaseorders?organization_id=773874311";
    
        // Add the access token to the request headers
        $headers = array(
            "Authorization" => "Zoho-oauthtoken " . $accessToken,
            "Content-Type" => "application/json"
        );
        // die($accessToken);
        $dt =  Carbon::now();
            $dt= $dt->format('Y-m-d');
            $date1= $dt;
            $date2 = date('Y-m-d', strtotime('+1 day'));     
             $date = new DateTime();
            $dateDeb = $date -> format('Y/m/01');
            $dateFin = $date -> format('Y/m/t');
            // return $dateFin;
              $reservations = Reservation::
            leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
          ->whereDate('bookingDate','>=',$date1 )
            ->whereDate('bookingDate','<=', $date2)
        //  ->where('tgx', 'HBPKS')
             ->where(function ($query) {
            $query->where('reservations.status', '=', 'ok')
                  ->orWhere('reservations.status', '=', 'cn')
                  ->where('reservations.sellingPrice_amount','!=',0)
                  ;
              })
             ->orderBy('bookingDate','DESC')
             ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
                ->get();
                $test_array=0;
                if($data_reservation)
                {
                    $reservations = $data_reservation;
                    $reservations = json_decode($reservations, true); 
                    $test_array=1;
                    //  return $reservations;
                }
                //   return $reservations ; 
     $i=0;
           foreach ($reservations as $rese)
              { 
                       
                            // return $rese['hotelCode'];
                                 $Hotellist = Hotellist::
                                where('Hotel_Code',$rese['hotelCode'])
                                ->first();
                    
                                $Agencycontact = Agencycontact::
                                where('Agency_ID',$rese['clientCode'])
                                ->first();
                        // return  $Agencycontact;
                        
                    //   return $rese['hotelCode'];
                                    
                               
                        
                                $data = [
                                    "purchaseorder_number" => $rese['tgx'],
                                     "date" => date('Y-m-d', strtotime($rese['bookingDate'])),
                                     "reference_number" => $rese['provider_h'],
                                     "vendor_id" => 3125431000005947213,
                                     
                               "line_items" => [
                                        [
                                            
                                             "sku" =>$rese['hotelCode'] ,
                                             "name" => $Hotellist->Hotel_Name,
                                            //  "description" => "Just a sample description.",
                                            // "purchase_rate" => $rese['sellingPrice_amount'],
                                            // "quantity" => 1,
                                            // "unit" => "qty",
                                            
                                            // "item_custom_fields" => [
                                            //      [
                                            //           "api_name"=> "cf_numresa",
                                            //           "value"=> $rese['tgx'],
                                               
                                            //     ],
                                            //      [
                                            //           "api_name"=> "cf_date_reservation",
                                            //           "value"=> date('Y-m-d', strtotime($rese['bookingDate'])),
                                               
                                            //     ],
                                            //      [
                                            //           "api_name"=> "cf_chek_in",
                                            //           "value"=> date('Y-m-d', strtotime($rese['checkinDate'])),
                                               
                                            //     ],
                                            //      [
                                            //           "api_name"=> "cf_chek_out",
                                            //           "value"=> date('Y-m-d', strtotime($rese['checkoutDate'])),
                                               
                                            //     ],
                                            //      [
                                            //           "api_name"=> "cf_prov_resid",
                                            //           "value"=> $rese['client'],
                                               
                                            //     ]
                                  
                                             
                                            // ],
                                           
                                         
                                          
                                        ],
                                    ],
                                ];
                        
                
              
                $i=$i+1;
                 // Make the API request using Laravel's Http facade
              $response = Http::withHeaders($headers)->post($purchase_order_api_url, $data);
              }
    
    
        // Get the response body as an array
         $response_data = $response->json();   
        // return redirect()->back()->with('status','Successfully');
    
    
        return $response_data;
       
    
     
    }



    public function add_Note(Request $request)
    {
        //  return $request;
        $dt =  Carbon::now();
        $dt= $dt->format('Y-m-d');
        $date1= $dt;
        // return $date1;
        $resa =  Reservation::find($request['tgx']);
             
         $resa ->Note = $request['note'];  
      
        $resa -> save(); 
      return redirect()->back()->with('status','Successfully');
           
        //   return redirect()->route('reservation.index')
     //     ->with('success',' successfully.');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_reservation_crono()
    {
        // return 'fettah';
        ReservationController::getdata();
    }
    public function create(Request $request)
    {
        //get filter parametre
        
        //    dd($request);
        
         $rangeCalendarFlatpickr = $request->input('rangeCalendarFlatpickr');
         $date_to=explode("to", $rangeCalendarFlatpickr);
        //   return count($date_to);
        if($rangeCalendarFlatpickr!="")
        {
        
                if(count($date_to)==1)
                {
                    $start_date = $date_to[0];
                    $end_date = $date_to[0];
                }else
                {
                    $start_date = $date_to[0];
                    $end_date = $date_to[1]; 
                }
        }else
        {
            $start_date ="";
            $end_date = "";  
        }
        
        $date_type = $request->input('date_type');
        $Type_code = $request->input('Type_code');
        $Code = $request->input('Code');
        $status = $request->input('status');
        $hotel = $request->input('hotel');
        $agency = $request->input('agency');
        $provider = $request->input('provider');
        $Payment_Status = $request->input('Payment_Status');
        //  return  $Type_code;
        
        $matchThese = array();
        $a_status = ['status' => $status];
        $a_hotel = ['hotelCode' => $hotel];
        $a_agency = ['clientCode' => $agency];
        $a_provider = ['providerCode' => $provider];
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

     //  return  $matchThese;
        if($date_type != "" && $start_date != "" && $end_date != "" ){
            //  DB::enableQueryLog();
            $reservations = Reservation::where($matchThese)
            // ->whereBetween($date_type, [$start_date, $end_date])
            ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
            ->whereDate($date_type,'>=', $start_date)
            ->whereDate($date_type,'<=',$end_date )
             ->orderBy($date_type,'Desc');
             if($Type_code != "")
             {
                 $reservations->where('reservations.'.$Type_code,'=',$Code);
             }
             $reservations= $reservations->get();
            // dd(DB::getQueryLog());
        }else{
            
             $dt =  Carbon::now();
            $dt= $dt->format('Y-m-d');
            $date1= $dt;
            $date2 = date('Y-m-d', strtotime('+1 day'));  
            
            //  DB::enableQueryLog();
            $reservations = Reservation::limit(100)
            ->where($matchThese)
            ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h');

            if($Type_code != "")
            {
                $reservations->where('reservations.'.$Type_code,'=',$Code);
            }else{
                $reservations->whereDate('bookingDate','>=',$date1 );
                $reservations->whereDate('bookingDate','<=', $date2);
            }
            
            $reservations->orderBy('bookingDate','Desc');
           
            
            $reservations= $reservations->get();
            //   dd(DB::getQueryLog());
        }
        // return  $reservations;
        // return $rangeCalendarFlatpickr;
        $filter = [
            'Type_code' => $Type_code,
            'Code' => $Code,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'date_type' => $date_type,
            'status' => $status,
            'hotel' => $hotel,
            'agency' => $agency,
            'provider' => $provider,
            'Payment_Status' => $Payment_Status,
            'rangeCalendarFlatpickr ' => $rangeCalendarFlatpickr,


        ];
        //   return $filter;
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
                    if($t_un_purshase!=0)
                    $state_bdsc = ($t_un_sell - $t_un_purshase)/$t_un_purshase;
                    else
                    $state_bdsc =0;


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
        
        $agency_contact = Agencycontact::
        where('Contact_Type','SELLER')->get();
         $sellers = Agencycontact::where('Contact_Type','SELLER')->get();
        $buyers = Agencycontact::where('Contact_Type','BUYER')->get();
        $city_listes = Hotellist::select('hotellists.City as City')-> groupBy('City')->get();
        $Country_listes = Hotellist::select('hotellists.Country as Country')-> groupBy('Country')->get();
        $hotels = Hotellist::limit(10)->get();
 
        $data = [
     
            'Reservations'=>$reservations,
            'filter' => $filter,
            'res_state'=> $res_state,
            'agency_contact'=> $agency_contact,
            'sellers'=> $sellers,
            'buyers'=> $buyers,
            'city_listes'=> $city_listes,
            'hotels'=> $hotels,
    
        ];
        
        
 
        // $data = [
     
        //     'Reservations'=>$reservations,
        //     'filter' => $filter,
        //     'res_state'=> $res_state,
        //     'agency_contact'=> $agency_contact,
    
        // ];    
        // return $filter;
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
        // return 'fff';
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
    public function update_innvioce(Request $request)
    {
        // return $request;
        $data= $request->all();
        $invoice_status_seller= $data['invoice_status_seller'];
        $id_tgx= $data['tgx'];
        $invoice_status_buyer = $data['invoice_status_buyer'];
        $Payment_Status =$data['Payment_Status']; 


        $Reservation = Reservation::find($id_tgx); 
        $Reservation-> invoice_status_seller=$invoice_status_seller;
        $Reservation-> invoice_status_buyer=$invoice_status_buyer;
        $Reservation-> Payment_Status=$Payment_Status;
        $Reservation -> save();
        // return $p;

        return redirect()->back()->with('status',' Changement confirmé.');
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
        
       

        if (Auth::guard()->user()->role==1)
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
            'HCN_AC' => 'nullable',
            'providerCode' => 'nullable',


            ]);

            // return $request->all();
            $data = $request->all();
            $reservation =  Reservation::find($data['tgx']);
            $reservation->update($request->all());  
        }
        else
        {
            $data = $request->all();
            $Reservation =  Reservation::find($data['tgx']);
             
            $Reservation ->HCN_AC = $data['HCN_AC'];  
          
            
           $Reservation -> save(); 
        }
        
     return redirect()->back()->with('status','Reservation updated successfully');
        // return redirect()->route('reservation.index')
        //                 ->with('success','Reservation updated successfully');
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
    


    /////////API New
    public function getdata()
    {
            
        $Booking_to_D =  date("Y-m-d");
            //   $Booking_to_D =  date("2024-07-09");
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

                
            //    $date1=date("2023-03-26");              
                            
            //     $date2 = date('Y-m-d', strtotime($date1 . " +6 day"));
            //    return $date2;
                    
    
            $accesToken = "++CiXsABSFv0Y+3O941KDdJBroKDmz0vN1paiflJcN0=";
            $password = "QVyoJPQXM89az4J4";

            //   for ($i=0; $i <100 ; $i++) 
            //     { 
                // $access = array('accessToken' => $accesToken, 'password'=> $password );
                // $bookingDate = array('from' => $date1, 'to'=> $date2);
    
            $access = array('accessToken' => $accesToken, 'password'=> $password );
            $bookingDate = array('from' => $Booking_from_D, 'to'=> $Booking_to_D );


            //   return $bookingDate;
            $Req_W_CN = array("access" => $access,"bookingDate" => $bookingDate, "includeCancellations"=>true);
    
            //  $reservation_alls=Reservation::whereDate('bookingDate','=',$dateapi)->get(); 
            //   return $Req_W_CN;
                try {
                    $result = ReservationController::getData_API($Req_W_CN);
                    //print_r(" 1  ") ;
            //   return $result["reservationSearchRS"];
                    // echo 'fettah : '. $result["reservationSearchRS"];
                    
                    if ($result["reservationSearchRS"]){
                        //  print_r(  $result["reservationSearchRS"]);
                        foreach ($result["reservationSearchRS"] as $key => $value) {
                            
                            
                                // print_r(" 1  ") ;
                            $res = new Res_obj($result["reservationSearchRS"][$key]);
                        
                                
                                if($res->status != 'KUN'){
                                    
                                    $Reservation__check=Reservation::where("tgx",$res->tgx)->where("providerCode",$res->providerCode)->where("clientCode",$res->clientCode)->first(); 
                                    $providerCode =  $res->providerCode; 
                                    $clientCode =  $res->clientCode; 
                
                                    if($Reservation__check != ""){
                                    $providerCode_1 = $Reservation__check->providerCode;
                                    $clientCode_1 = $Reservation__check->clientCode;
                                    }else{
                                    $providerCode_1 ="";
                                    $clientCode_1 ="";
                                    }
                                    
                                }else{
                                    $providerCode =  ""; 
                                    $providerCode_1 = "";
                                    $clientCode =  ""; 
                                    $clientCode_1 = "";
                                    
                                    }
                                    //  print_r( ' '. $res->tgx .' --- '.$providerCode_1);
                                    
                                    if ($res->status != "OK" && $res->status != "KUN" && Reservation::find($res->tgx) &&  $providerCode ==  $providerCode_1 &&  $clientCode ==  $clientCode_1 ){
                                            //   return '1';
                                            //  return $result["reservationSearchRS"][$key]["locators"]["client"];
                                            $resa = Reservation::where("tgx",$res->tgx)->where("providerCode",$res->providerCode)->where("clientCode",$res->clientCode)->first(); 
                                            //   return $resa->tgx;
                                            $resa -> status = $res->status;
                                            $resa -> summaryStatus = $res->summaryStatus;
                                            $resa -> internalStatus = $res->internalStatus;
                                            $resa -> bookingStatus = $res->bookingStatus;
                
                                            $resa -> cancellationDate = $res->cancellationDate;
                
                                            //bookingDate = LastActionDate
                                            //   $lastActionDate= date('d-m-Y', strtotime($res->lastActionDate));
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
                                
                                            $cancellationDate = explode(" ", $res->cancellationDate);
            
                                            $QUOTE=Quote::where("DATE",$cancellationDate[0])->first(); 
                                            //    return $QUOTE->USD;
                                                //united Price case Status CN
                                                if($res -> cancellationPrice_currency == 'EUR'){
                                                    $diffrent = 1 ;
                                                }elseif($res -> cancellationPrice_currency == 'USD'){
                                                    // return 'fff';
                                                    $diffrent = $QUOTE->USD;                                
                                                }elseif($res -> cancellationPrice_currency == 'MAD'){
                                                    $diffrent = $QUOTE->MAD ;
                                                }
                                            
                                                
                                                if($res -> cancellationPrice_currency == null){
                                                
                                                }else{
                                                    
                                                    if($res -> cancellationPrice_currency == 'EUR')
                                                    { 
                                                        
                                                        $un_pr_selling_EUR = $res -> cancellationPrice_amount * $diffrent;
            
                                                        $resa -> un_pr_selling_EUR = $un_pr_selling_EUR;
            
                                                    }
                                                    elseif($res -> cancellationPrice_currency == 'USD'){
            
                                                        if($diffrent>=1)
                                                        {
                                                        $un_pr_selling_EUR = $res -> cancellationPrice_amount / $diffrent;
            
                                                        }else{
                                                            $un_pr_selling_EUR = $res -> cancellationPrice_amount * $diffrent;
                                                        }
            
                                                        $resa -> un_pr_selling_EUR = $un_pr_selling_EUR;                             
                                                    }elseif($res -> cancellationPrice_currency == 'MAD'){
                                                        if($diffrent>=1)
                                                        {
                                                        $un_pr_selling_EUR = $res -> cancellationPrice_amount / $diffrent;  
                                                        }else{
                                                            $un_pr_selling_EUR = $res -> cancellationPrice_amount * $diffrent;
                                                        }
            
                                                    $resa -> un_pr_selling_EUR = $un_pr_selling_EUR;
                                                    }
                                                    
                                                }
            
                                                /////////////////////////
            
                                            
                                        
            
                                        $resa -> cancellationPrice_currency = $res -> cancellationPrice_currency ;
                                        $resa -> cancellationPrice_amount = $res -> cancellationPrice_amount ;
                                        $resa -> cancellationPrice_binding = $res -> cancellationPrice_binding ;
                                        $resa -> cancellationPrice_commission = $res -> cancellationPrice_commission;
            
                                        $resa -> save();
            
                                    }
                                    else{
                                        
                                    $count_tgx = $reservations = Reservation::where('tgx',$res->tgx)->count(); 
                                    //   print_r(' $res->tgx :  '. $res->tgx);
                                    
                                        if (!Reservation::find($res->tgx)  ||  (Reservation::find($res->tgx) && $providerCode !=  $providerCode_1 && $clientCode !=  $clientCode_1 && $count_tgx == 1)){
                                            // print_r(' $res->tgx :  '. $res->tgx); 
                                            return  $res->Save_Res();
                                            
                                        }
                                    
                                    }
                            //  }else{
                            //       print_r($res->tgx);
                            //      return  $res->Save_Res();
                            //  }
                            

                        }

                        // dd($bookingDate,$result);
                    

                    }
                    
                } catch ( Exception $e) {
                    echo $e -> getMessage();
                }
            //      $date1=$date2;              
                            
            //      $date2 = date('Y-m-d', strtotime($date1 . " +7 day"));
            // }


        $Booking_to_D_1 =  date("Y-m-d");

            $Booking_from_D_1 = date('Y-m-d', strtotime($Booking_to_D . " - 1 day"));

            $accesToken_1 = "9+F3anOx2FTiBxeW0OPZ0ujTR5VYCbtrRALONciTk9c=";
            $password_1 = "CyxL829raKXp";


                //         $access = array('accessToken' => $accesToken, 'password'=> $password );
                // $bookingDate = array('from' => $date1, 'to'=> $date2);
    
                $access = array('accessToken' => $accesToken_1, 'password'=> $password_1 );
            $bookingDate = array('from' => $Booking_from_D_1, 'to'=> $Booking_to_D_1);


            //   return $bookingDate;
            $Req_W_CN = array("access" => $access,"bookingDate" => $bookingDate, "includeCancellations"=>true);
            //  $dateapi=date('Y-m-d', strtotime('-1 day'));

            //  $reservation_alls=Reservation::whereDate('bookingDate','=',$dateapi)->get(); 
        //   return $Req_W_CN;
                try {
                    $result = ReservationController::getData_API($Req_W_CN);
                    
                        //   return $result["reservationSearchRS"];
                    if ($result["reservationSearchRS"]){
                    
                        foreach ($result["reservationSearchRS"] as $key => $value) {
                            
                                //  return $result["reservationSearchRS"][5];
                            $res = new Res_obj($result["reservationSearchRS"][$key]);

                            //  if()
                            
                            //  $aa= Reservation::find('HBPVT');
                            //  return $aa;
                            //  return $aa -> cancellationPrice_currency;
                            if ($res->status != "OK" && Reservation::find($res->tgx) ){
                                
                                $resa =  Reservation::find($res->tgx);
                                //   return $resa->tgx;
                                $resa -> status = $res->status;
                                $resa -> summaryStatus = $res->summaryStatus;
                                $resa -> internalStatus = $res->internalStatus;
                                $resa -> bookingStatus = $res->bookingStatus;

                                $resa -> cancellationDate = $res->cancellationDate;

                                //bookingDate = LastActionDate
                                //   $lastActionDate= date('d-m-Y', strtotime($res->lastActionDate));
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
                        
                                    $cancellationDate = explode(" ", $res->cancellationDate);

                                $QUOTE=Quote::where("DATE",$cancellationDate[0])->first(); 
                                //    return $QUOTE->USD;
                                        //united Price case Status CN
                                        if($res -> cancellationPrice_currency == 'EUR'){
                                            $diffrent = 1 ;
                                        }elseif($res -> cancellationPrice_currency == 'USD'){
                                            // return 'fff';
                                            $diffrent = $QUOTE->USD;                                
                                        }elseif($res -> cancellationPrice_currency == 'MAD'){
                                            $diffrent = $QUOTE->MAD ;
                                        }
                                    // if($res->tgx=='HBPVT')
                                    // {
                                    //  return  'ggg'. $res -> cancellationPrice_currency;
                                    // }
                                        
                                        if($res -> cancellationPrice_currency == null){
                                        // return 'dd'.$res->tgx;
                                        }else{
                                            //  return  'ggg'.$res->tgx;
                                            if($res -> cancellationPrice_currency == 'EUR')
                                            { 
                                                
                                                $un_pr_selling_EUR = $res -> cancellationPrice_amount * $diffrent;

                                                $resa -> un_pr_selling_EUR = $un_pr_selling_EUR;

                                            }
                                            elseif($res -> cancellationPrice_currency == 'USD'){

                                                if($diffrent>=1)
                                                {
                                                $un_pr_selling_EUR = $res -> cancellationPrice_amount / $diffrent;

                                                }else{
                                                    $un_pr_selling_EUR = $res -> cancellationPrice_amount * $diffrent;
                                                }

                                                $resa -> un_pr_selling_EUR = $un_pr_selling_EUR;                             
                                            }elseif($res -> cancellationPrice_currency == 'MAD'){
                                                if($diffrent>=1)
                                                {
                                                $un_pr_selling_EUR = $res -> cancellationPrice_amount / $diffrent;  
                                                }else{
                                                    $un_pr_selling_EUR = $res -> cancellationPrice_amount * $diffrent;
                                                }

                                            $resa -> un_pr_selling_EUR = $un_pr_selling_EUR;
                                            }
                                            
                                        }

                                        /////////////////////////

                                    
                                

                                $resa -> cancellationPrice_currency = $res -> cancellationPrice_currency ;
                                $resa -> cancellationPrice_amount = $res -> cancellationPrice_amount ;
                                $resa -> cancellationPrice_binding = $res -> cancellationPrice_binding ;
                                $resa -> cancellationPrice_commission = $res -> cancellationPrice_commission;

                                $resa -> save();

                            }
                            else{
                                
                        //   return 'ggg'.Reservation::find($res->tgx);
                                if (!Reservation::find($res->tgx)){
                                    //  return 'ggg';
                                    // return $res->status ;
                            //    return  $res->get();
                            return  $res->Save_Res();
                                }
                            }
                            

                        }

                        // dd($bookingDate,$result);
                    

                    }
                    
                } catch ( Exception $e) {
                    // echo $e -> getMessage();
                }
            //      $date1=$date2;              
                            
            //      $date2 = date('Y-m-d', strtotime($date1 . " +7 day"));
        



    }
  
    // public function getdata()
    // {
    //     $startDate = '2024-10-08'; // Date de départ
    //     $endDate = date('Y-m-d');  // Date actuelle
    //     $accesToken = "++CiXsABSFv0Y+3O941KDdJBroKDmz0vN1paiflJcN0=";
    //     $password = "QVyoJPQXM89az4J4";
    
    //     while (strtotime($startDate) < strtotime($endDate)) {
    //         // Calcul de la plage de 6 jours
    //         $bookingFrom = $startDate;
    //         $bookingTo = date('Y-m-d', strtotime($bookingFrom . " +5 day"));
    //         if (strtotime($bookingTo) > strtotime($endDate)) {
    //             $bookingTo = $endDate; // S'assurer de ne pas dépasser la date actuelle
    //         }
    
    //         // Préparation des données pour l'API
    //         $access = array('accessToken' => $accesToken, 'password' => $password);
    //         $bookingDate = array('from' => $bookingFrom, 'to' => $bookingTo);
    //         $Req_W_CN = array(
    //             "access" => $access,
    //             "bookingDate" => $bookingDate,
    //             "includeCancellations" => true
    //         );
    
    //         try {
    //             $result = ReservationController::getData_API($Req_W_CN);
    
    //             if (isset($result["reservationSearchRS"]) && is_array($result["reservationSearchRS"])) {
    //                 foreach ($result["reservationSearchRS"] as $key => $value) {
    //                     $res = new Res_obj($value);
    
    //                     if ($res->status != 'KUN') {
    //                         // Vérifier ou mettre à jour les données de la réservation
    //                         $Reservation__check = Reservation::where("tgx", $res->tgx)
    //                             ->where("providerCode", $res->providerCode)
    //                             ->where("clientCode", $res->clientCode)
    //                             ->first();
    
    //                         if ($Reservation__check) {
    //                             // Mettre à jour la réservation existante
    //                             $Reservation__check->status = $res->status;
    //                             $Reservation__check->bookingDate = $res->lastActionDate;
    //                             $Reservation__check->save();
    //                         } else {
    //                             // Ajouter une nouvelle réservation
    //                             $res->Save_Res();
    //                         }
    //                     }
    //                 }
    //             }
    //         } catch (Exception $e) {
    //             echo "Erreur : " . $e->getMessage();
    //         }
    
    //         // Passer à la prochaine tranche de 6 jours
    //         $startDate = date('Y-m-d', strtotime($bookingTo . " +1 day"));
    //     }
    // }
    
  
    function getData_API_Detail($data){
        // return $data;
        $urlSearch = "https://distribution.travelgatex.com/reservation/api/read";
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
    public function getdetail(Request $request)
    {
        $data= $request->all();
        $tgx = $data['tgx'];
            $accesToken = "++CiXsABSFv0Y+3O941KDdJBroKDmz0vN1paiflJcN0=";
            $password = "QVyoJPQXM89az4J4";
            $access = array('accessToken' => $accesToken, 'password'=> $password );
            $tgxLocators = array($tgx);
            $Req_W_CN_DT = array("access" => $access,'tgxLocators' => $tgxLocators);
            $result_detail = ReservationController::getData_API_Detail($Req_W_CN_DT);
            return  $result_detail['reservationReadRS'];
    }

    function getData_API($data){
            // return $data;
        $urlSearch = "https://distribution.travelgatex.com/reservation/api/search";
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
     
  
}