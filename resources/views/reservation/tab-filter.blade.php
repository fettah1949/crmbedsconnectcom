

                            <div class="panel-body"     display:inline-block >
                            @if($type=='reservation')
                            <form  id="fs" action="{{ route('reservation.create') }}" method="PUT">
                            @elseif($type=='Client')
                            <form  id="fs" action="{{ url('client_search') }}" method="PUT">
                            @elseif($type=='sale')
                            <form  id="fs" action="{{ url('search_sale') }}" method="PUT">
                            @else
                            <form  id="fs" action="{{ url('searchanalytics') }}" method="PUT">
                            @endif
                                       @csrf
                                    <div class="row">

                           
                                      <div class="col-md-6">
                                             <div class="form-group" >
                                              <label  for="start_date" class="control-label col-sm-auto" >Start Date:</label>
                                                <input id="rangeCalendarFlatpickr"  name="rangeCalendarFlatpickr" @if(isset($filter['rangeCalendarFlatpickr '] )) value="{{ $filter['rangeCalendarFlatpickr '] }}" @endif class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date..">
                                                {{-- <label  for="start_date" class="control-label col-sm-auto" >Start Date: </label>
                                                <div class="col-sm-auto" >
                                                    <input type="date" class="form-control" id="start_date" name="start_date" />
                                                    @error('start_date') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div> --}}
                                             </div>
                                      </div>
                                      {{-- <div class="col-md-3">
                                             <div class="form-group">
                                               <label for="end_date" class="control-label col-sm-auto">End Date: </label>
                                                 <div class="col-sm-auto">
                                                   <input type="date" class="form-control" id="end_date" name="end_date"  />
                                                   @error('end_date') <p class="text-danger">{{ $message }}</p> @enderror
                                               </div>
                                             </div>
                                      </div> --}}
                                      <div class="col-md-3">
                                             <div class="form-group">
                                               <label for="date_type" class="control-label col-sm-auto">Date Type: </label>
                                                 <div class="col-sm-auto">
                                                   <select class="form-control" id="date_type" name="date_type"  >
                                                     <option value="">Select Type</option>
                                                     <option @if($filter['date_type']=="bookingDate") selected @endif value="bookingDate">Booking Date</option>
                                                     <option @if($filter['date_type']=="checkinDate") selected @endif value="checkinDate">Checkin Date</option>
                                                     <option @if($filter['date_type']=="checkoutDate") selected @endif value="checkoutDate">Checkout Date</option>
                                                     <option @if($filter['date_type']=="lastActionDate") selected @endif value="lastActionDate">LastAction Date</option>
                                                   </select>                                            
                                                   @error('date_type') <p class="text-danger">{{ $message }}</p> @enderror
                                               </div>
                                             </div>
                                      </div>
                                      <div class="col-md-3">
                                             <div class="form-group">
                                               <label for="status" class="control-label col-sm-auto">Status: </label>
                                               <div class="col-sm-auto">
                                                 <select class="form-control" id="status" name="status"  >
                                                    <option value="">Select Status</option>
                                                    <option @if($filter['status']=="CN") selected @endif value="CN">Cancelled</option>
                                                   <option @if($filter['status']=="OK") selected @endif value="OK">Confirmed</option>
                                                   <option @if($filter['status']=="KUN") selected @endif value="KUN">Failed</option>
                                                   
                                                   @if($type=='reservation')
                                                   <option @if($filter['status']=="CN-FEE") selected @endif value="CN-FEE">Cancelled Whith Fee</option>
                                                   <option @if($filter['status']=="CN-NRF") selected @endif value="CN-NRF">Cancelled Non Refundable</option>
                                                   <option @if($filter['status']=="NO-SHOW") selected @endif value="NO-SHOW">No-Show</option>
                                                   @endif
                                                 </select>
                                                 @error('status') <p class="text-danger">{{ $message }}</p> @enderror
                                               </div>
                                             </div>
                                      </div>
                                    </div>
                              @if($type=='reservation' || $type == 'sale' || $type == 'Client')
                                    <div class="row">
                                    <div class="col-md-6">
                                        {{-- {{ $filter['hotel']}} --}}

                                      
                                          <div class="form-group">
                                            <label for="service_category" class="control-label col-sm-auto">Code: <span style="color: red" id="code_message"></span></label>
                                              <div class="col-sm-auto">
                                                    <input onchange="check_code();" class="form-control basic" @if(isset($filter['Code']) ) 
                                                    value="{{ $filter['Code'] }}" @endif id="Code" name="Code"  />
                                                        
                                                          
                                                    </select>
                                                  @error('Code') <p class="text-danger">{{ $message }}</p> @enderror
                            
                                              </div>
                                          </div>
                                      </div>
                                    

                                    
                                      <div class="col-md-6">
                                        {{-- {{ $filter['hotel']}} --}}
                                        <div class="form-group">
                                            <label for="service_category" class="control-label col-sm-auto">Type Code: <span style="color: red" id="Type_message"></span></label>
                                              <div class="col-sm-auto">
                                                  <select onchange="check_code();" class="form-control basic" id="Type_code" name="Type_code"  >
                                                        <option  value="">Select Type</option>
                                                      
                                            <option   @if($filter['Type_code']=="tgx" ) selected @endif value="tgx">BOOKING_ID</option>
                                            @if($type=='reservation')
                                            <option  @if($filter['Type_code']=="provider" ) selected @endif  value="provider">BDC_ID</option>
                                            @endif
                                            <option   @if($filter['Type_code']=="client") selected @endif value="client"> Agency_ID</option>
                                                        
                                                  </select>
                                                @error('Type_code') <p class="text-danger">{{ $message }}</p> @enderror
                          
                                            </div>
                                          </div>
                                      </div>
                                    
                                    </div>
                                     @endif
                                     @if($type != 'Client')
                                     <div class="row">
                                        <div class="col-md-6">
                                                {{-- {{ $filter['hotel']}} --}}
                                          <div class="form-group">
                                            <label for="service_category" class="control-label col-sm-auto">Hotel: </label>
                                              <div class="col-sm-auto">
                                                  <select class="form-control  selectpicker" data-live-search="true" id="hotel" name="hotel"  >
                                                        <option  value="">Select Hotel</option>
                                                          @foreach ($hotels as $hotel)
                                                              <option @if($filter['hotel']==$hotel->Hotel_Code) selected @endif value="{{ $hotel->Hotel_Code }}">{{ $hotel->Hotel_Name }}</option>
                                                          @endforeach
                                                    </select>
                                                @error('hotel') <p class="text-danger">{{ $message }}</p> @enderror
                            
                                              </div>
                                          </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                          
                                          <div class="form-group">
                                            <label for="agency" class="control-label col-sm-auto">Buyer: </label>
                                              <div class="col-sm-auto">
                                                <select class="form-control selectpicker" data-live-search="true" id="agency" name="agency"   >
                                                  <option value="">Select Buyer</option>
                                                  @foreach ($buyers as $buyer)
                                                      <option @if($filter['agency']==$buyer->Agency_ID) selected @endif value="{{ $buyer->Agency_ID }}">{{ $buyer->Agency_Name }}</option>
                                                  @endforeach
                                                </select>
                                                @error('agency') <p class="text-danger">{{ $message }}</p> @enderror
                            
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="provider" class="control-label col-sm-auto">Seller: </label>
                                              <div class="col-sm-auto">
                                                <select class="form-control selectpicker" data-live-search="true" id="provider" name="provider" >
                                                  <option value="">Select Seller</option>
                                                  @foreach ($sellers as $seller)
                                                  <option @if($filter['provider']==$seller->Agency_Name ) selected @endif value="{{ $seller->Agency_ID }}">{{ $seller->Agency_Name }}</option>
                                                  @endforeach
                                            </select>
                                                @error('provider') <p class="text-danger">{{ $message }}</p> @enderror
                            
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                                      
                                          <div class="form-group col-sm-auto">
                                            <label>Payment Status</label>
                                            <select class="form-control" name="Payment_Status" id="Payment_Status">
                                                <option value="">Select Status</option>
                                                <option @if($filter['Payment_Status']=="Payed") selected @endif value="Payed">Payed</option>
                                                <option @if($filter['Payment_Status']=="Not-Payed") selected @endif value="Not-Payed">Not-Payed</option>
                                              </select>
                                            @error('Payment_Status') <span class="text-danger">{{ $message }}</span>@enderror
                                          </div>

                                        </div>
                                     </div>
                                     @endif

                                           @if($type=='analy')
                                     <div class="row">
                                     <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="provider" class="control-label col-sm-auto">Destination: </label>
                                              <div class="col-sm-auto">
                                                <select class="form-control selectpicker" data-live-search="true" id="destination" name="destination" >
                                                  <option value="">Select Destination</option>
                                               
                                                @foreach ($Country_listes as $Country_liste)
                                                  <option @if($filter['destination']==$Country_liste->Country) selected @endif value="{{$Country_liste->Country}}">{{ $Country_liste->Country}}</option>
                                                  @endforeach
                                            </select>
                                                @error('destination') <p class="text-danger">{{ $message }}</p> @enderror
                            
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                                      
                                          <div class="form-group col-sm-auto">
                                            <label>City</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="City" id="City">
                                                <option value="">Select City</option>

                                                @foreach ($city_listes as $city_liste)
                                                  <option @if($filter['City']==$city_liste->City) selected @endif value="{{$city_liste->City}}">{{$city_liste->City}}</option>
                                                  @endforeach
                                                <!-- <option @if($filter['Payment_Status']=="Payed") selected @endif value="Payed">Payed</option> -->
                                                <!-- <option @if($filter['Payment_Status']=="Not-Payed") selected @endif value="Not-Payed">Not-Payed</option> -->
                                              </select>
                                            @error('City') <span class="text-danger">{{ $message }}</span>@enderror
                                          </div>

                                        </div>
                                      </div>
                                     @endif
                                     @if($type=='sale')
                                     <button type="button" onclick="rechercheAjax()"  class="btn btn-outline-success mb-2">Apply</button>
                                    @else
                                    <button type="submit"  class="btn btn-outline-success mb-2">Apply</button>
                                    @endif
                                     <!--<button type="submit"  class="btn btn-outline-success mb-2">Apply</button>-->
                                     <button type="button" onclick="vide();" class="btn btn-outline-secondary mb-2">Clear</button>
                                  </form>
                                   <br>
                                   @if (Session::has('message'))
                                   <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                               @endif
                            </div>
                            
                           