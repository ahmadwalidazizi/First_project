@extends('admin.admin_master')
@section('admin')

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Academic</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Enrollments</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="{{route('add.employee')}}" class="btn btn-success btn-icon text-white mr-2">
                            <span><i class="fe fe-plus"></i></span> 
                        </a>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee List</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Id/No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Gender</th>
                                                    <th>Salary </th>
                                                    <th>Designation </th>
                                                    <th>Code</th>
                                                    <th>Image</th>
                                                    <th width="25%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            @foreach($allData as $key => $employee)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td> {{$employee ['employee'] ['id_no']}} </td>
                                                    <td> {{$employee ['employee'] ['name']}} </td>
                                                    <td> {{$employee ['employee'] ['email']}} </td>
                                                    <td> {{$employee ['employee'] ['mobile']}} </td>
                                                    <td> {{$employee ['employee'] ['gender']}} </td>
                                                    <td> {{$employee -> salary }}</td>
                                                    <td> {{$employee ['designation']['name']}}</td>
                                                    <td> {{$employee ['employee'] ['code']}} </td>
                                                    <td>
                                                    <img src="{{ (!empty($employee ['employee'] ['image']))? url('upload/employee_images/'.$employee ['employee'] ['image']):url('upload/user.png') }}" 
                                                    style="width: 60px; width: 60px; border-radius:50%;"> 
                                                    </td> 

                                                    <td>
                                                    <a title=" Edit Employee " href="{{route('employee.registration.edit', $employee -> employee_id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a title="Print Employee Information" href="{{route('employee.registration.details',$employee-> employee_id)}}" target="_blank" class="btn btn-info"><i class="fa fa-print"></i></a>
                                                    <a title="Delete Employee" href="#" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
