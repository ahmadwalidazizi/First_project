@extends('admin.admin_master')
@section('admin')

<div class="container app-content">
                    <div class="">
						<div class="page-header">
                            <!-- PAGE-HEADER -->
                            <div>
                                <h1 class="page-title">Profile Update</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('view.user')}}">User List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User Update</li>
                                </ol>
                            </div>
                        </div>
                        <form action="{{ route('update.users',$editData->id) }}" method="post" class="form-group">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-12">
                                    <div class="card img-card box-primary-shadow">
                                        <div class="card-body">
                                            <!--Start row-->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>User Type:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div><!-- input-group-prepend -->
                                                        <select class="form-control custom-select" name="usertype" id="usertype">
                                                            <option label="Choose user type"></option>
                                                            <option value="Admin"{{$editData->usertype == "Admin" ? "selected" : ""}}>Admin</option>
                                                            <option value="Teacher"{{$editData->usertype == "Teacher" ? "selected" : ""}}>Teacher</option>
                                                            <option value="Student" {{$editData->usetype == "Student" ? "selected" : ""}}>Student</option>
													    </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label> Name:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div><!-- input-group-prepend -->
                                                        <input type="text" name="name" id="name" class="form-control" value="{{$editData->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label> Email:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-envelope"></i>
                                                            </div>
                                                        </div><!-- input-group-prepend -->
                                                        <input type="email" name="email" id="email" class="form-control" value="{{$editData->email}}">
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <!--End row-->
                                        </div>
                                    </div>
                                    <button class="btn btn-info">Update</button> 
                                <!-- COL END -->
                            </div> 
                        </form>
                    </div>
                </div>
    
@endsection