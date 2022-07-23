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
                            <li class="breadcrumb-item active" aria-current="page">Negaran List</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">All Classes Negran Teacher List </h3>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th width="50%">Class</th>
                                                    <th>Negaran Teacher</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($allData as $key => $detail)
                                                <tr>
                                                    <td>{{$key+1}}</td>                                                              
                                                    <td>{{$detail['student_class']['name']}}</td>                                    
                                                    <td>{{$detail['negarans']['name']}}</td>                                                                
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
