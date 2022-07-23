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
                            <li class="breadcrumb-item active" aria-current="page">Add Employee Attendance </li>
                        </ol>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee Attendance</h3>
								</div>
                                <div class="card-body">
                                    <form action="{{route('store.employee.attendance')}}" method="post" class="form-group" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label> Date:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" name="date" id="date" class="form-control" require>
											    </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table id="example" class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="text-center" style="vertical-align: middle; width:5%;">Sl</th>
                                                                <th rowspan="2" class="text-center" style="vertical-align: middle; width:5%;">Image</th>
                                                                <th rowspan="2" class="text-center" style="vertical-align: middle; width:15%;">Employee ID</th>
                                                                
                                                                <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name</th>
                                                                <th colspan="3" class="text-center" style="vertical-align: middle; width: 25%">Attendance Status</th>				
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center btn btn-info present_all" style="display: table-cell; background-color:rgb(172 246 122);">Present</th>
                                                                <th class="text-center btn btn-success leave_all" style="display: table-cell;">Leave</th>
                                                                <th class="text-center btn btn-danger absent_all" style="display: table-cell;">Absent</th>
                                                            </tr>   				
                                                        </thead>
                                                        <tbody>
                                                            @foreach($employees as $key => $employee)		
                                                            <tr id="div{{$employee->id}}" class="text-center">
                                                                <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                                            
                                                                <td>{{ $key+1  }}</td>
                                                                <td>
                                                                <img src="{{ (!empty($employee -> image))? url('upload/employee_images/'.$employee -> image):url('upload/user.png') }}" 
                                                                style="width: 50px; width: 50px; border-radius:50%;"> 
                                                                </td>
                                                                <td style="text-align:left;">{{ $employee->id_no }}</td>
                                                            
                                                                <td style="text-align:left;">{{ $employee->name}}</td>
                                                                <td colspan="3">
                                                                    <div class="switch-toggle switch-3 switch-candy">
                                                                        <label for="present{{$key}}">Present</label>
                                                                        <input name="attend_status{{$key}}" type="radio" value="Present" id="present{{$key}}" checked="checked">
                                                                        
                                                                        <label for="leave{{$key}}">Leave</label>
                                                                        <input name="attend_status{{$key}}" type="radio" value="Leave"  id="leave{{$key}}">
                                                                        
                                                                        <label for="absent{{$key}}">Absent</label>  
                                                                        <input name="attend_status{{$key}}" type="radio" value="Absent" id="absent{{$key}}">
                                                                                                
                                                                    </div>			
                                                                </td>
                                                            </tr>			
                                                            @endforeach
                                                        </tbody>   			
                                                    </table>
                                                </div>
                                            </div>
                                            <button class="btn btn-info" style="width: 50px;
                                                height: 50px;
                                                background: #009879;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                text-decoration: none;
                                                border-radius: 50%;
                                                color: #ffff;
                                                font-size: 20px;
                                                text-transform: lowercase;
                                                box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.25);
                                                position: fixed;
                                                right: 60px;
                                                bottom: 80px;
                                                z-index: 100;
                                                transition: background 0.25s;
                                                outline: blue;
                                                border: none;
                                                cursor: pointer;"><i class="fa fa-save"></i></button> 
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

<script>
    var localToday = new Date().toLocalDateString('fa-IR');
    consol.log(localToday);
</script>

@endsection
