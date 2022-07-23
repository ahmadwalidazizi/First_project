<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <!-- META DATA --> 
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/images/brand/favicon.ico')}}" />
        <!-- TITLE -->
        <title>AWA | Dashboard</title>
        <!-- BOOTSTRAP CSS -->
        <link href="{{asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
        <!-- STYLE CSS -->
        <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet"/>
        <link href="{{asset('backend/assets/css/dark-style.css')}}" rel="stylesheet"/>
        <link href="{{asset('backend/assets/css/skin-modes.css')}}" rel="stylesheet"/>

		<link href="{{asset('backend/assets/css/toastr.css')}}" rel="stylesheet">
        <!--C3.JS CHARTS PLUGIN -->
        <link href="{{asset('backend/assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>
        <!--- FONT-ICONS CSS -->
        <link href="{{asset('backend/assets/plugins/icons/icons.css')}}" rel="stylesheet"/>


		<link href="{{asset('backend/assets/plugins/multipleselect/multiple-select.css')}}" rel="stylesheet" />
		<link href="{{asset('backend/assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />


		<!-- P-scroll bar css-->
		<link href="{{asset('backend/assets/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet" />
        <!-- SIDEBAR CSS -->
        <link href="{{asset('backend/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
		
        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('backend/assets/colors/color1.css')}}" />
        <!-- SWITCHER SKIN CSS -->
		<link href="{{asset('backend/assets/switcher/css/switcher.css')}}" rel="stylesheet">
		<link href="{{asset('backend/assets/switcher/demo.css')}}" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
		
    </head>
    <body>
        <!-- Start Switcher -->
		<div class="switcher-wrapper ">
			<div class="demo_changer">
				<div class="demo-icon bg_dark" style="background-color:#6728e6"><i class="fa fa-cog fa-spin  text_primary"></i></div>
				<div class="form_holder sidebar-right1">
					<div class="row">
						<div class="predefined_styles">
							<div class="swichermainleft">
								<h4>Navigation Style</h4>
								<div class="pl-3 pr-3">
									<a class="btn btn-primary btn-block" href="{{route('dashboard')}}">
										Horizontal-menu
									</a>
									<a class="btn btn-secondary btn-block" href="{{route('dashboard')}}">
										Vertical-menu
									</a>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Skin Modes</h4>
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Light Mode</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch3" class="onoffswitch2-checkbox" checked>
											<label for="myonoffswitch3" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Transparent Mode</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch4" class="onoffswitch2-checkbox">
											<label for="myonoffswitch4" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Dark Mode</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch16" class="onoffswitch2-checkbox">
											<label for="myonoffswitch16" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Header Styles Mode</h4>
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Light Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch10" class="onoffswitch2-checkbox">
											<label for="myonoffswitch10" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Color Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch11" class="onoffswitch2-checkbox">
											<label for="myonoffswitch11" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Graident Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch12" class="onoffswitch2-checkbox">
											<label for="myonoffswitch12" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Horizontalmenu Styles Mode</h4>
								<div class="switch_section">
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Color Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch6" class="onoffswitch2-checkbox">
											<label for="myonoffswitch6" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Light Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch7" class="onoffswitch2-checkbox">
											<label for="myonoffswitch7" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Dark Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch8" class="onoffswitch2-checkbox">
											<label for="myonoffswitch8" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="switch-toggle d-flex">
										<span class="mr-auto">Gradient-Color Menu</span>
										<div class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch9" class="onoffswitch2-checkbox">
											<label for="myonoffswitch9" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Color-Skins</h4>
								<div class="skin-body">
									<a class="wscolorcode1 blackborder color1" href="#" data-theme="assets/colors/color1.css"></a>
									<a class="wscolorcode1 blackborder color2" href="#" data-theme="assets/colors/color2.css"></a>
									<a class="wscolorcode1 blackborder color3" href="#" data-theme="assets/colors/color3.css"></a>
									<a class="wscolorcode1 blackborder color4" href="#" data-theme="assets/colors/color4.css"></a>
									<a class="wscolorcode1 blackborder color5" href="#" data-theme="assets/colors/color5.css"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Switcher -->
        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{asset('backend/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->
        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                @include('Admin.body.header')

                @yield('admin')
            </div>

             @include('Admin.body.sidebar')

            <!-- FOOTER -->
			@include('Admin.body.footer')
            <!-- FOOTER END -->
        </div>

        <!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- JQUERY JS -->
		<script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>
		<!-- BOOTSTRAP JS -->
		<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<!-- SPARKLINE JS-->
		<script src="{{asset('backend/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
		<!-- CHART-CIRCLE JS -->
		<script src="{{asset('backend/assets/plugins/circle-progress/circle-progress.min.js')}}"></script>
		<!-- C3.JS CHART JS -->
		<script src="{{asset('backend/assets/plugins/charts-c3/d3.v5.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/charts-c3/c3-chart.js')}}"></script>
		<!-- INPUT MASK JS-->
		<script src="{{asset('backend/assets/plugins/input-mask/jquery.mask.min.js')}}"></script>
		<!-- SIDE-MENU JS-->
		<script src="{{asset('backend/assets/plugins/horizontal-menu/horizontal-menu.js')}}"></script>

		
        <!-- Internal Js -->
        <script src="{{asset('backend/assets/js/index1.js')}}"></script>
        <script src="{{asset('backend/assets/plugins/chart/Chart.bundle.js')}}"></script>
        <script src="{{asset('backend/assets/plugins/chart/utils.js')}}"></script>
        <script src="{{asset('backend/assets/plugins/apexcharts/apexcharts.js')}}"></script>
        <script src="{{asset('backend/assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
        <script src="{{asset('backend/assets/plugins/peitychart/peitychart.init.js')}}"></script>
        <script src="{{asset('backend/assets/plugins/echarts/echarts.js')}}"></script>


		<!-- SIDEBAR JS -->
		<script src="{{asset('backend/assets/plugins/sidebar/sidebar.js')}}"></script>

		<!-- P-scroll bar js-->
		<script src="{{asset('backend/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/p-scroll/pscroll-1.js')}}"></script>

		<script src="{{asset('backend/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/datatable.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

		<script src="{{asset('backend/assets/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/multipleselect/multi-select.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/select2/select2.full.min.js')}}"></script>

		<script src="{{asset('backend/assets/js/stiky.js')}}"></script>

		<!--CUSTOM JS -->
		<script src="{{asset('backend/assets/js/custom.js')}}"></script>

        <!-- SWITCHER JS -->
		<script src="{{asset('backend/assets/switcher/js/switcher.js')}}"></script>

		<script src="{{asset('Backend/assets/ja/sweetalert.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
  $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: 'Are you sure?',
                  text: "You want to delete it!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'delete it!',
                  cancelButtonText: 'cancel!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    swalWithBootstrapButtons.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Cancelled',
                      'Your file is safe :)',
                      'error'
                    )
                  }
                })
    });

  });
</script> 

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
    </body>
</html>
