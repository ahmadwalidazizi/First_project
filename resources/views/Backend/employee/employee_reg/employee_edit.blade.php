@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }
    .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
    }
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }
    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }
    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>
        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Academic</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('employee.registration.view')}}">Employee Enrollments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Employee Information </li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- ROW OPEN -->
                    <form action="{{route('employee.registration.update', $editData -> employee_id)}}" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$editData -> id}}">
						<div class="row row-cards">
							<div class="col-lg-4 col-xl-3">
								<div class="card">
									<div class="">
										<div class="card-body text-center">
											<div class="userprofile mt-0">
												<div class="userpi"> 
                                                <img id="showImage" src="{{(!empty($editData ['employee']['image'])) ? url('upload/employee_images/'.$editData['employee']['image']) : url('upload/user.png')}}" 
                                                style="width:240px; height:240px;>
                                                </div>
                                                <div style="background-color:none;">
                                                    <label class="form-control-label">Select Employee Image</label>
                                                    <input type="file" name="image" id="image" class="form-control">
                                                </div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- COL-END -->
							<div class="col-lg-8 col-xl-9">
								<div class="card">
									<div class="card-header border-bottom-0 p-4">
                                        <div class="panel panel-primary">
											<div class="tab-menu-heading">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li><a href="#pesonal" class="active" data-toggle="tab">Personal Info</a></li>
														<li><a href="#experience" data-toggle="tab">Work Experience</a></li>
														<li><a href="#status" data-toggle="tab">Status</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active" id="pesonal">
                                                        <div class="row">
                                                        <div class="col-lg-12">
                                                            <label> Joing Date:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="date" name="joining_date" id="joining_date" class="form-control" value="{{$editData -> joining_date}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label> Name:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="name" id="name" class="form-control" value="{{$editData ['employee']['name']}}">
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
                                                                <input type="text" name="father_name" id="father_name" class="form-control" value="{{$editData -> father_name}}">
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
                                                                <input type="text" name="tazkira_no" id="tazkira_no" class="form-control" value="{{$editData -> tazkira_no}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label> DOB:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="date" name="dob" id="dob" class="form-control" value="{{$editData -> dob}}">
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
                                                                <input type="text" name="birth_place" id="birth_place" class="form-control" value="{{$editData -> birth_place}}">
                                                            </div>
                                                        </div>  
                                                        <div class="col-lg-4">
                                                            <label> Mobile:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="number" name="mobile" id="mobile" class="form-control" value="{{$editData ['employee']['mobile']}}">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-4">
                                                            <label> Email:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-envelope tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="email" name="email" id="email" class="form-control" value="{{$editData ['employee']['email']}}">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-4">
                                                            <label> Salary:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-dollar tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="salary" id="salary" class="form-control" value="{{$editData -> salary}}">
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
                                                                    <option>Choose Employee gender</option>
                                                                    <option value="Male" {{($editData ['employee']['gender'] == 'Male')? "selected" : ""}}>Male</option>
                                                                    <option value="Female" {{($editData ['employee']['gender'] == 'Female')? "selected" : ""}}>Female</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-4">
                                                            <label> Designation:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <select class="form-control select2"  name="disgnation_id" disable="">
                                                                    <option>Choose Designation</option>
                                                                    @foreach($disgnations as $designation)
                                                                    <option value="{{$designation -> id}}" {{($editData -> disgnation_id == $designation -> id)? "selected" : ""}}> {{$designation -> name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="col-lg-8">
                                                            <label> Address:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-car tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter employee Address" value="{{$editData ['employee']['address']}}">
                                                            </div>
                                                        </div>          
                                                        </div>
													</div>
                                                    <div class="tab-pane" id="experience">
                                                        <div class="row">
                                                        <div class="col-lg-4">
                                                            <label> Education Level:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-book tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="education_level" id="education_level" class="form-control" value="{{$editData -> education_level}}">
                                                            </div>
                                                        </div>  
                                                        <div class="col-lg-4">
                                                            <label> Faculty:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-book tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="faculty" id="faculty" class="form-control" value="{{$editData -> faculty}}">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-4">
                                                            <label> Education Field:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-pencil tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="field" id="field" class="form-control" value="{{$editData -> field}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label> Years of Experience:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-home tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="number" name="exp_year" id="exp_year" class="form-control" value="{{$editData -> exp_year}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label> Last Employeer:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-envelope tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="organization" id="organization" class="form-control" value="{{$editData -> organization}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label> Last Position Title:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-envelope tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="position_title" id="position_title" class="form-control" value="{{$editData -> position_title}}">
                                                            </div>
                                                        </div>
                                                        </div>
													</div>
													<div class="tab-pane " id="status">
                                                        <div class="row">
                                                        <div class="col-lg-5">
                                                            <label> Name:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="name" id="name" class="form-control" value="{{$editData ['employee']['name']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <label> Email:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-envelope tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="email" name="email" id="email" class="form-control" value="{{$editData ['employee']['email']}}">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-2">
                                                            <label> Active:</label>
                                                            <div class="input-group">
                                                            <label class="switch">
                                                            <input type="checkbox" checked class="toggle_class"><span class="slider round"></span>
                                                            </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6" style="visibility:hidden">
                                                            <label> Address:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-car tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input class="form-control" placeholder="Enter the address">
                                                            </div>
                                                        </div> 
                                                        </div>
													</div>
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
                                            cursor: pointer;"><span class="fa fa-edit"></span></button>
									</div>
								</div>
							</div><!-- COL-END -->
						</div>
						<!-- ROW CLOSED -->
                    </form>
                    

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

<script>
    $function(){
        $('.toggle_class').change(function(){
            var status = $(this).prop('checked') == true ? 1 : 0;
            var member_id = $(this).data('student_id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{route('student.change.status')}}",
                    data: {'status': status, 'member_id': member_id},
                    success: function(data){
                        consol.log(data.success)
                    }
                });
        });
    }
</script>

@endsection
