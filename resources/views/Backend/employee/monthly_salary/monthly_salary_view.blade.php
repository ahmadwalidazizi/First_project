@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

		<div class="container app-content">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Finance/Employees</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employees Monthly Salary</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
				</div>
		
			 <!-- ROW-1 OPEN -->
				 <div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Emplpyee Monthly Salary</h3>
							</div>
                            <div class="card-body">									
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<div class="card-body">
										<!--Start row-->
											<div class="row">
												<div class="col-lg-10">
													<label> Date:</label>
													<div class="input-group">
														<div class="input-group-prepend">
															<div class="input-group-text"><i class="fa fa-calendar"></i></div>
														</div><!-- input-group-prepend -->
														<input type="date" name="date" id="date" class="form-control" require>
													</div>
												</div>
												<div class="col-lg-2" style="margin-top:24px;">
                                                    <button class="btn btn-info" id="search"><span class="fa fa-search"></span></button>
                                                </div>
											</div>
											<!--End row-->	
											<div class="card-body">
												<div class="table-responsive">
													<div class="col-md-12">
                                                        <div id="DocumentResults">
                                                            <script id="document-template" type="text/x-handlebars-template">
                                                                <table class="table table-bordered table-striped table-hover table-responsive">
                                                                    <thead>
                                                                        <tr>
                                                                            @{{{thsource}}}
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @{{#each this}}
                                                                            <tr>
                                                                                @{{{tdsource}}}	
                                                                            </tr>
                                                                        @{{/each}}
                                                                    </tbody>
                                                                </table>
                                                        </script>
                                                        </div>
													</div>
												</div>
											</div>											
										</div>
									</div>
									<!-- COL END -->
								</div>
                            </div>
							<!-- TABLE WRAPPER -->
						</div>
						<!-- SECTION WRAPPER -->
					</div>
				</div>
				<!-- ROW-1 CLOSED -->
			</div>
		</div>


<script type="text/javascript">
  $(document).on('click','#search',function(){
	var date = $('#date').val();
     $.ajax({
      url: "{{ route('employee.monthly.salary.get')}}",
      type: "get",
      data: {'date':date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>
@endsection