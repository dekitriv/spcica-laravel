<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin_assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin_assets/img/favicon.html')}}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard PRO - Premium Bootstrap 4 Admin Template by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, light bootstrap 4 dashboard, frontend, responsive bootstrap dashboard">
    <meta name="description" content="Forget about boring dashboards, get a bootstrap 4 admin template designed to be simple and beautiful.">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin_assets/css/font-awesome.min.css')}}" />
    <!-- CSS Files -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_assets/css/light-bootstrap-dashboard790f')}}.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('admin_assets/css/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="{{asset('admin_assets/img/sidebar-5.jpg')}}">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{route('home')}}" class="simple-text logo-normal centered">
                    Home
                </a>
            </div>
            <div class="user">
                <div class="info ">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed centered">
                            <span>{{session("user")->first_name}} {{session("user")->last_name}}
                            </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" id="showDashboard" href="#">
                        <i class="nc-icon nc-app"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#users">
                        <i class="nc-icon nc-app"></i>
                        <p>
                            User
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="users">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" id="allUsers" href="#" >
                                    <span class="sidebar-mini">S</span>
                                    <span class="sidebar-normal">All users</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#recipes">
                        <i class="nc-icon nc-app"></i>
                        <p>
                            Recipe
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="recipes">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" id="allRecipes" href="#" >
                                    <span class="sidebar-mini">S</span>
                                    <span class="sidebar-normal">All Recipes</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#categories">
                        <i class="nc-icon nc-app"></i>
                        <p>
                            Category
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="categories">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" id="allCategories" href="#" >
                                    <span class="sidebar-mini">S</span>
                                    <span class="sidebar-normal">All Categories</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="insertCategory" href="#" >
                                    <span class="sidebar-mini">I</span>
                                    <span class="sidebar-normal">Insert Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#messages">
                        <i class="nc-icon nc-app"></i>
                        <p>
                            Messages
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="messages">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" id="allMessages" href="#" >
                                    <span class="sidebar-mini">S</span>
                                    <span class="sidebar-normal">All Messages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg ">
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div id="content" class="container-fluid">


            </div>
        </div>
        <footer class="footer">
            <div class="container">
            </div>
        </footer>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('admin_assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: https://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('admin_assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('admin_assets/js/plugins/bootstrap-notify.js')}}"></script>
<!--  Share Plugin -->
<script src="{{asset('admin_assets/js/plugins/jquery.sharrre.js')}}"></script>
<!--  jVector Map  -->
<script src="{{asset('admin_assets/js/plugins/jquery-jvectormap.js')}}" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('admin_assets/js/plugins/moment.min.js')}}"></script>
<!--  DatetimePicker   -->
<script src="{{asset('admin_assets/js/plugins/bootstrap-datetimepicker.js')}}"></script>
<!--  Sweet Alert  -->
<script src="{{asset('admin_assets/js/plugins/sweetalert2.min.js')}}" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="{{asset('admin_assets/js/plugins/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{asset('admin_assets/js/plugins/nouislider.js')}}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="{{asset('admin_assets/js/plugins/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{asset('admin_assets/js/plugins/jquery.validate.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('admin_assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{asset('admin_assets/js/plugins/bootstrap-table.js')}}"></script>
<!--  DataTable Plugin -->
<script src="{{asset('admin_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--  Full Calendar   -->
<script src="{{asset('admin_assets/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('admin_assets/js/light-bootstrap-dashboard790f.js?v=2.0.1')}}" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('admin_assets/js/demo.js')}}"></script>

<script src="{{asset('admin_assets/js/admin/dashboard.js')}}"></script>
<script src="{{asset('admin_assets/js/admin/user.js')}}"></script>
<script src="{{asset('admin_assets/js/admin/recipe.js')}}"></script>
<script src="{{asset('admin_assets/js/admin/category.js')}}"></script>
<script src="{{asset('admin_assets/js/admin/contact.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

        demo.initVectorMap();

    });
</script>
</html>

