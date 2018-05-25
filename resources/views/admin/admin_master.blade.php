<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="author" content="Dennis Ji">
        <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="{{asset('public/admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/admin_assets/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
        <link id="base-style" href="{{asset('public/admin_assets/css/style.css')}}" rel="stylesheet">
        <link id="base-style-responsive" href="{{asset('public/admin_assets/css/style-responsive.css')}}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <link id="ie-style" href="css/ie.css" rel="stylesheet">
        <![endif]-->

        <!--[if IE 9]>
                <link id="ie9style" href="css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: Favicon -->
        <link rel="shortcut icon" href="{{asset('public/admin_assets/img/favicon.ico')}}')}}">
        <!-- end: Favicon -->




    </head>

    <body>
        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="{{URL::to('/dashboard')}}"><span>Blog-Admin Panel</span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
  
                            <!-- start: User Dropdown -->
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> <?php echo Session::get('admin_name'); ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>Account Settings</span>
                                    </li>
                                    <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                                    <li><a href="{{URL::to('admin-logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid-full">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="{{URL::to('/dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	

                            <li><a href="{{URL::to('/add-category')}}"><i class="icon-envelope"></i><span class="hidden-tablet"> Add Category</span></a></li>

                            <li><a href="{{URL::to('/manage-category')}}"><i class="icon-tasks"></i><span class="hidden-tablet"> Manage Category</span></a></li>

                            <li><a href="{{URL::to('/add-blog')}}"><i class="icon-eye-open"></i><span class="hidden-tablet"> Add Blog</span></a></li>

                            <li><a href="{{URL::to('/manage-blog')}}"><i class="icon-dashboard"></i><span class="hidden-tablet"> Manage Blog</span></a></li>

                            <li><a href="{{URL::to('/manage-bloger-content')}}"><i class="icon-dashboard"></i><span class="hidden-tablet"> Manage Bloger Content</span></a></li>

                            <li><a href="{{URL::to('/manage-comments')}}"><i class="icon-dashboard"></i><span class="hidden-tablet"> Manage Comments</span></a></li>
                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3 </span></a>
                                <ul>
                                    <li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
                                    <li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>
                                    <li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
                                </ul>	
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>

                <!-- start: Content -->
                <div id="content" class="span10">

                    @yield('admin_main_content')

                    


                </div><!--/.fluid-container-->

                <!-- end: Content -->
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>

        <div class="clearfix"></div>

        <footer>

            <div class="container text-center">
                <p>&copy; Sumon -2018</p>
            </div>
        

        </footer>

        <!-- start: JavaScript-->

        <script src="{{asset('public/admin_assets/js/jquery-1.9.1.min.js')}}"></script>
        <script src="{{asset('public/admin_assets/js/jquery-migrate-1.0.0.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.ui.touch-punch.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/modernizr.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.cookie.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/fullcalendar.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.dataTables.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/excanvas.js')}}"></script>
        <script src="{{asset('public/admin_assets/js/jquery.flot.js')}}"></script>
        <script src="{{asset('public/admin_assets/js/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('public/admin_assets/js/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('public/admin_assets/js/jquery.flot.resize.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.chosen.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.uniform.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.cleditor.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.noty.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.elfinder.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.raty.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.iphone.toggle.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.uploadify-3.1.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.gritter.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.imagesloaded.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.masonry.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.knob.modified.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/jquery.sparkline.min.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/counter.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/retina.js')}}"></script>

        <script src="{{asset('public/admin_assets/js/custom.js')}}"></script>
        <!-- end: JavaScript-->

    </body>
</html>
