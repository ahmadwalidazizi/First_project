@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Academic/Attendance</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('employee.leave.view')}}">Employes Leave List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Employee Leave</li>
                        </ol>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee Leave Update</h3>
								</div>
                                <div class="card-body">
                                    <form action="{{route('employee.leave.update', $editData->id)}}" method="post" class="form-group" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label> Name:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="employee_id" disable="">
                                                        <option selected="" disabled="">Select Employee Name</option>
                                                        @foreach($employees as $employee)
                                                        <option value="{{$employee -> id}}" {{($editData -> employee_id == $employee -> id)? 'selected': ''}}> {{$employee->name}} </option>
                                                        @endforeach
                                                    </select>
											    </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label> Leave Purpose:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-book tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="leave_purpose_id" id="leave_purpose_id" disable="">
                                                        <option selected="" disabled="">Select Employee Leave Purpose</option>
                                                        @foreach($leave_purpose as $purpose)
                                                        <option value="{{$purpose -> id}}" {{($editData -> leave_purpose_id == $purpose -> id)? 'selected' : ''}}> {{$purpose->name}} </option>
                                                        @endforeach
                                                        <option value="0">New Purpose</option>
                                                    </select>
                                                    <input type="text" name="name" id="add_another" placeholder="Add your own purpose" class="form-control" style="display:none;">
											    </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label> Start Date:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" name="start_date" id="increment_salary" class="form-control" value="{{$editData -> start_date}}">
											    </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label> End Date:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" name="end_date" id="effected_salary" class="form-control" value="{{$editData -> end_date}}">
											    </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="btn btn-info" style="margin-top:26px;"><span class="fa fa-edit"></span></button>
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

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change', '#leave_purpose_id', function(){
            var $leave_purpose_id = $(this).val();
            if($leave_purpose_id == '0'){
                $('#add_another').show();
            }
            else{
                $('#add_another').hide();
            }
        });
    });
</script>

@endsection
