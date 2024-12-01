@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">


    <div class="row layout-top-spacing">
    
        <div class="col-12 col-md-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-content">
                            <div class="w-info">
                                <h6 class="value">45,141 $</h6>
                                <p class="">Expenses</p>
                            </div>
                            <div class="">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
        </div>

        <div id="chartLine" class="col-12 col-md-8 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                            <h4>Apex (Simple)</h4>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="s-line" class=""></div>

                    
                </div>
            </div>
        </div>

        <div class="col-4 col-md-4 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading">
                        <h5 class="">Sales by Category</h5>
                    </div>
                    <div class="widget-content">
                        <div id="chart-2" class=""></div>
                    </div>
                </div>
        </div>
    

    </div>

</div>

            
@endsection