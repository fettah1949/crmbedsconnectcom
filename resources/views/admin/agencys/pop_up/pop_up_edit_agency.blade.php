<div class="modal fade" id="edit_agency-{{$id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel2">Edit Agency</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>


        <form action="{{ route('agencylist.update',$id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tgx" value="{{ $id }}" />
            <div class="modal-body">
                @method('PUT')
                <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">Agency ID</label>
                                <input disabled type="text" class="form-control" id="exampleFormControlInput" placeholder="Agency ID" value="{{ $Agency_ID }}" name="Agency_ID">
                                @error('Agency_ID') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">Agency Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Agency Name" value="{{ $Agency_Name }}" name="Agency_Name">
                                @error('Agency_Name') <span class="text-danger error">{{ $message }}</span>@enderror
                            
                            </div>
                        </div>
                    
                </div> 
            
                <hr>
                
                <h3>Booking Department</h3> 
                <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">First Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="First Name" value="{{ $First_Name }}" name="First_Name">
                                @error('First_Name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                    
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">Last Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Last Name" value="{{ $Last_Name }}" name="Last_Name">
                                @error('Last_Name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">Email</label>
                                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email" value="{{ $Email }}" name="Email">
                                @error('Email') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">Email2</label>
                                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email2" value="{{ $Email2 }}" name="Email2">
                                @error('Email2') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">Phone</label>
                                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Phone" value="{{ $Phone }}" name="Phone">
                                @error('Phone') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">Mobile</label>
                                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Mobile" value="{{ $Mobile }}" name="Mobile">
                                @error('Mobile') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group col-sm-auto">
                                <label for="exampleFormControlInput">Emergency Phone</label>
                                <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Emergency Phone" value="{{ $Emergency_Phone }}" name="Emergency_Phone">
                                @error('Emergency_Phone') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        
                        
                <div id="notif"></div>
            </div>
            <hr>
            <h3>Escalation</h3> 
            {{-- @if (Auth::guard()->user()->role==1) --}}
            <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">First Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="First Name" value="{{ $First_Name_1 }}" name="First_Name_1">
                            @error('First_Name_1') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Last Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Last Name" value="{{ $Last_Name_1 }}" name="Last_Name_1">
                            @error('Last_Name_1') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Email</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email" value="{{ $Email_1 }}" name="Email_1">
                            @error('Email_1') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Email2</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Email2" value="{{ $Email2_1 }}" name="Email2_1">
                            @error('Email2_1') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Phone</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Phone" value="{{ $Phone_1 }}" name="Phone_1">
                            @error('Phone_1') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Mobile</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Mobile" value="{{ $Mobile_1 }}" name="Mobile_1">
                            @error('Mobile_1') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                      
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Emergency Phone</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="Emergency Phone" value="{{ $Emergency_Phone }}" name="Emergency_Phone">
                            @error('Emergency_Phone') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    
                       
                    </div>
            </div>
            <hr> 
            <div class="row"> 
                   
                    <div class="col-sm-6">
                        <div class="form-group col-sm-auto">
                            <label>Contact Type</label>
                            <select class="form-control" id="Contact_Type" value="Contact_Type " name="Contact_Type">
                            <option  value="">Select Type</option>
                            <option @if($Contact_Type=='SELLER') selected @endif value="SELLER">Seller</option>
                            <option @if($Contact_Type=='BUYER') selected @endif  value="BUYER">Buyer</option>
                            <option @if($Contact_Type=='HSS') selected @endif  value="HSS">HSS</option>
                            </select>
                            @error('Contact_Type') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Code country</label>
                            <input type="text" class="form-control" id="exampleFormControlInput" placeholder="ZIP code" value="{{ $ZIP_code }}" name="ZIP_code">
                            @error('ZIP_code') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group col-sm-auto">
                            <label for="exampleFormControlInput">Billing Country</label>
                        
                            <input class="form-control" name="Billing_Country" type="text" list="select-contry" placeholder="Select Country" value="{{ $Billing_Country  }}" >
                            <datalist id="select-contry">
                            
                                <option value="">Select Country</option>
                                
                                @foreach ($countries as $country)
                                    <option value="{{ $country->nom_en_gb }}">{{ $country->nom_en_gb }}</option>
                                @endforeach
                            </datalist>  
                            @error('Billing_Country') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                     
                    </div>
            
        
            </div>

            <hr>
        
            
                 <div class="row">
                <div class="form-group col-sm-auto">
                    <label for="exampleFormControlInput">ZohoID</label>
                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="ZohoID" value="{{ $ZohoID }}" name="ZohoID">
                    @error('ZohoID') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>


                </div>
                <hr>


            
            {{-- @endif --}}
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success" id="copy">Enregistre</button>

                </div>
                
            </div>
      </form>
    </div>
</div>
</div>
 
