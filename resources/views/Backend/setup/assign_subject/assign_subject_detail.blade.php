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
                            <li class="breadcrumb-item"><a href="{{route('assign.subject.view')}}">Assign Subjects List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Assign Subjects Details</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Subjects of: </h3>
                                    <i class="badge badge-info"> {{$detailsData['0']['student_class']['name']}} </i><br>
                                    <h3 class="card-title">Negaran: </h3>
                                    <i class="badge badge-success"> {{$detailsData['0']['negarans']['name']}} </i>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th>Subject</th>
                                                    <th>Teacher</th>
                                                    <th>Full Mark</th>
                                                    <th>Pass Mark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($detailsData as $key => $detail)
                                                <tr>
                                                    <td>{{$key+1}}</td>                                                              
                                                    <td>{{$detail['student_subject']['name']}}</td>                                    
                                                    <td>{{$detail['teachers']['name']}}</td>                                                                                                                                            
                                                    <td>{{$detail -> full_mark}}</td>                                    
                                                    <td>{{$detail -> pass_mark}}</td>                                                                      
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
