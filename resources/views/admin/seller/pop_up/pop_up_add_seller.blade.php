<div class="modal fade" id="add_seller" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel2">ADD BUYER </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <form class="text-left"  action="{{url('/seller/add_register')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form">

                <div id="username-field" class="field-wrapper input">
                    <label for="username">Name</label>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> --}}
                    <input required id="nom" name="nom" type="text" class="form-control" placeholder="Name">
                </div>
                <div id="username-field" class="field-wrapper input">
                    <label for="seller">Buyer</label>
                <select required class="form-control "  id="provider" name="provider" >
                    <option value="">Buyer</option>
                   
                     @foreach ($sellers as $seller)
                     <option  value="{{ $seller->Agency_ID }}">{{ $seller->Agency_ID }}</option>
                     @endforeach
               </select>
                  </div>
                <div id="email-field" class="field-wrapper input">
                    <label for="email">EMAIL</label>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg> --}}
                    <input  required id="Email_seller" name="Email_seller" type="text" value="" class="form-control" placeholder="Email">
                </div>

                <div id="password-field" class="field-wrapper input mb-2">
                    <div class="d-flex justify-content-between">
                        <label for="password">PASSWORD</label>
                    </div>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> --}}
                    <input required id="password_seller" name="password_seller" type="password" class="form-control" placeholder="Password">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> --}}
                </div>

               

                <div class="d-sm-flex justify-content-between">
                    <div class="field-wrapper">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

                        <button type="submit" class="btn btn-primary" value="">Add</button>
                    </div>
                </div>
             

            </div>
        </form>
    </div>
</div>
</div>

