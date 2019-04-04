<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Conforme AQ Plateform</title>
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
        <link href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css')}}" rel="stylesheet">

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
	
<div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
            <!--NAVBAR-->
            <!--===================================================-->
            @include('admin.inc.header')
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-home"></i> 
							@if(Auth::check())
							{{ Auth::user()->firstname.' '.Auth::user()->lastname.' '.Auth::user()->role_code }} 
							@endif
						</h3>
                        {{-- <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="{{ route('showroles') }}"> home </a> </li>
                                <li class="active"> Roles  </li>
                            </ol>
                        </div> --}}
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
					@yield('content')
					</div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <!--MAIN NAVIGATION-->
                <!--===================================================-->
                	@include('admin.inc.navbarleft')
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            @include('admin.inc.footer')
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
	
	
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
        
        <script src="{{ asset('js/admin/users/get-profile.js') }}"></script>
     <script src="{{ asset('js/admin/users/profile.js') }}"></script>
		@yield('addlibjs')
</body>                                                                                                                                                                              
</html>