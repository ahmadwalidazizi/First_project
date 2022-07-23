@extends('admin.admin_master')
@section('admin')

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Academic/Attendance</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Attandance Date List</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="{{route('add.attendance')}}" class="btn btn-success btn-icon text-white mr-2">
                            <span><i class="fe fe-plus"></i></span>
                        </a>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee Attendance List</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th>Date</th>
                                                    <th width="20%">Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($allData as $key => $attendance)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{date('d-m-Y', strtotime($attendance -> date))}}</td>
                                                    <td>
                                                    <a title="Update Employee Attendance" href="{{route('employee.attendance.edit', $attendance -> date)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a title="Employee Attendance Details" href="{{route('employee.attendance.details', $attendance -> date)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <a title="Delete Employee Attendance" href="#" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
@endsection
