@extends('admin.admin_master')
@section('admin')


        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">User View</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User List</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="#" class="btn btn-success btn-icon text-white mr-2" data-toggle="modal" data-target="#largeModal">
                            <span><i class="fe fe-plus"></i></span> 
                        </a>
                    </div>
                </div>
                <!-- LARGE MODAL -->
                <div id="largeModal" class="modal fade">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content ">
                            <div class="modal-header pd-x-20">
                                <h6 class="modal-title">Adding Users</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-20">
                                <form action="{{route('store.users')}}" method="post" class="form-group">
                                @csrf
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
                                                <select class="form-control select2" data-placeholder="Choose usertype" name="usertype" id="role">
                                                    <option label="" disabled="" selected="">Choose user type</option>
                                                    <option>Admin</option>
                                                    <option>Teacher</option>
                                                    <option>Student</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label> User Name:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div><!-- input-group-prepend -->
                                                <input type="text" name="name" id="username" class="form-control" placeholder="Enter user name" require>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label> User Email:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div><!-- input-group-prepend -->
                                                <input type="email" name="email" id="username" class="form-control" placeholder="Enter user email" require>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End row-->
                                </div><!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="click">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- MODAL DIALOG -->
                </div>
                    <!-- LARGE MODAL CLOSED -->
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">User List</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th>UserType</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Code</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($allData as $key => $user)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$user -> usertype}}</td>
                                                    <td>{{$user -> name}}</td>
                                                    <td>{{$user -> email}}</td>
                                                    <td>{{$user -> code}}</td>
                                                    <td style="text-align:center;">
                                                        <a title="Update User " href="{{route('edit.users',$user->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                        <a title="Delete User" href="{{route('delete.users',$user->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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