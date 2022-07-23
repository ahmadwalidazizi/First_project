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
                            <li class="breadcrumb-item"><a href="{{route('employee.registration.view')}}">Employee Enrollments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Enrollments</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- ROW OPEN -->
                    <form action="{{route('employee.registration.store')}}" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
						<div class="row row-cards">
							<div class="col-lg-4 col-xl-3">
								<div class="card">
									<div class="">
										<div class="card-body text-center">
											<div class="userprofile mt-0">
												<div class="userpi"> 
                                                <img id="showImage" src="{{(!empty($user->image)) ? url('upload/employee_images/'.$user->image) : url('upload/user.png')}}" 
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
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label> Joing Date:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="date" name="joining_date" id="joining_date" class="form-control" require>
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
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter employee name" require>
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
                                                    <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter employee father name" require>
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
                                                    <input type="text" name="tazkira_no" id="tazkira_no" class="form-control" placeholder="Enter employee Tazkira Number" require>
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
                                                    <input type="date" name="dob" id="dob" class="form-control" require>
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
                                                    <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="Enter employee birth place" require>
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
                                                    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter employee Mobile number" require>
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
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter employee email address" require>
                                                </div>
                                            </div> 
                                            <div class="col-lg-4">
                                                <label> Address:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-car tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter employee Address" require>
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
                                                    <input type="text" name="salary" id="salary" class="form-control" placeholder="Enter the salary amount" require>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> Education Level:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-book tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="education_level" id="education_level" class="form-control" placeholder="Enter the employee education level">
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
                                                        <option>Choose employee gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-lg-4">
                                                <label> Position:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="disgnation_id" disable="">
                                                        <option>Choose Designation</option>
                                                        @foreach($disgnations as $designation)
                                                        <option value="{{$designation -> id}}"> {{$designation -> name}} </option>
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
                                            right: 80px;
                                            bottom: 60px;
                                            z-index: 100;
                                            transition: background 0.25s;
                                            outline: blue;
                                            border: none;
                                            cursor: pointer;"><span class="fa fa-save"></span></button>
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

@endsection
