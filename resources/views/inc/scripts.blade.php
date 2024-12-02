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

<script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js')}}"></script>
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
    <!--<script src="{{asset('plugins/noUiSlider/nouislider.min.js')}}"></script>-->
<script>
  var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
  mode: "range"
});
    </script>
    <!--<script src="{{asset('plugins/flatpickr/custom-flatpickr.js')}}"></script>-->
    <!--<script src="{{asset('plugins/noUiSlider/custom-nouiSlider.js')}}"></script>-->
    <!--<script src="{{asset('plugins/select2/custom-select2.js')}}"></script>-->
<!--<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>-->
<!--<script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>-->
<!--<script src="{{asset('assets/js/custom.js')}}"></script>-->

  
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
   


<script type="text/javascript">
  var ss = $(".basic").select2({
    tags: true,
});

    </script>
    

@endif
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@switch($page_name)
    @case('sales')
      {{-- Dashboard --}}
      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/dash_2.js')}}"></script>
      @break

    @case('analytics')
      {{-- Dashboard 2 --}}
      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/dash_2.js')}}"></script>
      @break

      @case('reservation')
        {{-- Tables Datatable Basic --}}
        <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
        <script src="{{asset('assets/js/apps/ts.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
        <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
     @if (Auth::guard()->user()->role==1)
        <script>
          $('#html5-extension').DataTable( {
              "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
          "<'table-responsive'tr>" +
          "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          
              buttons: {
                
                     buttons: [
                    
                      // { extend: 'copy', className: 'btn btn-sm' },
                      // { extend: 'csv', className: 'btn btn-sm' },
                      { extend: 'excel', text:'Export', className: 'btn btn-sm',
                      exportOptions: {
                    columns: [ 0, 1, 2,3,5,10,11,12,26,14,15,24,17]
                     } 
                      },
                        {extend: 'excel',  text:'Export Invoices', className: 'btn btn-sm',title: 'Export Invoices',

                      exportOptions: {
                    columns: [12,13,8,9,4,5,3,8,7,2,1,27,15,16,25,19,20,24,29]
                     } 
                      },
                      {extend: 'excel',  text:'Export Bill', className: 'btn btn-sm',title: 'Export Bill',

                      exportOptions: {
                      columns: [12,13,8,9,4,5,3,8,7,2,1,27,15,16,22,23,20,24,30]
                      } 
                      },
                      // { extend: 'print', className: 'btn btn-sm' }27
                  ]
              },
              "columnDefs": [ {
            "orderable": true,
            "searchable": true,
             "targets": [0-26]
               }],
               "order": [14, "DESC" ],
                 'aaSorting'   : [[14, 'DESC']],
              "oLanguage": {
                  "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                  "sInfo": "Showing page _PAGE_ of _PAGES_",
                  "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                  "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
              },
              "stripeClasses": [],
              "lengthMenu": [7, 10, 20, 50],
              "pageLength": 20 
          } );
          
        </script>
        @else
        <script>
          $('#html5-extension').DataTable( {
              "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
          "<'table-responsive'tr>" +
          "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          
              buttons: {
                
                     buttons: [
                           { extend: 'excel', text:'Export', className: 'btn btn-sm',
                      exportOptions: {
                    columns: [ 0, 1, 2,3,5,10,11,12,13,14,15]
                     } 
                      },
                    
                  
                  ]
              },
              "columnDefs": [ {
            "orderable": true,
            "searchable": true,
             "targets": [0-24]
        }],
               "order": [14, "DESC" ],
                'aaSorting'   : [[14, 'DESC']],
              "oLanguage": {
                  "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                  "sInfo": "Showing page _PAGE_ of _PAGES_",
                  "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                  "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
              },
              "stripeClasses": [],
              "lengthMenu": [7, 10, 20, 50],
              "pageLength": 20 
          } );
          
        </script>
        @endif 
      @break
      @case('reservation_seller')
        {{-- Tables Datatable Basic --}}
        <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
        <script src="{{asset('assets/js/apps/ts.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
        <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    
     
        
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