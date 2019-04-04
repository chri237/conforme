<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> {{ config('app.name', 'Conforme AQ') }} </title>
        <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="{{asset('assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="{{asset('assets/css/demo/jasmine.css')}}" rel="stylesheet">
		<!--Notification [ DEMONSTRATION ]-->
        <link href="{{asset('assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="{{asset('assets/plugins/pace/pace.min.css')}}" rel="stylesheet">
        <script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>

		<style>
			#loader{
				z-index: 9999;
				display:none;
				position: fixed;
				top:150px;
				left:50%;
				right: 50%;
				width: 150px;
				height: 50px;
				line-height: 50px;
				padding: 0 10px;
				background: #FFF;
				border: thin solid #1197AD;
				text-align: center;
			}
		</style>
    </head>
<body>

	<div id="loader">
		<a href="javascript:void(0)"><i class="fa fa-spinner fa-spin fa-fw"></i> Loading...</a>
	</div>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
						    <li><a href="{{ route('register') }}">Register</a></li>


                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="{{asset('assets/plugins/fast-click/fastclick.min.js')}}"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="{{asset('assets/plugins/nanoscrollerjs/jquery.nanoscroller.min.js')}}"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="{{asset('assets/plugins/metismenu/metismenu.min.js')}}"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="{{asset('assets/plugins/switchery/switchery.min.js')}}"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="{{asset('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="{{asset('assets/plugins/screenfull/screenfull.js')}}"></script>
		<!--Noti [ JGLOW ]-->
        <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
</body>
</html>
