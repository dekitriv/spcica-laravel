<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header header-style-one">

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">

                    <div class="pull-left logo-box">
                        <div class="logo"><a href="{{route('home')}}"><img src="images/logo.png" alt="" title=""></a></div>
                    </div>

                    <div class="nav-outer clearfix">
                        <!-- Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse show collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    @foreach($menu as $item)
                                        <li class="@if(request()->routeIs($item->route)) current @endif"><a href="{{route($item->route)}}">{{$item->name}}</a>
                                        </li>
                                    @endforeach
                                    @if(session('user') && session('user')->role_id == 1)
                                        <li><a href="{{route('admin')}}">Admin panel</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                        </nav>

                        <!-- Outer Box -->
                        <div class="outer-box">
                            <ul class="login-info">
                                @if(!session()->has('user'))
                                    <li><a href="{{route('login')}}"><span class="icon fa fa-user"></span>Login</a></li>
                                @else
                                    <li><a href="{{route('logout')}}"><span class="icon fa fa-user"></span>Logout</a></li>
                                @endif

                                <li class="recipe"><a href="{{route('recipes.create')}}"><span class="fa fa-plus-circle"></span>&nbsp; Add Recipe</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon fa fa-remove"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="{{route('home')}}"><img src="images/logo-2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!--End Main Header -->

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('images/background/10.jpg')}})">
        <div class="auto-container">
            <h1>@yield('page_title')</h1>
        </div>
    </section>
    <!-- End Page Title -->
@if($search)
    @include('pages.recipe.search')
@endif

