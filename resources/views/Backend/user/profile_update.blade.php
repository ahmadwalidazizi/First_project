@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Profile</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile View</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- ROW OPEN -->
                <form action="{{route('store.profile')}}" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
						<div class="row row-cards">
							<div class="col-lg-4 col-xl-3">
								<div class="card"> 
									<div class="">
										<div class="card-body text-center">
											<div class="userprofile mt-0">
												<div class="userpi"> 
                                                <img id="showImage" src="{{(!empty($editData->image)) ? url('upload/user_images/'.$editData->image) : url('upload/user.png')}}"  
                                                style="width:230px; height:230px;>
                                                </div>
                                                <div style="background-color:none;">
                                                    <input type="file" name="image" id="image" class="form-control" style="border:none;">
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
														<li ><a href="#pesonal" class="active" data-toggle="tab">Personal Information</a></li>
														<li><a href="#profileupdate" data-toggle="tab">Profile Update</a></li>
														<li><a href="#password" data-toggle="tab">Change Password</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active " id="pesonal">
                                                        <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>UserType</th>
                                                                            <th>Name</th>
                                                                            <th>Gender</th>
                                                                            <th>Email</th>
                                                                            <th>Code</th>
                                                                            <th>Mobile</th>
                                                                            <th>Address</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                        <td>{{$editData->usertype}}</td>
                                                                            <td>{{$editData->name}}</td>
                                                                            <td>{{$editData->gender}}</td>
                                                                            <td>{{$editData->email}}</td>
                                                                            <td>{{$editData->code}}</td>
                                                                            <td>{{$editData->mobile}}</td>
                                                                            <td>{{$editData->address}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>        
                                                        <div>
                                                            <div class="input-group" style="visibility:hidden">
                                                                <input type="text" name="address" id="address" class="form-control">
                                                            </div>
                                                        </div> 
                                                        </div>
													</div>
													<div class="tab-pane " id="profileupdate">
                                                        <div class="row">
                                                        <div class="col-lg-6">
                                                            <label> Name:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input class="form-control" name="name" id="name" type="text" value="{{$editData->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label> Email:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-envelope tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input class="form-control" type="email" name="email" id="username" value="{{$editData->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label> Mobile:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input class="form-control" type="mobile" name="mobile" id="mobile" value="{{$editData->mobile}}">
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-6">
                                                            <label> Gender:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <select class="form-control custom-select" name="gender" id="gender">
                                                                    <option value="" disabled="">Gender</option>
                                                                    <option value="Male"{{$editData->gender == "Male" ? "selected" : ""}}>Male</option>
                                                                    <option value="Female"{{$editData->gender == "Female" ? "selected" : ""}}>Female</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <div class="col-lg-12">
                                                            <label> Address:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fa fa-car tx-16 lh-0 op-6"></i>
                                                                    </div>
                                                                </div>
                                                                <input class="form-control" type="address" name="address" id="address" value="{{$editData->address}}">
                                                            </div>
                                                        </div>
                                                        </div><br>
                                                        <button class="btn btn-info">Update</button>
													</div>
                                                    </form>
													<div class="tab-pane " id="password">
                                                        <form action="{{route('update.password')}}" method="post" class="form-group">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label>Current Password:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="fa fa-key"></i>
                                                                        </div>
                                                                    </div><!-- input-group-prepend -->
                                                                    <input type="password" name="oldpassword" id="current_password" class="form-control" placeholder="Enter your current password">
                                                                    @error('oldpassword')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label> New Password:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="fa fa-key"></i>
                                                                        </div>
                                                                    </div><!-- input-group-prepend -->
                                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your new password">
                                                                        @error('password')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label> Confirm Password:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="fa fa-key"></i>
                                                                        </div>
                                                                    </div><!-- input-group-prepend -->
                                                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your new password">
                                                                        @error('password_confirmation')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>
                                                            </div>  
                                                            </div><br>
                                                            <button class="btn btn-info">Update</button>
                                                        </div>
                                                    </form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- COL-END -->
						</div>
						<!-- ROW CLOSED -->
                    
                    

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
