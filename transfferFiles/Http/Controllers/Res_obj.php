<?php

namespace App\Http\Controllers;

use App\Models\Hotellist;
use App\Models\Reservation;
use Illuminate\Http\Request;

class Res_obj extends Controller
{
    public function __construct(array $elt ) {
            $this -> tgx = $elt["locators"]["tgx"];
            $this -> client = $elt["locators"]["client"];
            $this -> provider = $elt["locators"]["provider"];
            $this -> bookingDate = $elt["bookingDate"];
            $this -> checkinDate = $elt["checkinDate"];
            $this -> checkoutDate = $elt["checkoutDate"];
            $this -> lastActionDate = $elt["lastActionDate"];
            $this -> status = $elt["status"];
            $this -> summaryStatus = $elt["summaryStatus"];
            $this -> internalStatus = $elt["internalStatus"];
            $this -> bookingStatus = $elt["bookingStatus"];
            $this -> mainGuestName = $elt["mainGuestName"];
            $this -> hotelCode = $elt["hotelCode"];
            $this -> clientCode = $elt["clientCode"];
            $this -> providerCode = $elt["providerCode"];
            $this -> accessCodeHX = $elt["accessCodeHX"];
            $this -> hotelProvCodeHX = $elt["hotelProvCodeHX"];
            
            
            try{
                
                //get Hotel Name
                if ( array_key_exists( "hotelCode" , $elt) ) {
                    $hotelcode = $elt["hotelCode"];
                    $hotels = Hotellist::where('Hotel_Code',$hotelcode)->first();
                        if( isset( $hotels->Hotel_Name ) ) {
                        $this -> hotelName = $hotels->Hotel_Name;
                        }else{
                            $this -> hotelName = null;
                        }
                        if( isset( $hotels->provider ) ) {
                            $this -> providerName = $hotels->provider;
                            }else{
                                $this -> providerName = null;
                            }
                }else{
                    $this -> hotelName = null;
                    $this -> providerName = null;
                }
                // end get Hotel Name


                if ( array_key_exists( "sellingPrice"  , $elt) ) {

                        $this -> sellingPrice_currency = $elt["sellingPrice"]["currency"];
                        $this -> sellingPrice_amount = $elt["sellingPrice"]["amount"];
                        $this -> sellingPrice_binding = $elt["sellingPrice"]["binding"];
                        $this -> sellingPrice_commission = $elt["sellingPrice"]["commission"];

                        $this -> providerPrice_currency = $elt["providerPrice"]["currency"];
                        $this -> providerPrice_amount = $elt["providerPrice"]["amount"];
                        $this -> providerPrice_binding = $elt["providerPrice"]["binding"];
                        $this -> providerPrice_commission = $elt["providerPrice"]["commission"];
                }
                else {
                    $this -> sellingPrice_currency = null;
                    $this -> sellingPrice_amount = null;
                    $this -> sellingPrice_binding = null;
                    $this -> sellingPrice_commission = null;

                    $this -> providerPrice_currency = null;
                    $this -> providerPrice_amount = null;
                    $this -> providerPrice_binding = null;
                    $this -> providerPrice_commission = null;

        
                }
            }
            catch ( Exception $e) {
                $this -> sellingPrice_currency = null;
                $this -> sellingPrice_amount = null;
                $this -> sellingPrice_binding = null;
                $this -> sellingPrice_commission = null;

                $this -> providerPrice_currency = null;
                $this -> providerPrice_amount = null;
                $this -> providerPrice_binding = null;
                $this -> providerPrice_commission = null;
            }

            if ( array_key_exists( "sellingPrice"  , $elt) ) {

// united Price ////////////////////////////////////////////////////////////////////////////////////////

        // selling price
          if($elt["sellingPrice"]["currency"] == 'EUR'){
            $this -> diffrent = 1 ;              
                                     
                                
          }elseif($elt["sellingPrice"]["currency"] == 'USD'){
            // $this -> diffrent = 0.8285690612312536249896428867 ; 
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.apilayer.com/fixer/".$this->lastActionDate."?symbols=eur&base=usd",     
             CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: uoZlXr97d3IWrlVRKKWZNVseukdcYw3J"
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
            //    $diffrent = 0.8285690612312536249896428867;                                
               $diffrent = $json['rates']['EUR'];    
               $this->quoteSelling_booking=$json['rates']['EUR'];   
                //    $this->quotePurchasing_booking=$json['rates']['EUR'];            
          }elseif($elt["sellingPrice"]["currency"] == 'MAD'){
            // $this -> diffrent = 0.0952380952380952380952380952 ;
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.apilayer.com/fixer/".$this->lastActionDate."?symbols=eur&base=mad",     
             CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: uoZlXr97d3IWrlVRKKWZNVseukdcYw3J"
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
            //    $diffrent = 0.8285690612312536249896428867;                                
               $diffrent = $json['rates']['EUR'];    
               $this->quoteSelling_booking=$json['rates']['EUR'];   
                //    $this->quotePurchasing_booking=$json['rates']['EUR'];     
          }
        $this -> un_pr_selling_EUR = $elt["sellingPrice"]["amount"] * $this -> diffrent;
        
        // purchasing price
        if($elt["providerPrice"]["currency"] == 'EUR'){
            $this -> diffrent = 1 ;              
          }elseif($elt["providerPrice"]["currency"] == 'USD'){
            // $this -> diffrent = 0.8285690612312536249896428867 ;   
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.apilayer.com/fixer/".$this->lastActionDate."?symbols=eur&base=usd",     
             CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: uoZlXr97d3IWrlVRKKWZNVseukdcYw3J"
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
            //    $diffrent = 0.8285690612312536249896428867;                                
               $diffrent = $json['rates']['EUR'];    
            //    $this->quoteSelling_booking=$json['rates']['EUR'];   
                   $this->quotePurchasing_booking=$json['rates']['EUR'];              
          }elseif($elt["providerPrice"]["currency"] == 'MAD'){
            // $this -> diffrent = 0.0952380952380952380952380952 ;
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.apilayer.com/fixer/".$this->lastActionDate."?symbols=eur&base=mad",     
             CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: uoZlXr97d3IWrlVRKKWZNVseukdcYw3J"
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
            //    $diffrent = 0.8285690612312536249896428867;                                
               $diffrent = $json['rates']['EUR'];    
            //    $this->quoteSelling_booking=$json['rates']['EUR'];   
                   $this->quotePurchasing_booking=$json['rates']['EUR'];   
          }
        $this -> un_pr_purchasing_EUR = $elt["providerPrice"]["amount"] * $this -> diffrent;

// end united Price ////////////////////////////////////////////////////////////////////////////////////////

//  marge ////////////////////////////////////////////////////////////////////////////////////////

$this ->  marge = $this->un_pr_selling_EUR - $this->un_pr_purchasing_EUR;

// end  marge ////////////////////////////////////////////////////////////////////////////////////////


// Commission_bdsc % ////////////////////////////////////////////////////////////////////////////////////////

        $this->Commission_bdsc = ($this->un_pr_selling_EUR - $this->un_pr_purchasing_EUR) / $this->un_pr_purchasing_EUR;
        
// end Commission_bdsc % ////////////////////////////////////////////////////////////////////////////////////////
        }else{
            $this -> un_pr_selling_EUR = null;
            $this -> un_pr_purchasing_EUR = null;
            $this->Commission_bdsc = null;
            $this ->  marge = null;
        }

// Nights Count ////////////////////////////////////////////////////////////////////////////////////////

        if( array_key_exists("checkinDate" , $elt) ){

            $checkinDateStamp = strtotime($this -> checkinDate);
            $checkoutDateStamp = strtotime($this->checkoutDate);
            $timeDiff1 = abs($checkoutDateStamp - $checkinDateStamp);
            $nights_count = $timeDiff1/86400;  // 86400 seconds in one day
            
            //booking window = bw
            $date = date('Y-m-d',strtotime($this -> lastActionDate)); 
            $bookingDateStamp = strtotime($date); 
            $timeDiff2 = abs($checkinDateStamp - $bookingDateStamp);
            
            $bw_days_count = $timeDiff2/86400;  // 86400 seconds in one day

            //convert to integer
            $nights_count = intval($nights_count);
            $bw_days_count = intval($bw_days_count);

            //boking window
            $this -> bw_days_count = $bw_days_count;

          //  dd($date,$this->lastActionDate,$elt);

            //nights count
            $this -> nights_count = $nights_count;
            // price per night by united price
            $this -> price_per_night = $this -> un_pr_selling_EUR / $nights_count;

}

// end Nights Count ////////////////////////////////////////////////////////////////////////////////////////

// For Status CN ///////////////////////////////////////////////////////////////////////////////////////////
            if ( array_key_exists( "cancellationDate"  , $elt) ) {
                $this -> cancellationDate = $elt["cancellationDate"];
                
                if(array_key_exists( "cancellationPrice"  , $elt)){

                    $this -> cancellationPrice_commission = $elt["cancellationPrice"]["commission"];
                    $this -> cancellationPrice_currency = $elt["cancellationPrice"]["currency"];
                    $this -> cancellationPrice_amount = $elt["cancellationPrice"]["amount"];
                    $this -> cancellationPrice_binding = $elt["cancellationPrice"]["binding"];

                    // cancellationPrice = 0 
                    if($elt["cancellationPrice"]["amount"] == 0){
                        $this -> sellingPrice_currency = $elt["cancellationPrice"]["currency"];
                        //selling price = cancelllatio price
                        $this -> sellingPrice_amount =  $elt["cancellationPrice"]["amount"];
                        
                        $this -> sellingPrice_binding = $elt["sellingPrice"]["binding"];
                        $this -> sellingPrice_commission = $elt["sellingPrice"]["commission"];
                        
                        // 
                        $this -> un_pr_selling_EUR = 0;
                        $this -> un_pr_purchasing_EUR = 0;
                        $this -> Commission_bdsc = 0;
                        $this -> nights_count = 0;
                        $this -> price_per_night = 0;
                        $this ->  marge = 0;

                    }else{
                            //united Price case Status CN
                            if($elt["cancellationPrice"]["currency"] == 'EUR'){
                                $diffrent = 1 ;
                            }elseif($elt["cancellationPrice"]["currency"] == 'USD'){
                                $diffrent = 0.8285690612312536249896428867;                                
                            }elseif($elt["cancellationPrice"]["currency"] == 'MAD'){
                                $diffrent = 0.0952380952380952380952380952 ;
                            }
                            $this -> un_pr_selling_EUR = $elt["cancellationPrice"]["amount"] * $diffrent;

                            $this -> un_pr_purchasing_EUR = 0;
                            $this -> Commission_bdsc = 0;
                            $this -> nights_count = 0;
                            $this -> price_per_night = 0;
                            $this ->  marge = 0;


                            //$var1 = ($this->un_pr_selling_EUR / 100) * $this->Commission_bdsc;
                            /////////////////////////

                            // //for calc help
                            // $new_united_purchase_price = $this -> un_pr_purchasing_EUR  / $this -> nights_count;
                            
                            // // count penalty nights
                            // $cn_price = $elt["cancellationPrice"]["amount"];
                            // $ok_price = $elt["sellingPrice"]["amount"];
                            // $diffrent = $ok_price / $cn_price;

                            
                            // $this -> nights_count = $this -> nights_count / $diffrent;
                            // // price per night by united price
                            // $this -> price_per_night = $this -> un_pr_selling_EUR / $this -> nights_count;
                            // ///////////////
                            // $this -> un_pr_purchasing_EUR = $new_united_purchase_price * $this -> nights_count;

                        $this -> sellingPrice_currency = $elt["cancellationPrice"]["currency"];
                        //selling price = cancelllatio price
                        $this -> sellingPrice_amount =  $elt["cancellationPrice"]["amount"];
                        
                        $this -> sellingPrice_binding = $elt["cancellationPrice"]["binding"];
                        $this -> sellingPrice_commission = $elt["cancellationPrice"]["commission"];
                  
                        
                    }

          
                }else{
                    $this -> cancellationPrice_currency = null;
                    $this -> cancellationPrice_amount = null;
                    $this -> cancellationPrice_binding = null;
                    $this -> cancellationPrice_commission = null;
                }
                
            }else {
                $this -> cancellationDate = null;
                $this -> cancellationPrice_currency = null;
                $this -> cancellationPrice_amount = null;
                $this -> cancellationPrice_binding = null;
                $this -> cancellationPrice_commission = null;
            }
//End Status CN ///////////////////////////////////////////////////////////////////////////////////////////

              
        

                $this -> quoteSellingPrice_currency = $elt["quoteSellingPrice"]["currency"];
                $this -> quoteSellingPrice_amount = $elt["quoteSellingPrice"]["amount"];
                $this -> quoteSellingPrice_binding = $elt["quoteSellingPrice"]["binding"];
                $this -> quoteSellingPrice_commission = $elt["quoteSellingPrice"]["commission"];

                $this -> quoteProviderPrice_currency = $elt["quoteProviderPrice"]["currency"];
                $this -> quoteProviderPrice_amount = $elt["quoteProviderPrice"]["amount"];
                $this -> quoteProviderPrice_binding = $elt["quoteProviderPrice"]["binding"];
                $this -> quoteProviderPrice_commission = $elt["quoteProviderPrice"]["commission"];

                $this -> correlationID = $elt["correlationID"];


                if ( array_key_exists( "reservationError"  , $elt) ) {
                    $this -> reservationError = $elt["reservationError"];
                    }
                    else{
                        $this -> reservationError = null;
                    }


        }
        
        
        public function Save_Res(){
           // dd($this -> nights_count);

        $reser = new Reservation;
        $reser -> tgx = $this -> tgx;
        $reser -> client = $this -> client; 
        $reser -> provider = $this -> provider;
        $reser -> bookingDate = $this -> lastActionDate; 
        $reser -> checkinDate = $this -> checkinDate;
        $reser -> checkoutDate = $this -> checkoutDate;
        $reser -> cancellationDate = $this -> cancellationDate;
        $reser -> lastActionDate = $this -> lastActionDate ;
        $reser -> status = $this -> status;
        $reser -> summaryStatus = $this -> summaryStatus ;
        $reser -> internalStatus = $this -> internalStatus ;
        $reser -> bookingStatus = $this -> bookingStatus ;
        $reser -> mainGuestName = $this -> mainGuestName ;
        $reser -> hotelCode = $this -> hotelCode ;
        $reser -> clientCode = $this -> clientCode ;
        $reser -> providerCode = $this -> providerCode ;
        $reser -> accessCodeHX = $this -> accessCodeHX ;
        $reser -> hotelProvCodeHX = $this -> hotelProvCodeHX;
        $reser -> sellingPrice_currency = $this -> sellingPrice_currency ;
        $reser -> sellingPrice_amount = $this -> sellingPrice_amount ;
        $reser -> sellingPrice_binding = $this -> sellingPrice_binding ;
        $reser -> sellingPrice_commission = $this -> sellingPrice_commission ;

        $reser -> providerPrice_currency = $this -> providerPrice_currency ;
        $reser -> providerPrice_amount = $this -> providerPrice_amount ;
        $reser -> providerPrice_binding = $this -> providerPrice_binding ;
        $reser -> providerPrice_commission = $this -> providerPrice_commission ;
        

        $reser -> quoteSellingPrice_currency = $this -> quoteSellingPrice_currency ;
        $reser -> quoteSellingPrice_amount = $this -> quoteSellingPrice_amount ;
        $reser -> quoteSellingPrice_binding = $this -> quoteSellingPrice_binding;
        $reser -> quoteSellingPrice_commission = $this -> quoteSellingPrice_commission ;

        $reser -> quoteProviderPrice_currency = $this -> quoteProviderPrice_currency ;
        $reser -> quoteProviderPrice_amount = $this -> quoteProviderPrice_amount ;
        $reser -> quoteProviderPrice_binding = $this -> quoteProviderPrice_binding ;
        $reser -> quoteProviderPrice_commission = $this -> quoteProviderPrice_commission;

        
        $reser -> cancellationPrice_currency = $this -> cancellationPrice_currency ;
        $reser -> cancellationPrice_amount = $this -> cancellationPrice_amount ;
        $reser -> cancellationPrice_binding = $this -> cancellationPrice_binding ;
        $reser -> cancellationPrice_commission = $this -> cancellationPrice_commission;


        $reser -> correlationID = $this -> correlationID ;

     
        $reser -> quoteSelling_booking = $this->quoteSelling_booking;
        $reser -> quotePurchasing_booking = $this->quotePurchasing_booking;

        $reser -> un_pr_selling_EUR = $this -> un_pr_selling_EUR ;
        $reser -> un_pr_purchasing_EUR = $this -> un_pr_purchasing_EUR ;

        $reser -> Commission_bdsc = $this -> Commission_bdsc ;
        $reser ->  marge = $this ->  marge ;

        $reser -> hotelName = $this -> hotelName ;
        $reser -> providerName = $this -> providerName ;

        $reser -> Booking_Window = $this -> bw_days_count ;



        $reser -> price_per_night = $this -> price_per_night;
        $reser -> nights_count = $this -> nights_count;

        $reser -> reservationError = $this -> reservationError ;

        
                  
        $reser-> save();
    
    }
}