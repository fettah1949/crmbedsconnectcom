<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
@endif
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@switch($page_name)
    @case('sales')
      {{-- Dashboard --}}
      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
      @break

    @case('analytics')
      {{-- Dashboard 2 --}}
      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/dash_2.js')}}"></script>
      @break

      @case('reservation')
      {{-- Tables Datatable Basic --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('assets/js/apps/ts.js')}}"></script>
     
      
      @break

      @case('agencys')
      {{-- Tables Datatable Basic --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('assets/js/apps/ts.js')}}"></script>
     
      
      @break
    
      @case('hotel_list')
      {{-- Tables Datatable Basic --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('assets/js/apps/ts.js')}}"></script>
     
      
      @break
    
    
      @case('hotel_room_list')
      {{-- Tables Datatable Basic --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('assets/js/apps/ts.js')}}"></script>
     
      
      @break
    
    
      @case('rooms_list')
      {{-- Tables Datatable Basic --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('assets/js/apps/ts.js')}}"></script>
     
      
      @break
      
      
      
    
      @case('banks')

      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/widgets/modules-widgets.js')}}"></script>
      <script src="{{asset('plugins/apex/custom-apexcharts.js')}}"></script>  
      <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>

      {{-- Tables Datatable Basic --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('assets/js/apps/ts.js')}}"></script>
     
      
      @break
      
      
      @case('transaction')

      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/widgets/modules-widgets.js')}}"></script>
      <script src="{{asset('plugins/apex/custom-apexcharts.js')}}"></script>  
      <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>

      {{-- Tables Datatable Basic --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('assets/js/apps/ts.js')}}"></script>
     
      
      @break
    
    
    
    @case('general_contact')
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/apps/contacts.css')}}" rel="stylesheet" type="text/css" />
      <script src="{{asset('assets/js/apps/contact.js')}}"></script>
      @break
    
    @case('sellers_contact')
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/apps/contacts.css')}}" rel="stylesheet" type="text/css" />
      @break
    
    @case('buyers_contact')
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/apps/contacts.css')}}" rel="stylesheet" type="text/css" />
      @break
   
    @case('expense')
    
    
      {{-- Tables Datatable Basic --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('assets/js/apps/ts.js')}}"></script>
     
      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('plugins/apex/custom-apexcharts.js')}}"></script>  
      <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
      @break
      
    @case('mailbox')    
      <script src="{{asset('assets/js/ie11fix/fn.fix-padStart.js')}}"></script>
      <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
      <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
      <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
      <script src="{{asset('assets/js/apps/custom-mailbox.js')}}"></script>
      @break
    
    @case('bank')
      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/widgets/modules-widgets.js')}}"></script>
      <script src="{{asset('plugins/apex/custom-apexcharts.js')}}"></script>  
      <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
      @break
    
  
    
    
    
  @default
    <script>console.log('No custom script available.')</script>
@endswitch
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->