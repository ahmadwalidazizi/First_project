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
                            <li class="breadcrumb-item"><a href="{{route('marks.view')}}">Classes Mark Lists</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Class Marks Details</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Marks Details of: </h3>
                                    <i class="badge badge-info"> {{$marksDetails['0'] ['class']['name']}} </i><br>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%">SL</th>
													<th>ID No</th>
													<th>Name</th>
													<th>Subject</th>
													<th>Exam</th>
													<th>Marks</th>          
												</tr>
                            				</thead>
                            				<tbody>
                                                @foreach($marksDetails as $key => $details)
												<tr>
													<td>{{$key+1}}</td>
													<td>{{$details ['student']['id_no']}}</td>
													<td>{{$details ['student']['name']}}</td>
													<td>{{$details ['subject']['student_subject']['name']}}</td>
													<td>{{$details ['examtype']['name']}}</td>
													<td>{{$details -> marks}}</td>
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
