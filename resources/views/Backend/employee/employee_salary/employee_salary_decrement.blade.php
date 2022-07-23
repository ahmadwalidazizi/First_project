@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Finance/Employees</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('employee.salary.view')}}">Employee Salary Increment/Decrement</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Salary Decrement</li>
                        </ol>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee Salary Decrement</h3>
								</div>
                                <div class="card-body">
                                    <form action="{{route('employee.decrement.update', $editData -> id)}}" method="post" class="form-group" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label> Reason:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-book tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="decrement_reason" id="decrement_reason" class="form-control" placeholder="Enter the decrement reason" require>
											    </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label> Decrement Amount:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-dollar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="decrement_salary" id="decrement_salary" class="form-control" placeholder="Enter the decrement amount" require>
											    </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label> Effected Date:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" name="effected_salary" id="effected_salary" class="form-control" require>
											    </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="btn btn-info" style="margin-top:26px;"><span class="fa fa-plus"></span></button>
                                            </div>
                                        </div>
                                       
                                    </form>
                                </div>
							<!-- TABLE WRAPPER -->
							</div>
							<!-- SECTION WRAPPER -->
						</div>
					</div>
				<!-- ROW-1 CLOSED -->
            </div>
        </div>

@endsection
