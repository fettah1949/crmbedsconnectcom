<link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/js/loader.js')}}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}">
@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
@endif
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@switch($page_name)
    @case('analytics')
      {{-- Dashboard --}}
      <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
      @break

    @case('sales')
      {{-- Dashboard 2 --}}
      <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
      @break

    @case('reservation')
      {{-- Table Datatable Alternative --}}
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      {{-- <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />   --}}
      {{-- <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}"> --}}
      {{-- <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_custom.css')}}"> --}}
      

      @break

      @case('agencys')

      {{-- Table Datatable Alternative --}}
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />  
      

      @break

      @case('hotel_list')

      {{-- Table Datatable Alternative --}}
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />  
      

      @break



      @case('hotel_room_list')

      {{-- Table Datatable Alternative --}}
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />  
      

      @break



      @case('rooms_list')

      {{-- Table Datatable Alternative --}}
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />  
      

      @break
      
      
      

      @case('banks')
      
      {{-- Charts --}}
      <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />



      {{-- Table Datatable Alternative --}}
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />  
      

      @break



      @case('transaction')
      
      {{-- Charts --}}
      <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />


      {{-- Table Datatable Alternative --}}
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />  
      

      @break


    @case('general_contact')
      <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="{{asset('assets/js/apps/contact.js')}}"></script>
      @break

    @case('sellers_contact')
      <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="{{asset('assets/js/apps/contact.js')}}"></script>
      @break

    @case('buyers_contact')
      <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="{{asset('assets/js/apps/contact.js')}}"></script>
      @break

   
    @case('expense')
      {{-- Charts --}}
      <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />

      
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
      <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />  
      
      <style>
          .apexcharts-canvas {
              margin: 0 auto;
          }

          .apexcharts-title-text {
              fill: #e0e6ed;
          }
          .apexcharts-yaxis-label {
              fill: #e0e6ed;
          }
          .apexcharts-xaxis-label {
              fill: #e0e6ed;
          }
          .apexcharts-legend-text {
              color: #e0e6ed!important;
          }
          .apexcharts-radialbar-track.apexcharts-track .apexcharts-radialbar-area {
              stroke: #191e3a;
          }
          .apexcharts-pie-label, .apexcharts-datalabel, .apexcharts-datalabel-label, .apexcharts-datalabel-value {
              fill: #bfc9d4;
          }
      </style>
      @break


    @case('mailbox')
      <link rel="stylesheet" type="text/css" href="{{asset('plugins/editors/quill/quill.snow.css')}}">
      <link href="{{asset('assets/css/apps/mailbox.css')}}" rel="stylesheet" type="text/css" />
      <script src="plugins/sweetalerts/promise-polyfill.js"></script>
      <link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />
      @break

    @case('bank')
      {{-- Charts --}}
      <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/widgets/modules-widgets.css')}}">
      <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
      @break
    
    
    @default
        <script>console.log('No custom Styles available.')</script>
@endswitch
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->