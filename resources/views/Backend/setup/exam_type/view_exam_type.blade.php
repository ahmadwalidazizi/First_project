@extends('admin.admin_master')
@section('admin')

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Setup/Subjects Management</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Exams Type List</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="#" class="btn btn-success btn-icon text-white mr-2" data-toggle="modal" data-target="#smallModal">
                            <span><i class="fe fe-plus"></i></span>
                        </a>
                    </div>
                </div>
				<!-- SMALL MODAL -->
				<div id="smallModal" class="modal fade">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Adding Exam Type</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{route('exam.type.restore')}}" method="post">
								@csrf
									 <!--Start row-->
									 <div class="row">
                                        <div class="col-lg-12">
                                            <label> Exam type Name:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-book"></i>
                                                    </div>
                                                </div><!-- input-group-prepend -->
												<input type="text" name="name" id="examtype" class="form-control" placeholder="Enter Exam Type" require>
                                                    @error('name')
                                                  	<span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--End row-->
								
							</div><!-- MODAL-BODY -->
							<div class="modal-footer">
								<button type="button" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</form>
					</div><!-- MODAL-DIALOG -->
				</div>
				<!-- SMALL MODAL CLOSED -->
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Exam Type List</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%">SL</th>
													<th>Exam Type</th>
													<th width="20%">Action</th>
													
												</tr>
                                        	</thead>
											<tbody>
												@foreach($allData as $key => $exam)
												<tr>
													<td>{{$key+1}}</td>
													<td>{{$exam -> name}}</td>
													<td>
														<a title="Update Exam Type" href="{{route('edit.exam.type',$exam->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
														<a title="Delete Exam Type" href="{{route('delete.exam.type',$exam->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
