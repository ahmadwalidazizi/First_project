@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('Backend/assets/js/cdn.js')}}"></script>

		<div class="container-fluid app-content">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Academic/Timetable</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('student.timetable.view')}}">Students Timetable</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Students Timetable</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
				</div>
			 <!-- ROW-1 OPEN -->
				 <div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Timetable</h3>
							</div>
                            <div class="card-body">									
								<form action="{{route('student.timetable.store')}}" method="post" class="form-group">
    								@csrf
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
											<div class="card-body">
											<!--Start row-->
												<div class="row">
													<div class="col-lg-12">
														<label>Class:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-home"></i></div>
															</div><!-- input-group-prepend -->
															<select class="form-control select2"  name="class_id" disable="">
                                                                <option selected="" disabled="">Choose Class</option>
                                                                @foreach($classes as $class)
                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                                @endforeach
                                                            </select>
														</div>
													</div>
													<div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Day</th>
                                                                    <th>1st</th>
                                                                    <th>2nd</th>
                                                                    <th>3rd</th>
                                                                    <th>4th</th>
                                                                    <th>5th</th>
                                                                    <th>6th</th>
                                                                    <th>7th</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="day[]" id="day">
                                                                                    <option value="" selected="" disabled=""> Day</option>
                                                                                    <option value="Saturday">Saturday</option>
                                                                                    <option value="Sunday">Sunday</option>
                                                                                    <option value="Monday">Monday</option>
                                                                                    <option value="Tuesday">Tuesday</option>
                                                                                    <option value="Wednesday">Wednesday</option>
                                                                                    <option value="Thursday">Thursday</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_1[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_1[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_2[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_2[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_3[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_3[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_4[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_4[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_5[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_5[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_6[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_6[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_7[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_7[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="day[]" id="day">
                                                                                    <option value="" selected="" disabled=""> Day</option>
                                                                                    <option value="Saturday">Saturday</option>
                                                                                    <option value="Sunday">Sunday</option>
                                                                                    <option value="Monday">Monday</option>
                                                                                    <option value="Tuesday">Tuesday</option>
                                                                                    <option value="Wednesday">Wednesday</option>
                                                                                    <option value="Thursday">Thursday</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_1[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_1[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_2[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_2[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_3[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_3[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_4[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_4[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_5[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_5[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_6[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_6[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_7[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_7[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="day[]" id="day">
                                                                                    <option value="" selected="" disabled=""> Day</option>
                                                                                    <option value="Saturday">Saturday</option>
                                                                                    <option value="Sunday">Sunday</option>
                                                                                    <option value="Monday">Monday</option>
                                                                                    <option value="Tuesday">Tuesday</option>
                                                                                    <option value="Wednesday">Wednesday</option>
                                                                                    <option value="Thursday">Thursday</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_1[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_1[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_2[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_2[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_3[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_3[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_4[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_4[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_5[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_5[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_6[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_6[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_7[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_7[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="day[]" id="day">
                                                                                    <option value="" selected="" disabled=""> Day</option>
                                                                                    <option value="Saturday">Saturday</option>
                                                                                    <option value="Sunday">Sunday</option>
                                                                                    <option value="Monday">Monday</option>
                                                                                    <option value="Tuesday">Tuesday</option>
                                                                                    <option value="Wednesday">Wednesday</option>
                                                                                    <option value="Thursday">Thursday</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_1[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_1[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_2[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_2[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_3[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_3[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_4[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_4[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_5[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text"><i class="fa fa-home"></i></div>
                                                                                </div><!-- input-group-prepend -->
                                                                                <select class="form-control select2"  name="subject_5[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_6[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_6[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_7[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_7[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="day[]" id="day">
                                                                                    <option value="" selected="" disabled=""> Day</option>
                                                                                    <option value="Saturday">Saturday</option>
                                                                                    <option value="Sunday">Sunday</option>
                                                                                    <option value="Monday">Monday</option>
                                                                                    <option value="Tuesday">Tuesday</option>
                                                                                    <option value="Wednesday">Wednesday</option>
                                                                                    <option value="Thursday">Thursday</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_1[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_1[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_2[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_2[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_3[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_3[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_4[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_4[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_5[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_5[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_6[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_6[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_7[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_7[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="day[]" id="day">
                                                                                    <option value="" selected="" disabled=""> Day</option>
                                                                                    <option value="Saturday">Saturday</option>
                                                                                    <option value="Sunday">Sunday</option>
                                                                                    <option value="Monday">Monday</option>
                                                                                    <option value="Tuesday">Tuesday</option>
                                                                                    <option value="Wednesday">Wednesday</option>
                                                                                    <option value="Thursday">Thursday</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_1[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_1[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_2[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_2[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_3[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_3[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_4[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_4[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_5[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_5[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_6[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="subject_6[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-lg-12">
                                                                            <label>Teacher:</label>
                                                                            <div class="input-group">
                                                                                <select class="form-control select2"  name="teacher_7[]" id="teacher_1">
                                                                                    <option value="" selected="" disabled="">Teacher</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                    <option value="{{$teacher -> id}}"> {{$teacher ['employee']['name']}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <label>Subject:</label>
                                                                            <div class="input-group">

                                                                                <select class="form-control select2"  name="subject_7[]" id="subject_1">
                                                                                    <option value="" selected="" disabled="">Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                    <option value="{{$subject -> id}}"> {{$subject ->name}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
												</div>
												<!--End row-->													
											</div>
										</div>
											<button class="btn btn-success fixbutton"  style="width: 50px;
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
											right: 25px;
											bottom: 80px;
											z-index: 100;
											transition: background 0.25s;
											outline: blue;
											border: none;
											cursor: pointer;"><span class="fa fa-plus"></span></button> 
											<!-- COL END -->
										</div>
									</form>
                            	</div>
							<!-- TABLE WRAPPER -->
						</div>
						<!-- SECTION WRAPPER -->
					</div>
				</div>
				<!-- ROW-1 CLOSED -->
        </div>

@endsection