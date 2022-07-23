@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Academic</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('student.registration.view')}}">Students Enrollment</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Students Enrollments</li>
                        </ol>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Studnets Enrollment</h3>
								</div>
                                <div class="card-body">
                                    <form action="{{route('student.registration.store')}}" method="post" class="form-group" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label> Registration Date:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" class="form-control fc-datepicker" name="registration_date" id="registration_date">
											    </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label> Base Number:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-key tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="base_number" id="base_number" class="form-control" placeholder="Enter the student base number" require>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Full Name:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="name" id="first_name" class="form-control" placeholder="Enter student name" require>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Father Name:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter student father name" require>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Tazkira Number:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-key tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="tazkira_no" id="tazkira_no" class="form-control" placeholder="Enter student Tazkira Number" require>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Birth Place:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-home tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="Enter student birth place" require>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Discount:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-dollar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="discount" id="address" class="form-control" placeholder="Enter the discount amount" require>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Gender:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="gender">
                                                        <option selected="" disabled="">Choose student gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Year:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="year_id" disable="">
                                                        <option selected="" disabled="">Choose student Year</option>
                                                        @foreach($years as $year)
                                                        <option value="{{$year -> id}}">{{$year -> name}}</option>
                                                        @endforeach
                                                </select>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Class:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-home tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="class_id" disable="">
                                                        <option selected="" disabled="">Choose student Class</option>
                                                        @foreach($classes as $class)
                                                        <option value="{{$class -> id}}"> {{$class -> name}} </option>
                                                        @endforeach
                                                    </select>
											    </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Shift:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-home tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="shift_id" disable="">
                                                        <option selected="" disabled="">Choose student Shift</option>
                                                        @foreach($shifts as $shift)
                                                        <option value="{{$shift -> id}}"> {{$shift -> name}} </option>
                                                        @endforeach
                                                    </select>
											    </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label> Transportation:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-car tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="transport_id" disable="">
                                                        <option selected="" disabled="">Choose student Transportation path</option>
                                                        @foreach($transports as $transport)
                                                        <option value="{{$transport -> id}}"> {{$transport -> title}} </option>
                                                        @endforeach
                                                    </select>
											    </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-" style="width: 50px;
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
                                            right: 25px;
                                            bottom: 80px;
                                            z-index: 100;
                                            transition: background 0.25s;
                                            outline: blue;
                                            border: none;
                                            cursor: pointer;"><span class="fa fa-save"></span></button>
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
    	$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection
