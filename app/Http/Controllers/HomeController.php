<?php

namespace App\Http\Controllers;

use App\Models\Hotellist;
use App\Models\Agencycontact;
use App\Models\Client_seller;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
          $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
       public function index()
    {

        $dt01 =  Carbon::now();
        $dt= date('Y-m-d');
        $ans_revenu= date('Y');
        $date_revenu=$ans_revenu.'-01-01 00:00:00';
         $ans_pre = $ans_revenu - 2;
          $ans_pre_plus = $ans_pre  + 1;
         $ans_pre=$ans_pre.'-01-01';
          $ans_pre_plus=$ans_pre_plus.'-01-01';
        $date2 = date('Y-m-d', strtotime('+1 day'));
        $date_semaine = date('Y-m-d', strtotime('-7 day'));
        //return $dt.' / '. $date2;
        $formattedDate = $dt01->format('H:i:s');
     //  return $date_revenu;
     
        // $revenu = Reservation::
        // // whereDate('bookingDate','>=', $date2)
        // join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
        // ->whereDate('bookingDate','>=','2023-01-24' )
        // ->whereDate('bookingDate','<=', $date2)
        //  ->orderBy('bookingDate','DESC')
        //  ->select('SUM(un_pr_selling_EUR)')
        //  ->groupby()
        // ->get();
            $records_semaine =Reservation::
            leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->whereDate('bookingDate','>=',$date_semaine)
            ->whereDate('bookingDate','<=',$dt)
            ->where('status','OK')
            ->selectRaw('DATE_FORMAT(bookingDate, "%m/%d") as date_jour, SUM(un_pr_selling_EUR) as total')
            ->groupBy('date_jour')
            ->get();
            // if($reser->status == 'OK' OR $reser->status == 'CN-FEE'  OR $reser->status == 'CN-NRF'  OR $reser->status == 'NO-SHOW' )
             $records =Reservation::
            // leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            whereDate('bookingDate','>=',$date_revenu)
            ->where('status','OK')
            //  ->orwhere('status','CN-FEE')
            //   ->orwhere('status','CN-NRF')
            //   ->orwhere('status','NO-SHOW')
            //  ->where('sellingPrice_binding',0)
            ->selectRaw('DATE_FORMAT(bookingDate, "%m") as date_month, SUM(un_pr_selling_EUR) as total, SUM(un_pr_purchasing_EUR) as total_purchsing')
            ->groupBy('date_month')
            ->get();
            // return  $records;
            
            
              $records_binding =Reservation::
            join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            ->whereDate('bookingDate','>=',$date_revenu)
            ->where('status','OK')
            ->where('sellingPrice_binding',1)
            ->selectRaw('DATE_FORMAT(bookingDate, "%m") as date_month, SUM(un_pr_selling_EUR) as total, SUM(un_pr_purchasing_EUR) as total_purchsing')
            ->groupBy('date_month')
            ->get();
            
            
            
            $records_prece_1 =Reservation::
            whereDate('bookingDate','>=',$ans_pre)
      
           ->selectRaw('DATE_FORMAT(bookingDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
            ->groupBy('date_month')
           ->get();

            $records_prece_ans_pre_plus =Reservation::
            whereDate('bookingDate','>=',$ans_pre_plus)
   
            ->where('status','OK')
           
           ->selectRaw('DATE_FORMAT(bookingDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
            ->groupBy('date_month')
           ->get();
           $records_prece =Reservation::
           whereDate('bookingDate','>=',$date_revenu)

           ->where('status','OK')         
          ->selectRaw('DATE_FORMAT(bookingDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
           ->groupBy('date_month')
          ->get();
          
        //   DB::enableQueryLog();
          
           $records_prece_1_checkout =Reservation::
          whereDate('checkoutDate','>=',$ans_pre)
        //   ->whereDate('checkoutDate','<',$ans_pre_plus)
         ->where('status','OK')
         ->selectRaw('DATE_FORMAT(checkoutDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
          ->groupBy('date_month')
         ->get();
    //   dd(DB::getQueryLog());
//   DB::enableQueryLog();
          $records_prece_ans_pre_plus_checkout =Reservation::
          whereDate('checkoutDate','>=',$ans_pre_plus)
        //   ->whereDate('checkoutDate','<',$date_revenu)
 
         ->where('status','OK')
         
         ->selectRaw('DATE_FORMAT(checkoutDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
          ->groupBy('date_month')
         ->get();
        //  dd(DB::getQueryLog());
         $records_prece_checkout =Reservation::
         whereDate('checkoutDate','>=',$date_revenu)

          ->where('status','OK')         
        ->selectRaw('DATE_FORMAT(checkoutDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
         ->groupBy('date_month')
        ->get();
        
        
        
           $records_prece_1_checkin =Reservation::
        whereDate('checkinDate','>=',$ans_pre)
        ->where('status','OK')
       ->selectRaw('DATE_FORMAT(checkinDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
        ->groupBy('date_month')
       ->get();

        $records_prece_ans_pre_plus_checkin =Reservation::
        whereDate('checkinDate','>=',$ans_pre_plus)

        ->where('status','OK')
       
       ->selectRaw('DATE_FORMAT(checkinDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
        ->groupBy('date_month')
       ->get();
       $records_prece_checkin =Reservation::
       whereDate('checkinDate','>=',$date_revenu)

       ->where('status','OK')         
      ->selectRaw('DATE_FORMAT(checkinDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
       ->groupBy('date_month')
      ->get();
      
      
            $records_1 =Reservation::
            leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            ->whereDate('checkoutDate','>=',$date_revenu)
            ->where('status','OK')
            ->selectRaw('DATE_FORMAT(checkoutDate, "%m") as date_month, SUM(un_pr_selling_EUR) as total, SUM(un_pr_purchasing_EUR) as total_purchsing')
            ->groupBy('date_month')
            ->get();
            $records_2=Reservation::
            leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            ->whereDate('checkinDate','>=',$date_revenu)
            ->where('status','OK')
            ->selectRaw('DATE_FORMAT(checkinDate, "%m") as date_month, SUM(un_pr_selling_EUR) as total, SUM(un_pr_purchasing_EUR) as total_purchsing')
            ->groupBy('date_month')
            ->get();

            // return $records;

        $reservations = Reservation::
        // whereDate('bookingDate','>=', $date2)
        join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
        ->whereDate('bookingDate','>=',$dt)
        ->whereDate('bookingDate','<=', $date2)
         ->orderBy('bookingDate','DESC')
         ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
            ->get();

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
        $t_un_sell_cn=0;
        $t_un_sell_ok=0;
        $res_count_st_cn=0;
        $res_count_st_ck=0;
        $res_count_st_KUN=0;
        $res_count_st_CN_FEE=0;
        $res_count_stCN_NRF=0;
        $res_count_st_NO_SHOW=0;
        $res_marge=0;
        foreach ($reservations as $reser) {
            $res_count_st_all = $res_count_st_all + 1 ;
            if($reser->status == 'CN')
            {
                $t_un_sell_cn = $t_un_sell_cn + $reser->sellingPrice_amount;
            }elseif($reser->status == 'OK')
            {
                $t_un_sell_ok = $t_un_sell_ok + $reser->sellingPrice_amount;
            }

            $res_marge = $res_marge + $reser-> marge;
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
            if($reser->status == 'CN') {$res_count_st_cn = $res_count_st_cn + 1;} 
             if($reser->status == 'CK') {$res_count_st_ck = $res_count_st_ck + 1;} 
            if($reser->status == 'KUN') {$res_count_st_KUN = $res_count_st_KUN + 1;} 
            if($reser->status == 'CN-FEE') {$res_count_st_CN_FEE = $res_count_st_CN_FEE + 1;} 
            if($reser->status == 'CN-NRF') {$res_count_stCN_NRF = $res_count_stCN_NRF + 1;} 
            if($reser->status == 'NO-SHOW') {$res_count_st_NO_SHOW = $res_count_st_NO_SHOW + 1;} 

        }
     //  return 'CN'.$res_count_st_cn.' KUN : '.$res_count_st_KUN;
        if($res_count_st_all_exept3 == 0){
            $t_un_sell = 0 ;
            $t_un_purshase = 0 ;
            $t_un_sell_cn = 0 ;
            $t_un_sell_ok = 0 ;
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
            't_un_purshase' => $t_un_purshase,
            't_un_sell_cn' => $t_un_sell_cn,
            't_un_sell_ok' => $t_un_sell_ok,
            'res_count_st_cn' => $res_count_st_cn,
            'res_count_st_ck' => $res_count_st_ck,
            'res_count_st_KUN' => $res_count_st_KUN,
            'res_count_st_CN_FEE' => $res_count_st_CN_FEE,
            'res_count_stCN_NRF' => $res_count_stCN_NRF,
            'res_count_st_NO_SHOW' => $res_count_st_NO_SHOW,
            'res_marge' => $res_marge,
            
        );
        

            $data = [
                'category_name' => 'dashboard',
                'page_name' => 'sales',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'res_state'=> $res_state,
                'records'=> $records,
                'records_binding' =>$records_binding,
                'records_1'=>$records_1,
                'records_2'=>$records_2,
                 'records_prece'=>$records_prece,
                'records_prece_ans_pre_plus'=>$records_prece_ans_pre_plus,
                'records_prece_1'=>$records_prece_1,
                'records_prece_checkout'=>$records_prece_checkout,
                'records_prece_ans_pre_plus_checkout'=>$records_prece_ans_pre_plus_checkout ,
                'records_prece_1_checkout'=>$records_prece_1_checkout,
                 'records_prece_checkin'=>$records_prece_checkin,
                'records_prece_1_checkin'=>$records_prece_1_checkin,
                'records_prece_ans_pre_plus_checkin'=>$records_prece_ans_pre_plus_checkin,
                'records_semaine'=>$records_semaine,
            ];
        // return $records;
        // $pageName = 'analytics';
        return view('dashboard')->with($data);
    }
    
    
    public function index1()
    {


// 

        $dt01 =  Carbon::now();
        $dt= date('Y-m-d');
        $ans_revenu= date('Y');
        $date_revenu=$ans_revenu.'-01-01';
         $ans_pre = $ans_revenu - 1;
         $ans_pre=$ans_pre.'-01-01';
        $date2 = date('Y-m-d', strtotime('+1 day'));
        $date_semaine = date('Y-m-d', strtotime('-7 day'));
        // return $dt.' / '. $date_semaine;
        $formattedDate = $dt01->format('H:i:s');
     //  return $date_revenu;
    //   return 'fettah 0 ';
   
     $Seller_top =Reservation::limit(10)
    //  ->join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
     ->select('reservations.providerName as providerName',DB::raw('COUNT(tgx) as count_tgx'),DB::raw('SUM(marge) as marge_tgx'))
     ->groupBy('providerName')
     ->orderBy('count_tgx','DESC')
     ->get();
       
     $Buyer_top =Reservation::limit(10)
    //  ->join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
     ->select('reservations.clientCode as clientCode',DB::raw('COUNT(tgx) as count_tgx'),DB::raw('SUM(marge) as marge_tgx'))
     ->groupBy('clientCode')
     ->orderBy('count_tgx','DESC')
     ->get();
       DB::enableQueryLog();
     $City_top =Reservation::limit(10)
      ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
     ->select('hotellists.City as City',DB::raw('COUNT(tgx) as count_tgx'),DB::raw('SUM(marge) as marge_tgx'))
     ->groupBy('City')
     ->orderBy('count_tgx','DESC')
     ->get();
       dd(DB::getQueryLog());
        // return 'fettah 2 ';
     $Destination_top =Reservation::limit(10)
     ->join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
     ->select('hotellists.Country as Country',DB::raw('COUNT(tgx) as count_tgx'),DB::raw('SUM(marge) as marge_tgx'))
     ->groupBy('Country')
     ->orderBy('count_tgx','DESC')
     ->get();

     
     
        // return 'fettah';
        

            // return $records;

        $reservations = Reservation::
        // whereDate('bookingDate','>=', $date2)
        join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
   
         ->orderBy('bookingDate','DESC')
         ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
            ->get();

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
        $t_un_sell_cn=0;
        $t_un_sell_ok=0;
        $res_count_st_cn=0;
        $res_count_st_KUN=0;
        $res_count_st_CN_FEE=0;
        $res_count_stCN_NRF=0;
        $res_count_st_NO_SHOW=0;
        $res_marge=0;
        foreach ($reservations as $reser) {
            $res_count_st_all = $res_count_st_all + 1 ;
            if($reser->status == 'CN')
            {
                $t_un_sell_cn = $t_un_sell_cn + $reser->sellingPrice_amount;
            }elseif($reser->status == 'OK')
            {
                $t_un_sell_ok = $t_un_sell_ok + $reser->sellingPrice_amount;
            }

            $res_marge = $res_marge + $reser-> marge;
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
            if($reser->status == 'CN') {$res_count_st_cn = $res_count_st_cn + 1;} 
            if($reser->status == 'KUN') {$res_count_st_KUN = $res_count_st_KUN + 1;} 
            if($reser->status == 'CN-FEE') {$res_count_st_CN_FEE = $res_count_st_CN_FEE + 1;} 
            if($reser->status == 'CN-NRF') {$res_count_stCN_NRF = $res_count_stCN_NRF + 1;} 
            if($reser->status == 'NO-SHOW') {$res_count_st_NO_SHOW = $res_count_st_NO_SHOW + 1;} 

        }
     //  return 'CN'.$res_count_st_cn.' KUN : '.$res_count_st_KUN;
        if($res_count_st_all_exept3 == 0){
            $t_un_sell = 0 ;
            $t_un_purshase = 0 ;
            $t_un_sell_cn = 0 ;
            $t_un_sell_ok = 0 ;
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
            't_un_purshase' => $t_un_purshase,
            't_un_sell_cn' => $t_un_sell_cn,
            't_un_sell_ok' => $t_un_sell_ok,
            'res_count_st_cn' => $res_count_st_cn,
            'res_count_st_KUN' => $res_count_st_KUN,
            'res_count_st_CN_FEE' => $res_count_st_CN_FEE,
            'res_count_stCN_NRF' => $res_count_stCN_NRF,
            'res_count_st_NO_SHOW' => $res_count_st_NO_SHOW,
            'res_marge' => $res_marge,
            
        );
        
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
        $destination = "";
        $City = "";
        

        
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
            'destination' => $destination,
            'City' => $City,
            
            

        ];
        
           $sellers = Agencycontact::where('Contact_Type','SELLER')->get();
        $buyers = Agencycontact::where('Contact_Type','BUYER')->get();
        $city_listes = Hotellist::select('hotellists.City as City')-> groupBy('City')->get();
        $Country_listes = Hotellist::select('hotellists.Country as Country')-> groupBy('Country')->get();
        return $Country_listes ;
        $hotels = Hotellist::limit(10)->get();
 
     

            $data = [
                'category_name' => 'dashboard',
                'page_name' => 'analytics',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'res_state'=> $res_state,
                
               
                'filter' => $filter,
                'Seller_top' => $Seller_top,
                'Buyer_top' => $Buyer_top,
                 'Destination_top' => $Destination_top,
                'City_top' =>$City_top,
                'sellers'=> $sellers,
                'buyers'=> $buyers,
                'city_listes'=> $city_listes,
                'hotels'=> $hotels,
                'Country_listes'=> $Country_listes,
    
            ];
            // return $records;
        // $pageName = 'analytics';
        return view('dashboard2')->with($data);
    }
    
     public function search(Request $request)
    {

        $rangeCalendarFlatpickr = $request->input('rangeCalendarFlatpickr');
         $date_to=explode("to", $rangeCalendarFlatpickr);
         $date_type = $request->input('date_type');
         $status = $request->input('status');
         $date_type = $request->input('date_type');
         $Type_code = $request->input('Type_code');
         $Code = $request->input('Code');
         $hotel = $request->input('hotel');
         $agency = $request->input('agency');
         $provider = $request->input('provider');
         $Payment_Status = $request->input('Payment_Status');
         $destination = $request->input('destination');
        //  return  $destination;
         $City = $request->input('City');
         $dt01 =  Carbon::now();
         $dt= date('Y-m-d');
         $ans_revenu= date('Y');
         $date_revenu=$ans_revenu.'-01-01';
          $ans_pre = $ans_revenu - 1;
          $ans_pre=$ans_pre.'-01-01';
         $date2 = date('Y-m-d', strtotime('+1 day'));
         $date_semaine = date('Y-m-d', strtotime('-7 day'));
         // return $dt.' / '. $date_semaine;
         $formattedDate = $dt01->format('H:i:s');

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
             //  return $date_revenu;
      
         // $revenu = Reservation::
         // // whereDate('bookingDate','>=', $date2)
         // join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
         // ->whereDate('bookingDate','>=','2023-01-24' )
         // ->whereDate('bookingDate','<=', $date2)
         //  ->orderBy('bookingDate','DESC')
         //  ->select('SUM(un_pr_selling_EUR)')
         //  ->groupby()
         // ->get();
         $records_semaine =Reservation::
             join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->whereDate('bookingDate','>=',$date_semaine)
             ->whereDate('bookingDate','<=',$dt)
             ->selectRaw('DATE_FORMAT(bookingDate, "%m/%d") as date_jour, SUM(un_pr_selling_EUR) as total')
             ->groupBy('date_jour')
             ->get();
 
             // return $records_semaine;
              $records =Reservation::
             join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->whereDate('bookingDate','>=',$date_revenu)
             ->selectRaw('DATE_FORMAT(bookingDate, "%m") as date_month, SUM(un_pr_selling_EUR) as total, SUM(un_pr_purchasing_EUR) as total_purchsing')
             ->groupBy('date_month')
             ->get();
        
             $records_prece_1 =Reservation::
             whereDate('bookingDate','>=',$date_revenu)
            //  ->whereDate('bookingDate','<=','2022-01-31')
             ->where('status','OK')
             ->orwhere('status','CN-FEE')
             ->orwhere('status','CN-NRF')
             ->orwhere('status','NO-SHOW')
            ->selectRaw('DATE_FORMAT(bookingDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
             ->groupBy('date_month')
            ->get();
         //    return $records_prece_1;
             $records_prece =Reservation::
              whereDate('bookingDate','>=',$ans_pre)
             //  ->whereDate('bookingDate','<=','2022-01-31')
              ->where('status','OK')
             
             ->selectRaw('DATE_FORMAT(bookingDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
              ->groupBy('date_month')
             ->get();
             $records_prece_checkout =Reservation::
             whereDate('checkoutDate','>=',$ans_pre)
            //  ->whereDate('bookingDate','<=','2022-01-31')
             ->where('status','OK')
            
            ->selectRaw('DATE_FORMAT(checkoutDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
             ->groupBy('date_month')
            ->get();
            $records_prece_checkin =Reservation::
             whereDate('checkinDate','>=',$ans_pre)
            //  ->whereDate('bookingDate','<=','2022-01-31')
             ->where('status','OK')
            
            ->selectRaw('DATE_FORMAT(checkinDate, "%Y-%m") as date_month, SUM(un_pr_selling_EUR) as total')
             ->groupBy('date_month')
            ->get();
             //   return $records_prece;
             $records_1 =Reservation::
             join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->whereDate('checkoutDate','>=',$date_revenu)
             ->selectRaw('DATE_FORMAT(checkoutDate, "%m") as date_month, SUM(un_pr_selling_EUR) as total, SUM(un_pr_purchasing_EUR) as total_purchsing')
             ->groupBy('date_month')
             ->get();
             $records_2=Reservation::
             join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->whereDate('checkinDate','>=',$date_revenu)
             ->selectRaw('DATE_FORMAT(checkinDate, "%m") as date_month, SUM(un_pr_selling_EUR) as total, SUM(un_pr_purchasing_EUR) as total_purchsing')
             ->groupBy('date_month')
             ->get();
          
     $Seller_top =Reservation::limit(10)
     ->join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
     ->select('reservations.providerName as providerName',DB::raw('COUNT(tgx) as count_tgx'),DB::raw('SUM(marge) as marge_tgx'))
     ->groupBy('providerName')
     ->orderBy('count_tgx','DESC')
     ->get();
     $Buyer_top =Reservation::limit(10)
     ->join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
     ->select('reservations.clientCode as clientCode',DB::raw('COUNT(tgx) as count_tgx'),DB::raw('SUM(marge) as marge_tgx'))
     ->groupBy('clientCode')
     ->orderBy('count_tgx','DESC')
     ->get();
     $City_top =Reservation::limit(10)
     ->join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
     ->select('hotellists.City as City',DB::raw('COUNT(tgx) as count_tgx'),DB::raw('SUM(marge) as marge_tgx'))
     ->groupBy('City')
     ->orderBy('count_tgx','DESC')
     ->get();
     $Destination_top =Reservation::limit(10)
     ->join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
     ->select('hotellists.Country as Country',DB::raw('COUNT(tgx) as count_tgx'),DB::raw('SUM(marge) as marge_tgx'))
     ->groupBy('Country')
     ->orderBy('count_tgx','DESC')
     ->get();
             // return $records;

             $matchThese = array();
             $a_status = ['status' => $status];
             $a_hotel = ['hotelCode' => $hotel];
             $a_agency = ['clientCode' => $agency];
             $a_provider = ['providerName' => $provider];
             $a_Payment_Status = ['Payment_Status' => $Payment_Status];
             $a_destination = ['Country' => $destination];

             $a_City = ['City' => $City];
             
     
             
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
             if($destination != ""){
                $matchThese =$matchThese + $a_destination;
            }
            if($City != ""){
                $matchThese =$matchThese + $a_City;
            }

        if($date_type != "" && $start_date != "" && $end_date != "" )
        {
             $reservations = Reservation::where($matchThese)
         // whereDate('bookingDate','>=', $date2)
        -> join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
         ->whereDate($date_type,'>=', $start_date)
            ->whereDate($date_type,'<=',$end_date )
          ->orderBy('bookingDate','DESC')
          ->select('*','hotellists.Country  as Country','hotellists.City  as City','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h');
          if($Type_code != "")
          {
              $reservations->where('reservations.'.$Type_code,'=',$Code);
          }
          $reservations= $reservations->get();
        }else
        {
            // DB::enableQueryLog();
            $reservations = Reservation::where($matchThese)
            // whereDate('bookingDate','>=', $date2)
            -> join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
             ->orderBy('bookingDate','DESC')
             ->select('*','hotellists.City  as City','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
                ->get();
              
        }
    
 
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
         $t_un_sell_cn=0;
         $t_un_sell_ok=0;
         $res_count_st_cn=0;
         $res_count_st_KUN=0;
         $res_count_st_CN_FEE=0;
         $res_count_stCN_NRF=0;
         $res_count_st_NO_SHOW=0;
         $res_marge=0;
         foreach ($reservations as $reser) {
             $res_count_st_all = $res_count_st_all + 1 ;
             if($reser->status == 'CN')
             {
                 $t_un_sell_cn = $t_un_sell_cn + $reser->sellingPrice_amount;
             }elseif($reser->status == 'OK')
             {
                 $t_un_sell_ok = $t_un_sell_ok + $reser->sellingPrice_amount;
             }
 
             $res_marge = $res_marge + $reser-> marge;
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
             if($reser->status == 'CN') {$res_count_st_cn = $res_count_st_cn + 1;} 
             if($reser->status == 'KUN') {$res_count_st_KUN = $res_count_st_KUN + 1;} 
             if($reser->status == 'CN-FEE') {$res_count_st_CN_FEE = $res_count_st_CN_FEE + 1;} 
             if($reser->status == 'CN-NRF') {$res_count_stCN_NRF = $res_count_stCN_NRF + 1;} 
             if($reser->status == 'NO-SHOW') {$res_count_st_NO_SHOW = $res_count_st_NO_SHOW + 1;} 
 
         }
      //  return 'CN'.$res_count_st_cn.' KUN : '.$res_count_st_KUN;
         if($res_count_st_all_exept3 == 0){
             $t_un_sell = 0 ;
             $t_un_purshase = 0 ;
             $t_un_sell_cn = 0 ;
             $t_un_sell_ok = 0 ;
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
             't_un_purshase' => $t_un_purshase,
             't_un_sell_cn' => $t_un_sell_cn,
             't_un_sell_ok' => $t_un_sell_ok,
             'res_count_st_cn' => $res_count_st_cn,
             'res_count_st_KUN' => $res_count_st_KUN,
             'res_count_st_CN_FEE' => $res_count_st_CN_FEE,
             'res_count_stCN_NRF' => $res_count_stCN_NRF,
             'res_count_st_NO_SHOW' => $res_count_st_NO_SHOW,
             'res_marge' => $res_marge,
             
         );
         
      
 
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
            'destination' => $destination,
            'City' => $City,


        ];
        // return $filter;

 
             $data = [
                 'category_name' => 'dashboard',
                 'page_name' => 'sales',
                 'has_scrollspy' => 0,
                 'scrollspy_offset' => '',
                 'res_state'=> $res_state,
                 'records'=> $records,
                 'records_1'=>$records_1,
                 'records_2'=>$records_2,
                 'records_prece'=>$records_prece,
                 'records_prece_checkout'=>$records_prece_checkout,
                 'records_prece_checkin'=>$records_prece_checkin,
                 'records_semaine'=>$records_semaine,
                 'filter' => $filter,
                 'Destination_top' => $Destination_top,
                 'City_top' =>$City_top,
                 'Buyer_top' => $Buyer_top,
                 'Seller_top' => $Seller_top,
             ];
             // return $records;
         // $pageName = 'analytics';
         return view('dashboard2')->with($data);
    }
    public function seller_setup()
    {
        $BUYER = Agencycontact::where('Contact_Type','BUYER')->get();
         $sellers = Agencycontact::where('Contact_Type','SELLER')->get();
        $Client_seller = Client_seller::All();

        // return $sellers;
        return view('admin.seller.add_seller',array('Client_seller'=>$Client_seller,'sellers'=>$sellers,'BUYERS'=>$BUYER));  
    }
    public function add_register(Request $request)
    {
        $data = $request->all();
        // return $data ;
        // $this->validate($request,[
        //     'email' => 'required|email|max:255',
        //     'password' => 'required|min:6|max:30|confirmed',

        // ]);

        $cl = Client_seller::create([
            'email'=>$data['Email_seller'],
            'name'=>$data['nom'],
            'agency_id'=>$data['provider'],
            'role'=>$data['role'],
            'password' => Hash::make($data['password_seller']),
            'verification_code'=> sha1(time())

        ]);
        // return $cl;
        $BUYER = Agencycontact::where('Contact_Type','BUYER')->get();
         $sellers = Agencycontact::where('Contact_Type','SELLER')->get();
        $Client_seller = Client_seller::All();

        return redirect()->back()
        ->with('status', 'User added successfully.')
        ->with('Client_seller', $Client_seller)
        ->with('sellers', $sellers)
        ->with('BUYERS', $BUYER);
        
        // return view('admin.seller.add_seller',array('Client_seller'=>$Client_seller,'sellers'=>$sellers,'BUYERS'=>$BUYER))
        // ->with('status', "Le Seller est crée avec success  " );  
    }
    public function edit_register(Request $request)
    {
        $data = $request->all();
        // return $data ;
        // $this->validate($request,[
        //     'email' => 'required|email|max:255',
        //     'password' => 'required|min:6|max:30|confirmed',

        // ]);
        $Client =  Client_seller::find($data['id']);
             
        $Client ->email = $data['email'];  
        $Client ->name = $data['username'];
        $Client ->agency_id = $data['provider'];
        if(isset($data['passwords']))
        {
          $Client ->password = Hash::make($data['passwords']);  
        }
        
       $Client -> save(); 
     
        // return $cl;
        $sellers = Agencycontact::where('Contact_Type','SELLER')->get();
        $Client_seller = Client_seller::All();
        
        return view('admin.seller.add_seller',array('Client_seller'=>$Client_seller,'sellers'=>$sellers))
        ->with('status', "Le Seller est crée avec success  " );  
    }
    public function indexuser()
    {
        $user = User::all();
        $data = [
            'category_name' => 'admin',
            'page_name' => 'user_setup',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
           

        ];


        // return $user; 
        // $pageName = 'user_setup';
        return view('user',array( 'user'=> $user))->with($data);
    }
    public function add_user(Request $request)
    {
        // return $request;
        $data = $request->all();
        //  return $data ;
        // $this->validate($request,[
        //     'email' => 'required|email|max:255',
        //     'password' => 'required|min:6|max:30|confirmed',

        // ]);

        $cl = User::create([
            'name'=>$data['nom'],
            'email'=>$data['Email_user'],
            'password' => Hash::make($data['password_user']),
            'role'=>$data['role'],
            
         

        ]);

        return redirect()->back()->with('status','User est ajouter avec success ');
    }
    public function edit_user(Request $request)
    {
        // return $request;
        $data = $request->all();
        $User =  User::find($data['id']);
             
        $User ->email = $data['email'];  
        $User ->name = $data['username'];
        $User ->role = $data['role'];
        if(isset($data['passwords']))
        {
          $User ->password = Hash::make($data['passwords']);  
        }
        
       $User -> save(); 

        return redirect()->back()->with('status','User est Modifier avec success ');
    }
    public function logout_user(Request $request)
    {
        // Auth::guard('Client_seller')->logout();
        Auth::logout();
        return redirect('/login');
    }
    public function delete_seller(Request $request)
    {
        $data = $request->all();
        // return $data;
        $res=Client_seller::where('id',$data['id'])->delete();
       
 
         return redirect()->back()->with('status','User est supprimé avec success ');
 
     }
     public function delete_user(Request $request)
     {
         $data = $request->all();
         // return $data;
         $res=User::where('id',$data['id'])->delete();
        
  
          return redirect()->back()->with('status','User est supprimé avec success ');
  
      }
    // public function conxnew(Request $request)
    // {

    //     return  $request;
    //     // if(Auth::guard('client')->attempt(['email'=>$request->email,'password'=>$request->password,'is_verified'=>1],$request->remember))
    //     // {
            
    //     // }

    // }
}
