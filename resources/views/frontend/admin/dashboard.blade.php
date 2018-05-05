<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets/css/reset.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets/css/text.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets/css/grid.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets/css/layout.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets/css/nav.css')}}" media="screen" />
    <link href="{{asset('public/admin_assets/css/table/demo_page.css')}}" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="{{asset('public/admin_assets/js/jquery-1.6.4.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('public/admin_assets/js/jquery-ui/jquery.ui.core.min.js')}}"></script>
    <script src="{{asset('public/admin_assets/js/jquery-ui/jquery.ui.widget.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin_assets/js/jquery-ui/jquery.ui.accordion.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin_assets/js/jquery-ui/jquery.effects.core.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin_assets/js/jquery-ui/jquery.effects.slide.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin_assets/js/jquery-ui/jquery.ui.mouse.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin_assets/js/jquery-ui/jquery.ui.sortable.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/admin_assets/js/table/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="{{asset('public/admin_assets/js/table/table.js')}}"></script>
    <script src="{{asset('public/admin_assets/js/setup.js')}}" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="{{asset('public/admin_assets/')}}/img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Training with live project</h1>
					<p>www.trainingwithliveproject.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="{{asset('public/admin_assets/')}}/img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li><?php echo Session::get('admin_name');?></li>
                            <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="{{URL::to('dashboard')}}"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.html"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.html"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href="postlist.html"><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.html">Title & Slogan</a></li>
                                <li><a href="social.html">Social Media</a></li>
                                <li><a href="copyright.html">Copyright</a></li>
                                
                            </ul>
                        </li>
						
                         <li><a class="menuitem">Update Pages</a>
                            <ul class="submenu">
                                <li><a>About Us</a></li>
                                <li><a>Contact Us</a></li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="{{URL::to('/addcategory')}}">Add Category</a> </li>
                                <li><a href="{{URL::to('/manage_cat')}}">Manage Category</a> </li>
                            </ul>
                        </li>
                        
                         <li><a class="menuitem">Manufacturer Option</a>
                            <ul class="submenu">
                                <li><a href="{{URL::to('/add_manufacturer')}}">Add Manufacture</a> </li>
                                <li><a href="{{URL::to('/manage_manufacturer')}}">Manage Manufacture</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Product Option</a>
                            <ul class="submenu">
                                <li><a href="{{URL::to('/add_product')}}">Add Product</a> </li>
                                <li><a href="{{URL::to('/manage_product')}}">Manage Product</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
	     @yield('admin-content')
           
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
         &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>

