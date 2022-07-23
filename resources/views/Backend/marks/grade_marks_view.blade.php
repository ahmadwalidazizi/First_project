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
                            <li class="breadcrumb-item active" aria-current="page">Students Grades</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="{{route('marks.grade.add')}}" class="btn btn-success btn-icon text-white mr-2"><span><i class="fe fe-plus"></i></span>
                        </a>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Grades List</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
											<thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Exam Type</th>
                                                <th>Grade Name</th>
                                                <th>Marks</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        	</thead>
											<tbody> 
                                                <tr>
                                                    @foreach($allData as $key => $value)
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $value ['examtypes']['name'] }}</td>
                                                    <td> {{ $value->grade_name }}</td>	
                                                    <td> {{ $value->start_marks }} - {{$value->end_marks}}</td>	
                                                    <td> {{ $value->remarks }}</td>
                                                    <td>
                                                        <a href="{{route('marks.grade.edit', $value->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                        <a href="{{route('marks.grade.delete', $value->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
