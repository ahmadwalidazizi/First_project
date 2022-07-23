@extends('admin.admin_master')
@section('admin')

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Exams</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('marks.grade.view')}}">Sstudents Grades View</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Grades</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- ROW OPEN -->
                    <form action="{{route('marks.grade.update', $editData -> id)}}" method="post" class="form-group">
                    @csrf
                    <input type="hidden" name="id" value="{{$editData -> id}}">
						<div class="row row-cards">
							<div class="col-lg-8 col-xl-12">
								<div class="card">
									<div class="card-header border-bottom-0 p-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>ExamType</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="form-control select2"  name="examtype">
                                                        <option selected="" disabled="">ExamType</option>
                                                        @foreach($exams as $exam)
														<option value="{{$exam->id}}" {{($editData -> examtype == $exam->id) ? "selected" : ""}} >{{$exam->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
												<label> Grade Name:</label>
												<div class="input-group">
							    					<div class="input-group-prepend">
														<div class="input-group-text"><i class="fa fa-home"></i></div>
													</div><!-- input-group-prepend -->
                                                    <input type="text" name="grade_name" id="grade_name" class="form-control" value="{{$editData->grade_name}}">
												</div>
											</div>
											<div class="col-lg-4">
												<label> Start Marks:</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text"><i class="fa fa-user"></i></div>
													</div><!-- input-group-prepend -->
                                                    <input type="text" name="start_marks" id="start_marks" class="form-control" value="{{$editData->start_marks}}">
												</div>
											</div>
											<div class="col-lg-4">
												<label> End Marks:</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<div class="input-group-text"><i class="fa fa-pencil"></i></div>
													</div><!-- input-group-prepend -->
                                                    <input type="text" name="end_marks" id="end_marks" class="form-control" value="{{$editData->end_marks}}">
												</div>
											</div>  
                                            <div class="col-lg-12">
												<label> Remarks:</label>
												<div class="input-group">
													<div class="input-group-prepend">
												        <div class="input-group-text"><i class="fa fa-pencil"></i></div>
												    </div><!-- input-group-prepend -->
                                                    <input type="text" name="remarks" id="remarks" class="form-control" value="{{$editData->remarks}}">
												</div>
											</div>  
                                            <div class="col-lg-2">
                                                <button class="btn btn-info">Update</button>
										    </div> 
                                        </div>
									</div>
								</div>
							</div><!-- COL-END -->
						</div>
						<!-- ROW CLOSED -->
                    </form>


@endsection
