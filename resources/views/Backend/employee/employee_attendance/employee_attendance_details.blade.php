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
                            <li class="breadcrumb-item"><a href="{{route('employee.attendance.view')}}">Employee Attendance Date List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Attendance Details</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee Attendance </h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th>Id No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Attendance Status</th>                                                
                                                    <th>Image</th>                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach($details as $key => $attendance)
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$attendance ['user']['id_no']}}</td>
                                                    <td>{{$attendance ['user']['name']}}</td>
                                                    <td>{{$attendance ['user']['email']}}</td>
                                                    <td>{{date('d-m-Y', strtotime($attendance -> date))}}</td>
                                                    <td>{{$attendance -> attend_status}}</td>
                                                    <td>
                                                    <img src="{{ (!empty($attendance['user']['image']))? url('upload/employee_images/'.$attendance['user']['image']):url('upload/user.png') }}" 
                                                    style="width: 60px; width: 60px; border-radius:50%;"> 
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
