<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Client_Seller;
use App\Models\Client_seller as ModelsClient_seller;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
{

    
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        //  $this->middleware('guest:client_seller');login_auth_seller
        //    $this->middleware('guest')->except('logout');
            // $this->middleware('guest:admin')->except('logout');
            // $this->middleware('guest:client_seller')->except('logout');
    }
    public function index()
    {
        return view('client.liste_reservation_seller');  
    }
    public function login_seller()
    {
        if(Auth::guard('Client_seller')->id()!=null)
        {
            $dt =  Carbon::now();
        $dt= $dt->format('Y-m-d');
        $date1= $dt;
            $id= Auth::guard('Client_seller')->id() ;
            // return $id;
            $seller = ModelsClient_seller::where('id',$id)->first();
            // return $seller->seller;
            $reservations = Reservation::
                // whereDate('bookingDate','>=', $date2)
                // join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
                where('status','=','OK')
                // ->whereNull('HCN_AC')
                 ->orderBy('checkinDate','DESC')
                 ->whereDate('checkinDate','>=', $date1)
                 ->select('*','reservations.providerName  as providerName','reservations.provider  as provider',
                 'hotellists.Hotel_Name as Hotel_Name')     
                 ->where('reservations.providerName',$seller->seller)
                 ->get();
        //   return $reservations;
                return view('client.liste_reservation_seller',array('Reservations'=>$reservations));  
        }else{
            return view('client.login_seller');  
        }
       
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
        $id= Auth::guard('Client_seller')->id() ;
        // return $id;
        $seller = ModelsClient_seller::where('id',$id)->first();
        // return $seller->seller;
        $reservations = Reservation::
            // whereDate('bookingDate','>=', $date2)
            // join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            where('status','=','OK')
            // ->whereNull('HCN_AC')
             ->orderBy('checkinDate','DESC')
             ->whereDate('checkinDate','>=', $date1)
             ->select('*','reservations.providerName  as providerName','reservations.provider  as provider',
             'reservations.HotelName as Hotel_Name')     
             ->where('reservations.clientCode',$seller->agency_id)
             ->get();
     //   return $reservations;
            return view('client.liste_reservation_seller',array('Reservations'=>$reservations));  
    }
    public function update_seller(Request $request)
    {
        // return $request;
        $dt =  Carbon::now();
        $dt= $dt->format('Y-m-d');
        $date1= $dt;
        // return $date1;
        $resa =  Reservation::find($request['tgx']);
             
         $resa ->HCN_AC = $request['HCN'];  
         $resa ->Agent_name = $request['Agent_Name'];
                    
        $resa -> save(); 
        $id= Auth::guard('Client_seller')->id() ;
        // return $id;
        $seller = ModelsClient_seller::where('id',$id)->first();
        // return $seller->seller;
        $reservations = Reservation::
            // whereDate('bookingDate','>=', $date2)
            // join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            where('status','=','OK')
            // ->whereNull('HCN_AC')
             ->orderBy('checkinDate','DESC')
             ->whereDate('checkinDate','>=', $date1)
             ->select('*','reservations.providerName  as providerName','reservations.provider  as provider',
             'reservations.HotelName as Hotel_Name')     
             ->where('reservations.providerName',$seller->agency_id)
             ->get();
      //   return $reservations;
            return view('client.liste_reservation_seller',array('Reservations'=>$reservations));  
    }

    public function login_auth_seller(Request $request)
    {
        //  dd(Auth::check())   ;
        //  return $request;
         $dt =  Carbon::now();
        $dt= $dt->format('Y-m-d');
        $date1= $dt;
        $date2 = date('Y-m-d', strtotime('-30 day'));  
        $attempt = Auth::guard('Client_seller')
        ->attempt(['email' => $request->email,
         'password' => $request->password]);
        // return Auth::guard('Client_seller')->id();
        if(Auth::guard('Client_seller')->id()!=null)
        {
              
        //   return Auth::getDefaultDriver();
          
                //   return $seller->seller;
        if($attempt)
        {  
            $id= Auth::guard('Client_seller')->id() ;
            $seller = ModelsClient_seller::where('email',$request['email'])

              ->first();
            // return  $id = Auth::id();
            // return $seller;
            // return $date2;
            
            $reservations = Reservation::
            whereDate('bookingDate','>=', $date2)
            -> join('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            // ->where('status','=','OK')
            // ->whereNull('HCN_AC')
             ->orderBy('bookingDate','DESC')
             ->whereDate('checkinDate','>=', $date1)
              ->select('*','reservations.providerName  as providerName','reservations.provider  as provider', 'hotellists.Hotel_Name as Hotel_Name', 'reservations.client as Client_id')
             ->where('reservations.clientCode',$seller->agency_id)
            //  ->limit(10)
             ->get();
            //   return  $reservations;
             
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
                 //   return $reservations;
            return view('client.liste_reservation_seller',array('Reservations'=>$reservations,'filter'=>$filter));  
        }else
        {
            return view('client.login_seller'); 
        }
        }
        else
        {
            return view('client.login_seller'); 
        }
        
    }
    
    function getData_API_Detail($data)
    {
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
            $result_detail = ClientController::getData_API_Detail($Req_W_CN_DT);
            return  $result_detail['reservationReadRS'];
    }
    public function logout_seller(Request $request)
    {
        Auth::guard('Client_seller')->logout();
        return view('client.login_seller');  
    }
    
    
      public function create(Request $request){

        $id= Auth::guard('Client_seller')->id() ;
        $seller = ModelsClient_seller::where('id',$id)->first();
        //   return $seller;
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
        //  return  $Type_code;
        
        $matchThese = array();
        $a_status = ['status' => $status];

        
        if($status != ""){
              $matchThese = $matchThese + $a_status;
        }
      
        
     //  return  $matchThese;
        if($date_type != "" && $start_date != "" && $end_date != "" ){
            // DB::enableQueryLog();
            
            //  return $seller->seller;
            $reservations = Reservation::where($matchThese)
              ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
        
                ->whereDate($date_type,'>=', $start_date)
                ->whereDate($date_type,'<=',$end_date )
                ->orderBy($date_type,'Desc');
                if($Type_code != "")
                {
                    $reservations->where('reservations.'.$Type_code,'=',$Code);
                }
                $reservations->select('*','reservations.providerName  as providerName','reservations.provider  as provider', 'hotellists.Hotel_Name as Hotel_Name', 'reservations.client as Client_id');
                 $reservations->where('reservations.ClientCode',$seller->agency_id);
          
                 $reservations= $reservations->get();
                //  return $reservations;
                //  ->get();

            // $reservations = Reservation::where($matchThese)
            // // ->whereBetween($date_type, [$start_date, $end_date])
            // ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
            //  ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name_h')
            // ->whereDate($date_type,'>=', $start_date)
            // ->whereDate($date_type,'<=',$end_date )
            //  ->orderBy($date_type,'Desc');
            //  if($Type_code != "")
            //  {
            //      $reservations->where('reservations.'.$Type_code,'=',$Code);
            //  }
            //  $reservations= $reservations->get();
            // dd(DB::getQueryLog());
        }else{
            //  DB::enableQueryLog();
            $reservations = Reservation::limit(100)
            ->where($matchThese)
            ->leftJoin('hotellists', 'reservations.hotelCode', '=', 'hotellists.Hotel_Code')
      
            ->select('*','hotellists.provider  as providerName','reservations.provider  as provider_h','hotellists.Hotel_Name as Hotel_Name', 'reservations.client as Client_id');
            $reservations->where('reservations.ClientCode',$seller->agency_id);
            if($Type_code != "")
            {
                $reservations->where('reservations.'.$Type_code,'=',$Code);
            }
            $reservations->orderBy('bookingDate','Desc');
           
            
            $reservations= $reservations->get();
            //   dd(DB::getQueryLog());
        }

        $filter = [
            'Type_code' => $Type_code,
            'Code' => $Code,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'date_type' => $date_type,
            'status' => $status,
            'rangeCalendarFlatpickr ' => $rangeCalendarFlatpickr,
         
        ];
        $data = [
     
            'Reservations'=>$reservations,
            'filter' => $filter,
           
    
        ]; 
    
        return view('client.liste_reservation_seller',$data);  
        // return view('reservation.index',$data) ;   
    }
    
    
}
