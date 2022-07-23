@extends('admin.admin_master')
@section('admin')

        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Academic/Timetable</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('student.timetable.view')}}">Students Timetable</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Students Timetable Details</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Timetable of: </h3>
                                    <span class="badge badge-success">  {{$timetableDetails['0']['class']['name']}} </span> 
                                
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
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
                                                @foreach($timetableDetails as $key => $detail)
                                                <tr>
                                                    <td>{{$key+1}}</td>                                                                                                                               
                                                    <td style="font-weight:bold;">{{$detail->day}}</td>                                                                                                                               
                                                    <td>{{$detail ['subjects']['name']}} / {{$detail['teacher1']['employee']['name']}} </td>                                                                                                                                                                                                                                                                                                                                  
                                                    <td>{{$detail ['subjects2']['name']}} / {{$detail['teacher2']['employee']['name']}}</td>                                                                                                                                                                                                                                                                                                                                  
                                                    <td>{{$detail ['subjects3']['name']}} / {{$detail['teacher3']['employee']['name']}}</td>                                                                                                                                                                                                                                                                                                                                  
                                                    <td>{{$detail ['subjects4']['name']}} / {{$detail['teacher4']['employee']['name']}}</td>                                                                                                                                                                                                                                                                                                                                  
                                                    <td>{{$detail ['subjects5']['name']}} / {{$detail['teacher5']['employee']['name']}}</td>                                                                                                                                                                                                                                                                                                                                  
                                                    <td>{{$detail ['subjects6']['name']}} / {{$detail['teacher6']['employee']['name']}}</td>                                                                                                                                                                                                                                                                                                                                  
                                                    <td>{{$detail ['subjects7']['name']}} / {{$detail['teacher7']['employee']['name']}}</td>                                                                                                                                                                                                                                                                                                                                  
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
