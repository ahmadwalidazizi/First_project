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
                            <li class="breadcrumb-item"><a href="{{route('employee.salary.view')}}">Employee Salary Increment/Decrement</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Salary Decrement Details</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee Decremented Salary Details:</h3>
                                    <span class="badge badge-success">  {{$details ['employee']['name']}} </span> 
                                    <span class="badge badge-info">  {{$details ['employee']['id_no']}} </span> 
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Previous Salary</th>
                                                    <th>Decremented Salary</th>
                                                    <th>Present Salary</th>
                                                    <th>Efftected Salary</th>
                                                    <th>Reason</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                @foreach($salarylog as $key => $salary)
                                                <tr>
                                                    <td> {{$salary -> previous_salary }} </td>
                                                    <td> {{$salary -> decrement_salary}} </td>
                                                    <td> {{$salary -> present_salary}} </td>
                                                    <td> {{$salary -> effected_salary}} </td>
                                                    <td> {{$salary -> decrement_reason}} </td>
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
