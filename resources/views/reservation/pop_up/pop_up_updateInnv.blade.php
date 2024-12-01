<div class="modal fade" id="update_innvoice-{{$tgx}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel2">-{{$tgx}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <form action="{{ url('production/update_innvioce') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <label for="">Invoice  Seller</label>
                <input type="hidden" value="{{$tgx}}" name="tgx">
                {{-- <input type="text" id="Invoice_Seller" readonly value="{{ $invoice_status_seller }}" class="form-control"> --}}
                {{-- <label>invoice status seller</label> --}}
                <select class="form-control"  name="invoice_status_seller" id="invoice_status_seller">
                    <option  value="">Select Status</option>
                    <option @if($invoice_status_seller== "Invoiced") selected @endif value="Invoiced">Invoiced</option>
                    <option @if($invoice_status_seller== "Refund") selected @endif value="Refund">Refund</option>
                    <option @if($invoice_status_seller== "Due" ) selected @endif value="Due">Due</option>
                </select>
                @error('invoice_status_seller') <span class="text-danger">{{ $message }}</span>@enderror
                <label for="">Invoice  Buyer</label>
                {{-- <input type="text" id="Invoice_Buyer" readonly  value ="{{ $invoice_status_buyer }}" class="form-control"> --}}
                <select class="form-control" name="invoice_status_buyer" id="invoice_status_buyer">
                    <option value="">Select Status</option>
                    <option @if($invoice_status_buyer== "Invoiced") selected @endif  value="Invoiced">Invoiced</option>
                    <option  @if($invoice_status_buyer== "Refund") selected @endif value="Refund">Refund</option>
                    <option  @if($invoice_status_buyer== "Due") selected @endif value="Due">Due</option>
                </select>
                @error('invoice_status_buyer') <span class="text-danger">{{ $message }}</span>@enderror
            
                <label for="">Payment Status</label>
                {{-- <input type="text" id="Payment_Status" readonly value="{{ $Payment_Status }}" class="form-control"> --}}
                <select class="form-control" name="Payment_Status" id="Payment_Status">
                    <option @if($Payment_Status== "Payed") selected @endif value="Payed">Payed</option>
                    <option @if($Payment_Status== "Not-Payed") selected @endif value="Not-Payed">Not-Payed</option>
                </select>
                @error('Payment_Status') <span class="text-danger">{{ $message }}</span>@enderror
            
                <div id="notif"></div>
            </div>  
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" id="copy">Enregistre</button>

            </div>
        </form>
    </div>
</div>
</div>