@extends('admin.admin_master')
@section('admin')

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Academic</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Students Enrollment</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="{{route('add.student')}}" class="btn btn-success btn-icon text-white mr-2">
                            <span><i class="fe fe-plus"></i></span> 
                        </a>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Students List</h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th>Id No</th>
                                                    <th>B/N</th>
                                                    <th>Name</th>
                                                    <th>Father Name</th>
                                                    <th>Tazkira</th>
                                                    <th>Mobile</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Image</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <tr>
                                                    @foreach($allData as $key => $value)
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$value ['student']['id_no']}}</td>
                                                    <td>{{$value -> base_number}}</td>
                                                    <td>{{$value ['student']['name']}}</td>
                                                    <td>{{$value -> father_name}}</td>
                                                    <td>{{$value -> tazkira_no}}</td>
                                                    <td>{{$value ['student']['mobile']}}</td>
                                                    <td>{{$value ['studentYear']['name']}}</td>
                                                    <td>{{$value ['studentClass']['name'] }}</td>
                                                    <td>
                                                    <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/user.png') }}" 
                                                    style="width: 50px; width: 50px; border-radius:50%"> 
                                                    </td>
                                                    <td>
                                                    <a title="Update Students Information" href="{{route('student.registration.edit', $value -> student_id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a title="Students Informations Details" href="{{route('student.details',$value -> student_id)}}" target="_blank" class="btn btn-info"><i class="fa fa-print"></i></a>
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
