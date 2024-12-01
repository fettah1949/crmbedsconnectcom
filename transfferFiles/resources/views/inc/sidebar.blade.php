@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
            
        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">
                
                @if ($page_name != 'alt_menu' && $page_name != 'blank_page' && $page_name != 'boxed' && $page_name != 'breadcrumb' )

                    <li class="menu {{ ($category_name === 'dashboard') ? 'active' : '' }}">
                        <a href="#dashboard" data-active="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ ($category_name === 'dashboard') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'dashboard') ? 'show' : '' }}" id="dashboard" data-parent="#accordionExample">
                            <li class="{{ ($page_name === 'sales') ? 'active' : '' }}">
                                <a href="/public/sales"> Sales </a>
                            </li>
                            <li class="{{ ($page_name === 'analytics') ? 'active' : '' }}">
                                <a href="/public/analytics"> Analytics </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu {{ ($category_name === 'production') ? 'active' : '' }}">
                        <a href="#production" data-active="{{ ($category_name === 'production') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ ($category_name === 'production') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Production</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'production') ? 'show' : '' }}" id="production" >
                            
                                
                            <li class="{{ ($page_name === 'reservation') ? 'active' : '' }}">
                                <a href="/public/production/reservation"> Reservation </a>
                            </li>
                            
                            <li class="{{ ($page_name === 'hotel_list') ? 'active' : '' }}">
                                <a href="/public/production/hotellist">Hotel List </a>
                            </li>

                            <li class="{{ ($page_name === 'hotel_room_list') ? 'active' : '' }}">
                                <a href="/public/production/hotelrooms">Hotel Room List</a>
                            </li>
                            

                            <li class="{{ ($page_name === 'rooms_list') ? 'active' : '' }}">
                                <a href="/public/production/rooms">Rooms List </a>
                            </li>


                            
                        </ul>
                    </li>

                    <li class="menu {{ ($category_name === 'invoicing') ? 'active' : '' }}">
                        <a href="#invoicing" data-active="{{ ($category_name === 'invoicing' ) ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ ($category_name === 'invoicing') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Invoicing</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'invoicing') ? 'show' : '' }}" id="invoicing" >
                            
                                
                            <li class="{{ ($page_name === 'invoicing_sale') ? 'active' : '' }}">
                                <a href="/public/invoicing/sale"> Sale </a>
                            </li>

                            <li class="{{ ($page_name === 'invoicing_purchase') ? 'active' : '' }}">
                                <a href="/public/invoicing/purchase"> Purchase </a>
                            </li>
                            
                            
                        </ul>
                    </li>


                    {{-- Finance --}}
                    <li class="menu {{ ($category_name === 'finance') ? 'active' : '' }}">
                        <a href="#finance" data-active="{{ ($category_name === 'finance' ) ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ ($category_name === 'finance') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Finance</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'finance') ? 'show' : '' }}" id="finance" >
                            
                                
                            <li class="{{ ($page_name === 'banks') ? 'active' : '' }}">
                                <a href="/public/banks"> Bank </a>
                            </li>

                            <li class="{{ ($page_name === 'transaction') ? 'active' : '' }}">
                                <a href="/public/transactions"> Transaction </a>
                            </li>
                            
                            
                            <li class="{{ ($page_name === 'expense') ? 'active' : '' }}">
                                <a href="/public/expense"> Expense </a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    {{-- End Finance --}}



                    
                    <li class="menu {{ ($category_name === 'contact') ? 'active' : '' }}">
                        <a href="#contact" data-active="{{ ($category_name === 'contact') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ ($category_name === 'contact') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Contact</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'contact') ? 'show' : '' }}" id="contact" data-parent="#contact">
                           
                                      
                            <li class="{{ ($page_name === 'agencys') ? 'active' : '' }}">
                                <a href="/public/contact/agencylist">Agency List </a>
                            </li>
                           
                        </ul>
                    </li>

                    <li class="menu {{ ($category_name === 'mailbox') ? 'active' : '' }}">
                        <a href="/public/mailbox" data-active="{{ ($category_name === 'mailbox') ? 'true' : 'false' }}"  aria-expanded="{{ ($category_name === 'mailbox') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                <span>Mailbox</span>
                            </div>
                        </a>
                        
                    </li>


                    <li class="menu {{ ($category_name === 'admin') ? 'active' : '' }}">
                        <a href="#admin" data-active="{{ ($category_name === 'admin') ? 'true' : 'false' }}" data-toggle="collapse" aria-expanded="{{ ($category_name === 'admin') ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <span>Admin</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ($category_name === 'admin') ? 'show' : '' }}" id="admin" data-parent="#admin">
                      
                       
                            <li class="{{ ($page_name === 'user_setup') ? 'active' : '' }}">
                                <a href="/public/admin/user_setup"> User Setup </a>
                            </li>
                            <li class="{{ ($page_name === 'company_setup') ? 'active' : '' }}">
                                <a href="/public/admin/company_setup"> Company Setup </a>
                            </li>
                        </ul>
                    </li>

                    

                    

                @else

                                   
                
                @endif
                
            </ul>
            
        </nav>

    </div>
    <!--  END SIDEBAR  -->

@endif