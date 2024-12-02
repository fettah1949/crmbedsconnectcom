<?php

namespace App\Http\Controllers;

use App\Models\Hotellist;
use App\Models\Quote;
use App\Models\Reservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Res_obj extends Controller
{
    


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

    public function __construct(array $elt ) {
          
    //   die($elt["locators"]["tgx"]);
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
            
            //   var_dump($elt["locators"]["tgx"]);
            try{
                
                //get Hotel Name
                if ( array_key_exists( "hotelCode" , $elt) ) {
                
                    $hotelcode = $elt["hotelCode"];
                    $hotels = Hotellist::where('Hotel_Code',$hotelcode)->first();
                     $hotels_count = Hotellist::where('Hotel_Code',$hotelcode)->count();
                        //  print('$hotels_count : '.$hotels_count);
                    // var_dump($hotels->Hotel_Name);
                        if( $hotels_count != 0 ) {
             
                            
                            $this -> hotelName = $hotels->Hotel_Name;
                        }else{
                             $tgx = $elt["locators"]["tgx"];
                               $accesToken = "++CiXsABSFv0Y+3O941KDdJBroKDmz0vN1paiflJcN0=";
                              $password = "QVyoJPQXM89az4J4";
                               $access = array('accessToken' => $accesToken, 'password'=> $password );
                               $tgxLocators = array($tgx);
                              //  return $tgx;
                              $Req_W_CN_DT = array("access" => $access,'tgxLocators' => $tgxLocators);
                              $result_detail =  $this -> getData_API_Detail($Req_W_CN_DT);
                              $result_detail =  $result_detail['reservationReadRS'];
                                $hotel_name = null;
                               if(isset($result_detail[0]['hotelName'])){
                                   $hotel_name = $result_detail[0]['hotelName'];
                               }
                        
                                  $hotels = Hotellist::where('Hotel_Code',$hotelcode)->count();
                                             if($hotels == 0){       
                          
                                                  DB::table('hotellists')->insert([
                                            
                                                    'Hotel_Code' => $hotelcode,
                                                    'Hotel_Name' => $hotel_name,
                                                  ]);
                                                  
                                                }
                                                
                                                
                                $this -> hotelName = $hotel_name;
                                        

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
// 
          // united Price ////////////////////////////////////////////////////////////////////////////////////////

        // selling price 
              if($elt["status"]=='OK' || $elt["status"]=='RQ'|| $elt["status"]=='UN' || $elt["status"]=='KOP' || $elt["status"]=='KUN' )
              {
                      
                $lastActionDate = explode(" ",$elt["bookingDate"]);
                $lastActionDate=date('Y-m-d', strtotime($lastActionDate[0]. ' -1 days'));
              }else{
                 
                $lastActionDate = explode(" ",$elt["cancellationDate"]);
                 
                 $lastActionDate=date('Y-m-d', strtotime($lastActionDate[0]. ' -1 days'));
                 
              }
       
    //   var_dump($lastActionDate);
        // return  $lastActionDate;
        $QUOTE=Quote::where("DATE",$lastActionDate)->first(); 
        // var_dump($QUOTE);
          if($elt["sellingPrice"]["currency"] == 'EUR'){
                  
            $this -> un_pr_selling_EUR = $elt["sellingPrice"]["amount"] * 1;
      
          }elseif($elt["sellingPrice"]["currency"] == 'USD'){
            
            // $this -> diffrent = $QUOTE->USD ;    
            if($QUOTE->USD>=1)
            {
              $this -> un_pr_selling_EUR = $elt["sellingPrice"]["amount"] / $QUOTE->USD;
            } else
            {
              $this -> un_pr_selling_EUR = $elt["sellingPrice"]["amount"] * $QUOTE->USD;
            }
            
      
          }elseif($elt["sellingPrice"]["currency"] == 'MAD'){
         
            // $this -> diffrent = $QUOTE->MAD ;
            if($QUOTE->MAD >=1)
            {
              $this -> un_pr_selling_EUR = $elt["sellingPrice"]["amount"] / $QUOTE->MAD;
            } else
            {
              $this -> un_pr_selling_EUR = $elt["sellingPrice"]["amount"] * $QUOTE->MAD;
            }
          }
        
        // purchasing price
        if($elt["providerPrice"]["currency"] == 'EUR'){
            // $this -> diffrent = 1 ;       
            $this -> un_pr_purchasing_EUR = $elt["providerPrice"]["amount"] * 1;
       
          }elseif($elt["providerPrice"]["currency"] == 'USD'){
         
            // $this -> diffrent =  $QUOTE->USD ;  
            if($QUOTE->USD>=1)
            {
            $this -> un_pr_purchasing_EUR = $elt["providerPrice"]["amount"] / $QUOTE->USD;
            } else
            {
              $this -> un_pr_purchasing_EUR = $elt["providerPrice"]["amount"] * $QUOTE->USD;
            }
          }elseif($elt["providerPrice"]["currency"] == 'MAD'){
            
            // $this -> diffrent = $QUOTE->MAD ;
            if($QUOTE->MAD>=1)
            {
            $this -> un_pr_purchasing_EUR = $elt["providerPrice"]["amount"] /  $QUOTE->MAD;
            } else
            {
              $this -> un_pr_purchasing_EUR = $elt["providerPrice"]["amount"] *  $QUOTE->MAD;
            }
          }
        // $this -> un_pr_purchasing_EUR = $elt["providerPrice"]["amount"] * $this -> diffrent;

        // end united Price ////////////////////////////////////////////////////////////////////////////////////////

        //  marge ////////////////////////////////////////////////////////////////////////////////////////
        //   if( $this -> sellingPrice_binding == 1){

        //   $commission_selling = ($this-> sellingPrice_amount *  ($this-> sellingPrice_commission / 100) ) ;
        //     $newpricselling =$this-> sellingPrice_amount - $commission_selling;
        //               $this-> sellingPrice_amount_binding = $newpricselling ;
        //               $commission_provider =  ($this-> providerPrice_amount *  ($this-> providerPrice_commission / 100) ) ;
        //               $newpricprovider =$reservatiothisnsfirst-> providerPrice_amount - $commission_provider;
        //               $this-> providerPrice_amount_binding = $newpricprovider ;
        //               $this-> marge_binding =  $newpricselling - $newpricprovider;
        //               $this->commission_bdsc_binding = ($newpricselling -  $newpricprovider) /  $newpricprovider;
        //               //  $this -> save();
          
        // }else{
            $this ->  marge = $this->un_pr_selling_EUR - $this->un_pr_purchasing_EUR;
    
            // end  marge ////////////////////////////////////////////////////////////////////////////////////////
    
    
            // Commission_bdsc % ////////////////////////////////////////////////////////////////////////////////////////
    
                    $this->Commission_bdsc = ($this->un_pr_selling_EUR - $this->un_pr_purchasing_EUR) / $this->un_pr_purchasing_EUR;
                    
            // end Commission_bdsc % ////////////////////////////////////////////////////////////////////////////////////////
            //  $this-> marge_binding =  0;
            // $this->commission_bdsc_binding = 0;
        // }     

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
                                
                              
                                      $cancellationDate = explode(" ", $elt["cancellationDate"]);
        
                                      $QUOTE=Quote::where("DATE",$cancellationDate[0])->first(); 
                                     
                                      //   if($elt["cancellationPrice"]["currency"]  == 'EUR'){
                                      //     $diffrent = 1 ;
                                      // }elseif($elt["cancellationPrice"]["currency"] == 'USD'){
                                      //     $diffrent = $QUOTE->USD;                                
                                      // }elseif($elt["cancellationPrice"]["currency"]  == 'MAD'){
                                      //     $diffrent = $QUOTE->MAD;
                                      // }
                                    //united Price case Status CN
                                    if($elt["cancellationPrice"]["currency"] == 'EUR'){
                                       
                                        $this -> un_pr_selling_EUR = $elt["cancellationPrice"]["amount"] * 1;

                                    }elseif($elt["cancellationPrice"]["currency"] == 'USD'){
                                      
                                        if($QUOTE->USD>=1)
                                            {
                                        $this -> un_pr_selling_EUR = $elt["cancellationPrice"]["amount"] / $QUOTE->USD;
                                      }else{
                                        $this -> un_pr_selling_EUR = $elt["cancellationPrice"]["amount"] * $QUOTE->USD;
                                      }
                                    }elseif($elt["cancellationPrice"]["currency"] == 'MAD'){
                                        
                                        if( $QUOTE->MAD >=1)
                                        {
                                              $this -> un_pr_selling_EUR = $elt["cancellationPrice"]["amount"] / $QUOTE->MAD;
                                         }else{
                                             $this -> un_pr_selling_EUR = $elt["cancellationPrice"]["amount"] * $QUOTE->MAD;
                                        }
                                    }

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
    //  dd($this -> lastActionDate);

        $reser = new Reservation;
          //  return $this -> tgx;
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

        $reser -> un_pr_selling_EUR = $this -> un_pr_selling_EUR ;
        $reser -> un_pr_purchasing_EUR = $this -> un_pr_purchasing_EUR ;
        $reser -> Commission_bdsc = $this -> Commission_bdsc ;
        $reser ->  marge = $this ->  marge ;

        $reser -> hotelName = $this -> hotelName ;
        $reser -> providerName = $this -> providerName ;

        $reser -> Booking_Window = $this -> bw_days_count ;



        $reser -> price_per_night = $this -> price_per_night;
        $reser -> nights_count = $this -> nights_count;
        
        // $reser -> marge_binding =  $this -> marge_binding;
        // $reser -> commission_bdsc_binding = $this -> commission_bdsc_binding;

        $reser -> reservationError = $this -> reservationError ;
        $lastActionDate = explode(" ", $this -> lastActionDate);
        $lastActionDate=date('Y-m-d', strtotime($lastActionDate[0]. ' -1 days'));
        $QUOTE=Quote::where("DATE",$lastActionDate)->first(); 
        //  return $QUOTE;
        if($this -> quoteSellingPrice_currency == 'EUR'){
            $diffrentSE = 1 ;              
          }elseif($this -> quoteSellingPrice_currency == 'USD'){
            $diffrentSE = $QUOTE->USD ;            
          }elseif($this -> quoteSellingPrice_currency == 'MAD'){
            $diffrentSE =$QUOTE->MAD  ;
          }
        // $dt= $dt->format('Y-m-d');
       
        
          $reser -> quoteSelling_booking = $diffrentSE ;
          $reser -> quoteSelling_checkout = 0 ;
        
        // purchasing price quoteProviderPrice_currency
        if($this -> quoteProviderPrice_currency == 'EUR'){
            $diffrentPR = 1 ;              
          }elseif($this -> quoteProviderPrice_currency == 'USD'){
            $diffrentPR = $QUOTE->USD ;            
          }elseif($this -> quoteProviderPrice_currency == 'MAD'){
            $diffrentPR = $QUOTE->MAD ;
          }
         
        $reser -> quotePurchasing_booking =$diffrentPR ;
        $reser -> quotePurchasing_checkout = 0 ;
                  
        $reser-> save();
    
    }
}