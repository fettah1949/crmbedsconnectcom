<div class="modal fade" id="edit_reservation-{{$tgx}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel2">Reservation {{$provider_01}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <form action="{{url('/updateseller')}}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="modal-body">
                 {{-- @method('PUT') --}}
                    <div class="row">
                            <input type="hidden" value="{{$tgx}}" name="tgx">
                            <div class="col-sm-6">
                                <div class="form-group col-sm-auto">
                                    <label>HCN</label>
                                    <input  type="text" class="form-control" name="HCN" value="" title="" placeholder="HCN">
                                    @error('HCN') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group col-sm-auto">
                                    <label>Hotel Reservation Agent</label>
                                    <input  type="text" class="form-control" name="Agent_Name" title="" value="" placeholder="Agent_Name">
                                    @error('Agent_Name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        
                    </div> 
            
                     <hr> 
           
           
          

          
    
            </div>

       
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" id="copy">Enregistre</button>

            </div>
    </form>
    </div>
</div>
</div>

