<div class="modal fade" id="Note_reservation-{{$tgx}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            @if(Auth::guard('Client_seller')->check()==false)
            <h5 class="modal-title" id="deleteModalLabel2">Reservation {{$tgx}}</h5>
            @else
            <h5 class="modal-title" id="deleteModalLabel2">Reservation {{$provider_01}}</h5>
            @endif
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>@if(Auth::guard('Client_seller')->check()==false)
        <form action="{{url('/admin/add_Note')}}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{url('/add_Note')}}" method="POST" enctype="multipart/form-data">
                @endif
            @csrf
        <div class="modal-body">
                 {{-- @method('PUT') --}}
                <div class="row">
                    <div class="col-md-12 w-100">
                        <div id="board">
                            <input type="hidden" value="{{$tgx}}" name="tgx">
                            <div class="note draggable">
                                    <div class="">
                                        <div class="card-title">
                                            <h3 class="card-label" style="text-align: center;">Note</h3>
                                        </div>
                                    </div>
                                <div class="text">
                                    <textarea class="cnt" maxlength="200"   rows="5" cols="50"  name="note" placeholder="Enter note Mémo ">{{ $Note }}</textarea>
                                </div>
                            </div>
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

