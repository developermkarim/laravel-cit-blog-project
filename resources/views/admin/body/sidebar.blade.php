 <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                   

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>
                 

     <li>
        <a href="{{ route('admin.dashboard') }}">
             <i class="mdi mdi-view-dashboard-outline"></i>
            <span> Dashboard </span>
        </a>
    </li>



    <li>
        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
            <i class="mdi mdi-cart-outline"></i>
            <span> Category </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarEcommerce">
            <ul class="nav-second-level">
              
                <li>
                    <a href="{{ route('all.category') }}">All Category</a>
                </li>
               
               
                <li>
                    <a href="{{ route('add.category') }}">Add Category</a>
                </li>
               
                
            </ul>
        </div>
    </li>


    {{-- Sub category List Nav Here  --}}

    <li>
        <a href="#sidebarEcommerce1" data-bs-toggle="collapse">
            <i class="mdi mdi-cart-outline"></i>
            <span> SubCategory </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarEcommerce1">
            <ul class="nav-second-level">
                
                <li>
              <a href="{{ route('all.subcategory') }}">All SubCategory</a>
                </li>

                
                <li>
             <a href="{{ route('add.subcategory') }}">Add SubCategory</a>
                </li>
                
                
            </ul>
        </div>
    </li>


    <li>
        <a href="#adminsidebarAuth" data-bs-toggle="collapse">
            <i class="mdi mdi-account-circle-outline"></i>
            <span> Setting Admin User  </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="adminsidebarAuth">
            <ul class="nav-second-level">
                <li>
                    <a href="{{ route('all.admin') }}">All Admin</a>
                </li>

                 <li>
                    <a href="{{ route('add.admin') }}">Add Admin </a>
                </li>
                
            </ul>
        </div>
    </li>
    
    {{-- News Post Nav Here --}}

    <li>
        <a href="#newssidebarAuth" data-bs-toggle="collapse">
            <i class="mdi mdi-account-circle-outline"></i>
            <span> News Posts  </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="newssidebarAuth">
            <ul class="nav-second-level">
                <li>
                    <a href="{{ route('all.news.post') }}">All News</a>
                </li>

                 <li>
                    <a href="{{ route('add.news.post') }}">Add News </a>
                </li>
                
                
            </ul>
        </div>
    </li>


    
    <li>
        <a href="#page-setting" data-bs-toggle="collapse">
        <i class="mdi mdi-account-circle-outline"></i>
            <span> Page Settings  </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="page-setting">
            <ul class="nav-second-level">
                <li>
                    <a href="{{ route('page.about') }}">About</a>
                </li>
                <li>
                    <a href="{{ route('page.contact') }}">Contact</a>
                </li>

                <li>
                    <a href="{{ route('page.faq') }}">FAQ</a>
                </li>

                <li>
                    <a href="{{ route('page.disclaimer') }}">Disclaimer</a>
                </li>
                <li>
                    <a href="{{ route('page.terms') }}">Terms</a>
                </li>
                
                <li>
                    <a href="{{ route('page.privacy') }}">Privacy</a>
                </li>

               {{--   <li>
                    <a href="{{ route('add.news.post') }}">Add News </a>
                </li> --}}
                
                
            </ul>


        </div>
    </li>

    {{-- Banner Here --}}

    <li>
        <a href="#bannersidebarAuth" data-bs-toggle="collapse">
            <i class="mdi mdi-account-circle-outline"></i>
            <span> Banners  </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="bannersidebarAuth">
            <ul class="nav-second-level">
                <li>
                    <a href="{{ route('all.banners') }}">All Banners</a>
                </li>

                 <li>
                    {{-- <a href="{{ route('update.banners') }}">Update Banners </a> --}}
                </li>
            </ul>
        </div>
    </li>


  
            <li>
                <a href="#sidebarEmail" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span> Photo Setting </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ route('all.photo.gallery') }}">Photo Gallery</a>
                        </li>
                        
                    </ul>
                </div>
            </li>



             <li>
                <a href="#video" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span> Video Setting </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="video">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ route('all.video.gallery') }}">Video Gallery</a>
                        </li>
                        
                    </ul>
                </div>
            </li>

 
             <li>
                <a href="#live" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span> Live Tv Setting </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="live">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ route('update.live.tv') }}">Update Live TV</a>
                        </li>
                        
                    </ul>
                </div>
            </li>


             <li>
                <a href="#review" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span> User Reviews </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="review">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ route('review.pending') }}">Pending Reviews</a>
                        </li>
                        <li>
                            <a href="{{ route('review.approved') }}">Approved Reviews</a>
                        </li>
                        
                    </ul>
                </div>
            </li>


             <li>
                <a href="#seo" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span> SEO Optimize </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="seo">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ route('seo.setting') }}">SEO Setting</a>
                        </li>
                        <li>
                            <a href="{{ route('update.seo.setting') }}">SEO Setting Update</a>
                        </li>
                        
                    </ul>
                </div>
            </li>

             <li>
                <a href="#subsribers" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span>Subscribers</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="subsribers">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ route('subsribers.all') }}">All Subscribers</a>
                        </li>
                        <li>
                            <a href="{{ route('mail.add') }}">Mail To Subscribers</a>
                        </li>
                        
                    </ul>
                </div>
            </li>



             <li>
                <a href="#role-permission" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span> Role And Permission </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="role-permission">
                    <ul class="nav-second-level">
                        
                        <li>
                            <a href="{{ route('all.roles') }}"> All Roles </a>
                        </li>

                        <li>
                            <a href="{{ route('all.permission') }}"> All Permissions </a>
                        </li>

                        <li>
                            <a href="{{ route('add.roles.wise.permissions') }}">Add Role Wise Permissions </a>
                        </li>

                        <li>
                            <a href="{{ route('all.roles.wise.permissions') }}">All Role Wise Permissions </a>
                        </li>
                        
                    </ul>

                </div>
            </li>


            
            <li>
                <a href="#advertisement" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span> All Advertisements </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="advertisement">
                    <ul class="nav-second-level">
                        
                       
                        <li>
                            <a href="{{ route('admin_top_ad_show') }}"> Top Advertisement </a>
                        </li>

                        <li>
                            <a href="{{ route('admin_home_ad_show') }}"> Home Advertisement </a>
                        </li>

                        <li>
                            <a href="{{ route('admin_sidebar_ad_show') }}">Sidebar Advertisement</a>
                        </li>

                    </ul>

                </div>
            </li>


     <li>
        <a href="{{ route('all.poll') }}">
             <i class="mdi mdi-view-dashboard-outline"></i>
            <span> Online Poll </span>
        </a>
    </li>

     <li>
        <a href="{{ route('admin_social_item_show') }}">
             <i class="mdi mdi-view-dashboard-outline"></i>
            <span> Online Poll </span>
        </a>
    </li>


     <li class="menu-title mt-2">Menu</li>
  <li>
               <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                   <i class="mdi mdi-cart-outline"></i>
                         <span> Ecommerce </span>
               <span class="menu-arrow"></span>
               </a>
                    <div class="collapse" id="sidebarEcommerce">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="ecommerce-dashboard.html">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="ecommerce-products.html">Products</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarCrm" data-bs-toggle="collapse">
                                    <i class="mdi mdi-account-multiple-outline"></i>
                                    <span> CRM </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="crm-dashboard.html">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="crm-contacts.html">Contacts</a>
                                        </li>
                                        <li>
                                            <a href="crm-opportunities.html">Opportunities</a>
                                        </li>
                                        <li>
                                            <a href="crm-leads.html">Leads</a>
                                        </li>
                                        <li>
                                            <a href="crm-customers.html">Customers</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarEmail" data-bs-toggle="collapse">
                                    <i class="mdi mdi-email-multiple-outline"></i>
                                    <span> Email </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarEmail">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="email-inbox.html">Inbox</a>
                                        </li>
                                        <li>
                                            <a href="email-read.html">Read Email</a>
                                        </li>
                                        <li>
                                            <a href="email-compose.html">Compose Email</a>
                                        </li>
                                        <li>
                                            <a href="email-templates.html">Email Templates</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                              
                            
 
 

                            <li class="menu-title mt-2">Custom</li>

                            <li>
                                <a href="#sidebarAuth" data-bs-toggle="collapse">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span> Auth Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="auth-login.html">Log In</a>
                                        </li>

                                         <li>
                                            <a href="auth-login.html">Log In</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarExpages" data-bs-toggle="collapse">
                                    <i class="mdi mdi-text-box-multiple-outline"></i>
                                    <span> Extra Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarExpages">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="pages-starter.html">Starter</a>
                                        </li>
                                        <li>
                                            <a href="pages-timeline.html">Timeline</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
 

                            <li class="menu-title mt-2">Components</li>

                          

                            <li>
                                <a href="#sidebarIcons" data-bs-toggle="collapse">
                                    <i class="mdi mdi-bullseye"></i>
                                    <span> Icons </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarIcons">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="icons-material-symbols.html">Material Symbols Icons</a>
                                        </li>
                                        <li>
                                            <a href="icons-two-tone.html">Two Tone Icons</a>
                                        </li>
                                         
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarForms" data-bs-toggle="collapse">
                                    <i class="mdi mdi-bookmark-multiple-outline"></i>
                                    <span> Forms </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarForms">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="forms-elements.html">General Elements</a>
                                        </li>
                                        <li>
                                            <a href="forms-advanced.html">Advanced</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                           

                            
 
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>