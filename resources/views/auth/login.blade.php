<!DOCTYPE html>
<html lang="en">

<head>
    <title>Azizi_Dashboad/Sign in </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible"/>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/images/brand/favicon.ico')}}"/>
      <!-- BOOTSTRAP CSS -->
	<link href="{{asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/css/skin-modes.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/assets/css/dark-style.css')}}" rel="stylesheet"/>

    <!--C3 CHARTS CSS -->
    <link href="{{asset('backend/assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>

    <!-- P-scroll bar css-->
    <link href="{{asset('backend/assets/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('backend/assets/plugins/icons/icons.css')}}" rel="stylesheet"/>

    <link href="{{asset('backend/assets/plugins/single-page/css/main.css')}}" rel="stylesheet">

    <!-- SIDE-MENU CSS -->
    <link href="{{asset('backend/assets/css/sidemenu.css')}}" rel="stylesheet"/>

    <!-- SIDEBAR CSS -->
    <link href="{{asset('backend/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet"/>

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('backend/assets/colors/color1.css')}}" />

    <!-- SWITCHER SKIN CSS -->
    <link href="{{asset('backend/assets/switcher/css/switcher.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/switcher/demo.css')}}" rel="stylesheet">
</head>
  <body class="login-img">

    	<!-- BACKGROUND-IMAGE -->
		<div class="login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="{{asset('backend/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->
			<!-- PAGE -->
			<div class="page">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<img src="{{asset('backend/assets/images/brand/azizi.png')}}" class="header-brand-img" alt="">
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                            @csrf
								<span class="login100-form-title">
									Login
								</span>
								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: walid@gmail.com">
                                    <input type="email" name="email" id="email" class="form-control input100" required="" placeholder="Email">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
                                    <input type="password" name="password" id="password" class="form-control input100" required="" placeholder="Password">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
								</div>
								<div class="text-right pt-1">
									<p class="mb-0"><a href="{{ route('password.request') }}" class="text-primary ml-1">Forgot Password?</a></p>
								</div>
								<div class="container-login100-form-btn">
                                    <x-jet-button class="ml-12 btn btn-primary col-md-12">
                                        {{ __('Login') }}
                                    </x-jet-button>
								</div>
								<div class="text-center pt-3">
									<p class="text-dark mb-0">Don't have account?<a href="{{ route('register') }}" class="text-primary ml-1">Sign-Up</a></p>
								</div>
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- End PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

        <!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
		<script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>	
        
		<!--CUSTOM JS -->
		<script src="{{asset('backend/assets/js/custom.js')}}"></script>

        <!-- Color Change JS -->
        <script src="{{asset('backend/assets/js/color-change.js')}}"></script>

        <!-- SWITCHER JS -->
		<script src="{{asset('backend/assets/switcher/js/switcher.js')}}"></script>

    </body>

</html>
