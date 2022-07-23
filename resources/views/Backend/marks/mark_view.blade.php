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
                            <li class="breadcrumb-item active" aria-current="page">Classes Mark Lists</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="{{route('student.marks.view')}}" class="btn btn-success btn-icon text-white mr-2">
                            <span><i class="fe fe-plus"></i></span> 
                        </a>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Classes Marks Lists</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%">SL</th>
													<th>Class</th>
													<th width="15%">Action</th>             
												</tr>
                            				</thead>
                            				<tbody>
                                                @foreach($allData as $key => $class)
												<tr>
													<td>{{$key+1}}</td>
													<td>{{$class ['class']['name']}}</td>
													<td>
														<a title="Students Marks Details" href="{{route('marks.details',$class->class_id)}}" class="btn btn-info"><i class="fa fa-table"></i></a>
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
