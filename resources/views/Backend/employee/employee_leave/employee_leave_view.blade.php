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
                            <li class="breadcrumb-item active" aria-current="page">Employes Leave List</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="{{route('add.leave')}}" class="btn btn-success btn-icon text-white mr-2">
                            <span><i class="fe fe-plus"></i></span>
                        </a>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee Leave List</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th>ID No</th>
                                                    <th>Name</th>
                                                    <th>Purpose</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th width="12%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($allData as $key => $leave)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$leave ['user']['id_no']}}</td>
                                                    <td>{{$leave ['user']['name']}}</td>
                                                    <td>{{$leave ['purpose']['name']}}</td>
                                                    <td>{{$leave -> start_date}}</td>
                                                    <td>{{$leave -> end_date}}</td>
                                                    <td>
                                                    <a title="Update Employee Leave" href="{{route('edit.employee.leave',$leave->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a title="Delete Employee Leave" href="{{route('delete.employee.leave',$leave->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
