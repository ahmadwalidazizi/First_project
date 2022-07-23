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
                            <li class="breadcrumb-item active" aria-current="page">Assign Subjects List</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <div class="ml-auto pageheader-btn">
                        <a href="{{route('add.assign.subject')}}" class="btn btn-success btn-icon text-white mr-2"><span><i class="fe fe-plus"></i></span></a>
                    </div>
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Assign Subjects List</h3>
                                    <div class="ml-auto pageheader-btn">
                                        <a href="{{route('negaran.list')}}" class="btn btn-info btn-icon text-white mr-2">Negrans List</a>
                                    </div>
								</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th>Class</th>
                                                    <th width="20%">Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($allData as $key => $assign)
                                                <tr>                                        
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$assign['student_class']['name']}}</td>
                                                    <td>
                                                        <a title="Update Assign Subjects" href="{{route('assign.subject.edit',$assign->class_id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                        <a title="Assign Subjects Details" href="{{route('assign.subject.detail',$assign->class_id)}}" class="btn btn-success"><i class="fa fa-table"></i></a>
                                                        <a title="Delete Assign Subjects" href="#" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
