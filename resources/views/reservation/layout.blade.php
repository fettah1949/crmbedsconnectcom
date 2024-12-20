
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="UiTUQdOvm4xtryZ2RMrVS0bIchzZlAj8ye5V8WBC">

    <title>Reservation | CRM |</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/img/favicon.ico') }}"/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
      
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
      <link href="{{ asset('assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />  

      
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
      

      <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->  
</head>


<body>
    
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

                        <ul class="navbar-item theme-brand flex-row  text-center">
                            <li class="nav-item theme-logo">
                                <a href="">
                                    <img src="{{ asset('storage/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                                </a>
                            </li>
                            <li class="nav-item theme-text">
                                <a href="" class="nav-link"> BEDSCONNECT </a>
                            </li>
                        </ul>

                                    <ul class="navbar-item flex-row ml-md-0 ml-auto">
                            <li class="nav-item align-self-center search-animated">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                <form class="form-inline search-full form-inline search" role="search">
                                    <div class="search-bar">
                                        <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                                    </div>
                                </form>
                            </li>
                        </ul>
                        
                        <ul class="navbar-item flex-row ml-md-auto">
                                            <li class="nav-item dropdown language-dropdown">
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('storage/img/ca.png') }}" class="flag-width" alt="flag">
                                </a>
                                <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="{{ asset('storage/img/de.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;German</span></a>
                                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="{{ asset('storage/img/jp.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Japanese</span></a>
                                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="{{ asset('storage/img/fr.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;French</span></a>
                                    <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="{{ asset('storage/img/ca.png') }}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;English</span></a>
                                </div>
                            </li>

                            <li class="nav-item dropdown message-dropdown">
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                </a>
                                <div class="dropdown-menu p-0 position-absolute" aria-labelledby="messageDropdown">
                                    <div class="">
                                        <a class="dropdown-item">
                                            <div class="">

                                                <div class="media">
                                                    <div class="user-img">
                                                        <img class="usr-img rounded-circle" src="{{ asset('storage/img/90x90.jpg') }}" alt="profile">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="">
                                                            <h5 class="usr-name">Kara Young</h5>
                                                            <p class="msg-title">ACCOUNT UPDATE</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="">

                                                <div class="media">
                                                    <div class="user-img">
                                                        <img class="usr-img rounded-circle" src="{{ asset('storage/img/90x90.jpg') }}" alt="profile">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="">
                                                            <h5 class="usr-name">Daisy Anderson</h5>
                                                            <p class="msg-title">ACCOUNT UPDATE</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="">

                                                <div class="media">
                                                    <div class="user-img">
                                                        <img class="usr-img rounded-circle" src="{{ asset('storage/img/90x90.jpg') }}" alt="profile">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="">
                                                            <h5 class="usr-name">Oscar Garner</h5>
                                                            <p class="msg-title">ACCOUNT UPDATE</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown notification-dropdown">
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                                </a>
                                <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                                    <div class="notification-scroll">

                                        <div class="dropdown-item">
                                            <div class="media">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                                <div class="media-body">
                                                    <div class="notification-para"><span class="user-name">Shaun Park</span> likes your photo.</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown-item">
                                            <div class="media">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                                <div class="media-body">
                                                    <div class="notification-para"><span class="user-name">Kelly Young</span> shared your post</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown-item">
                                            <div class="media">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                                <div class="media-body">
                                                    <div class="notification-para"><span class="user-name">Kelly Young</span> mentioned you in comment.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                                            
                            <li class="nav-item dropdown user-profile-dropdown">
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <img src="{{ asset('storage/img/90x90.jpg') }}" alt="avatar">
                                </a>
                                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                                    <div class="">
                                        <div class="dropdown-item">
                                            <a href="/project1/public/users/profile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                                        </div>
                                        <div class="dropdown-item">
                                            <a href="/project1/public/mailbox"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> Inbox</a>
                                        </div>
                                        <div class="dropdown-item">
                                            <a href="/authentication/lockscreen_boxed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Lock Screen</a>
                                        </div>
                                        <div class="dropdown-item">
                                            <a href="{{ asset('logout') }}" 
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                                        </div>
                                        <form id="logout-form" action="{{ asset('logout') }}" method="POST" style="display: none;">
                                            <input type="hidden" name="_token" value="UiTUQdOvm4xtryZ2RMrVS0bIchzZlAj8ye5V8WBC">                            </form>
                                    </div>
                                </div>
                            </li>

                        </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Production</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Reservation</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
            <ul class="navbar-nav flex-row ml-auto ">
                <li class="nav-item more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a>
                            <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>
                            <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                            <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
            
        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">
                
                
                    <li class="menu ">
                        <a href="#dashboard" data-active="false" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled " id="dashboard" data-parent="#accordionExample">
                            <li class="">
                                <a href="/public/sales"> Sales </a>
                            </li>
                            <li class="">
                                <a href="/public/analytics"> Analytics </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu active">
                        <a href="#production" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Production</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="production" >
                            
                                
                            <li class="active">
                                <a href="/production/reservation"> Reservation </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="menu ">
                        <a href="#invoicing" data-active="false" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Invoicing</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled " id="invoicing" >
                            
                                
                            <li class="">
                                <a href="/public/invoicing/sale"> Sale </a>
                            </li>

                            <li class="">
                                <a href="/public/invoicing/purchase"> Purchase </a>
                            </li>
                            
                            
                        </ul>
                    </li>


                    <li class="menu ">
                        <a href="/public/bank" data-active="false"  aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Bank</span>
                            </div>
                        </a>
                        
                    </li>

                    <li class="menu ">
                        <a href="/public/expense" data-active="false" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                                <span>Expense</span>
                            </div>
                        </a>
                    </li>

                    
                    <li class="menu ">
                        <a href="#contact" data-active="false" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Contact</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled " id="contact" data-parent="#contact">
                            <li class="">
                                <a href="/public/contact/general_contact"> General</a>
                            </li>
                            <li class="">
                                <a href="/public/contact/sellers_contact"> Sellers</a>
                            </li>
                            <li class="">
                                <a href="/public/contact/buyers_contact"> Buyers</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu ">
                        <a href="/public/mailbox" data-active="false"  aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                <span>Mailbox</span>
                            </div>
                        </a>
                        
                    </li>


                    <li class="menu ">
                        <a href="#admin" data-active="false" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <span>Admin</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled " id="admin" data-parent="#admin">
                            <li class="">
                                <a href="/public/admin/user_setup"> User Setup </a>
                            </li>
                            <li class="">
                                <a href="/public/admin/company_setup"> Company Setup </a>
                            </li>
                        </ul>
                    </li>

                    

                    

                                
            </ul>
            
        </nav>

    </div>
    <!--  END SIDEBAR  -->
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">



    @yield('content')
</div>

    <!--  BEGIN FOOTER  -->

    <!--  END FOOTER  -->

                    </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->
    <br>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/apps/ts.js') }}"></script>
    <script>
        // var e;
        var c1 = $('#style-1').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },

            order: [7,'desc'],
            "ordering": true,
            
            columnDefs:[ {
                targets:0, width:"30px", className:"chk", orderable:false, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }}  
            ],
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
              "sInfo": "Showing page _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Search...",
              "sLengthMenu": "Results :  _MENU_",
              },
            "lengthMenu": [10, 50, 100, 250 ],
            "pageLength": 500  
        });

        multiCheck(c1);

    </script>



</body>
</html>