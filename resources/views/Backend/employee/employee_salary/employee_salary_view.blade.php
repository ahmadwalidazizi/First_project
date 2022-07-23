@extends('admin.admin_master')
@section('admin')

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Finance/Employees</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Salary Increment/Decrement</li>
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
									<h3 class="card-title">Employee Salary List</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Id No</th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Gender</th>
                                                    <th>Join Date</th>
                                                    <th>Salary </th>
                                                    <th>Position</th>
                                                    <th>Image</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            @foreach($allData as $key => $value)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td> {{$value ['employee'] ['id_no']}} </td>
                                                    <td> {{$value ['employee'] ['name']}} </td>
                                                    <td> {{$value ['employee'] ['mobile']}} </td>
                                                    <td> {{$value ['employee'] ['gender']}} </td>
                                                    <td> {{date('m-Y', strtotime($value -> joining_date))  }}</td>
                                                    <td> {{$value -> salary }}</td>
                                                    <td> {{$value ['designation']['name']}}</td>
                                                    <td>
                                                    <img src="{{ (!empty($value ['employee'] ['image']))? url('upload/employee_images/'.$value ['employee'] ['image']):url('upload/user.png') }}" 
                                                    style="width: 50px; width: 50px; border-radius:50%;"> 
                                                    </td>
                                                    <td>
                                                    <a title="Employee Salary Increment" href="{{route('employee.salary.incerement', $value -> id)}}" class="btn btn-info"><i class="fa fa-plus-circle"></i></a>
                                                    <a title="Employee Incremented Details" href="{{route('employee.salary.details',$value-> id)}}" target="_blank" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                    <a title="Employee Salary Decrement " href="{{route('employee.salary.decrement', $value -> id)}}" class="btn btn-info"><i class="fa fa-minus"></i></a>
                                                    <a title="Employee Decremented Details" href="{{route('employee.decrement.salary.details',$value-> id)}}" target="_blank" class="btn btn-danger"><i class="fa fa-eye"></i></a>
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
