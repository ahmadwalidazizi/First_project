@extends('admin.admin_master')
@section('admin')

                <div class="container app-content">
                    <div class="">
                        <div class="page-header">
                            <!-- PAGE-HEADER -->
                            <div>
                                <h1 class="page-title">Dashboard</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Main Dashboard</li>
                                </ol>
                            </div>
                        <!-- PAGE-HEADER END -->
                        </div>
                        <!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card bg-primary img-card box-primary-shadow">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
												<h2 class="mb-0 number-font">10</h2>
												<p class="text-white mb-0">Total Classes </p>
											</div>
											<div class="ml-auto"> <i class="fa fa-home text-white fs-30 mr-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card bg-secondary img-card box-secondary-shadow">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
												<h2 class="mb-0 number-font">20</h2>
												<p class="text-white mb-0">Total Students</p>
											</div>
											<div class="ml-auto"> <i class="fa fa-users text-white fs-30 mr-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  bg-success img-card box-success-shadow">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
												<h2 class="mb-0 number-font">50</h2>
												<p class="text-white mb-0">Total Teachers</p>
											</div>
											<div class="ml-auto"> <i class="fa fa-users text-white fs-30 mr-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card bg-info img-card box-info-shadow">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
												<h2 class="mb-0 number-font">43,336</h2>
												<p class="text-white mb-0">Total Income</p>
											</div>
											<div class="ml-auto"> <i class="fa fa-dollar text-white fs-30 mr-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
						</div>
						<!-- ROW-1 CLOSED -->

						<!-- ROW-2 OPEN -->

						<!-- ROW-2 CLOSED -->
					</div>
				</div>
				<!-- CONTAINER END -->

                @endsection