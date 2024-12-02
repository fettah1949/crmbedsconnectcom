
@php
use App\Models\Agencycontact;
use App\Models\Hotellist;

$sellers = Agencycontact::where('Contact_Type','SELLER')->get();
$buyers = Agencycontact::where('Contact_Type','BUYER')->get();



   $hotels = Hotellist::all();
@endphp
                            <div class="panel-body"     display:inline-block >
                               
                                   <form   action="{{ route('reservation.create') }}" method="PUT">
                                       @csrf
                                     <div class="row">
                                          <div class="form-group" >
                                         <label  for="start_date" class="control-label col-sm-auto" >Start Date: </label>
                                           <div class="col-sm-auto" >
                                               <input type="date" class="form-control" id="start_date" name="start_date" />
                                               @error('start_date') <p class="text-danger">{{ $message }}</p> @enderror
                                           </div>
                                             </div>
                                             <div class="form-group">
                                               <label for="end_date" class="control-label col-sm-auto">End Date: </label>
                                                 <div class="col-sm-auto">
                                                   <input type="date" class="form-control" id="end_date" name="end_date"  />
                                                   @error('end_date') <p class="text-danger">{{ $message }}</p> @enderror
                                               </div>
                                             </div>
                                             
                                             <div class="form-group">
                                               <label for="date_type" class="control-label col-sm-auto">Date Type: </label>
                                                 <div class="col-sm-auto">
                                                   <select class="form-control" id="date_type" name="date_type"  >
                                                     <option value="">Select Type</option>
                                                     <option value="bookingDate">Booking Date</option>
                                                     <option value="checkinDate">Checkin Date</option>
                                                     <option value="checkoutDate">Checkout Date</option>
                                                     <option value="lastActionDate">LastAction Date</option>
                                                   </select>                                            
                                                   @error('date_type') <p class="text-danger">{{ $message }}</p> @enderror
                                               </div>
                                             </div>
                        
                                             <div class="form-group">
                                               <label for="status" class="control-label col-sm-auto">Status: </label>
                                               <div class="col-sm-auto">
                                                 <select class="form-control" id="status" name="status"  >
                                                    <option value="">Select Status</option>
                                                    <option value="CN">Cancelled</option>
                                                   <option value="OK">Confirmed</option>
                                                   <option value="KUN">Unknown Status</option>
                                                   <option value="CN-FEE">Cancelled Whith Fee</option>
                                                   <option value="CN-NRF">Cancelled Non Refundable</option>
                                                   <option value="NO-SHOW">No-Show</option>
                                                 </select>
                                                 @error('status') <p class="text-danger">{{ $message }}</p> @enderror
                                               </div>
                                             </div>
                                           </div>
                        
                                   <div class="row">
                                       <div class="form-group">
                                         <label for="service_category" class="control-label col-sm-auto">Hotel: </label>
                                           <div class="col-sm-auto">
                                               <select class="form-control" id="hotel" name="hotel"  >
                                                     <option value="">Select Hotel</option>
                                                      @foreach ($hotels as $hotel)
                                                          <option value="{{ $hotel->Hotel_Code }}">{{ $hotel->Hotel_Name }}</option>
                                                      @endforeach
                                                </select>
                                             @error('hotel') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                         </div>
                                       </div>
                        
                                       
                                       <div class="form-group">
                                         <label for="agency" class="control-label col-sm-auto">Buyer: </label>
                                           <div class="col-sm-auto">
                                            <select class="form-control" id="agency" name="agency"   >
                                              <option value="">Select Buyer</option>
                                               @foreach ($buyers as $buyer)
                                                   <option value="{{ $buyer->Agency_ID }}">{{ $buyer->Agency_Name }}</option>
                                               @endforeach
                                         </select>
                                             @error('agency') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                         </div>
                                       </div>
                        
                                       <div class="form-group">
                                         <label for="provider" class="control-label col-sm-auto">Seller: </label>
                                           <div class="col-sm-auto">
                                            <select class="form-control" id="provider" name="provider" >
                                              <option value="">Select Seller</option>
                                               @foreach ($sellers as $seller)
                                               <option value="{{ $seller->Agency_Name }}">{{ $seller->Agency_Name }}</option>
                                               @endforeach
                                         </select>
                                             @error('provider') <p class="text-danger">{{ $message }}</p> @enderror
                        
                                         </div>
                                       </div>
                                       
                                       
                                                    
                                        <div class="form-group col-sm-auto">
                                          <label>Payment Status</label>
                                          <select class="form-control" name="Payment_Status" id="Payment_Status">
                                              <option value="">Select Status</option>
                                              <option value="Payed">Payed</option>
                                              <option value="Not-Payed">Not-Payed</option>
                                            </select>
                                          @error('Payment_Status') <span class="text-danger">{{ $message }}</span>@enderror
                                      </div>

                                   
                                     </div>
                               
                                     <button type="submit" class="btn btn-outline-success mb-2">Apply</button>
                                     <button type="reset" class="btn btn-outline-secondary mb-2">Clear</button>
                                   </form>
                                   <br>
                                   @if (Session::has('message'))
                                   <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                               @endif
                            </div>
                        
                        