@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<div class="container app-content">
            
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Setup/Subjects Management</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('assign.subject.view')}}">Assign Subjects List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Assign Subjects</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
				</div>
		
			 <!-- ROW-1 OPEN -->
				 <div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Assign Subjects</h3>
							</div>
                            <div class="card-body">									
								<form action="{{route('assign.subject.store')}}" method="post" class="form-group">
    								@csrf
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
											<div class="card-body">
											<!--Start row-->
												<div class="row add_item">
													<div class="col-lg-6">
														<label>Class:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-home"></i></div>
															</div><!-- input-group-prepend -->
															<select class="form-control select2"  name="class_id" disable="">
                                                                <option>Choose Class</option>
                                                                @foreach($classes as $class)
                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                                @endforeach
                                                            </select>
														</div>
													</div>
													<div class="col-lg-6">
														<label>Negaran:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-user"></i></div>
															</div><!-- input-group-prepend -->
															<select class="form-control select2"  name="negaran">
                                                                <option selected="" disabled="">Choose Negran</option>
                                                                @foreach($teachers as $teacher)
                                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                @endforeach
                                                            </select>
														</div>
													</div>
													<div class="col-lg-3">
														<label> Subjects:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-home"></i></div>
															</div><!-- input-group-prepend -->
                                                            <select class="form-control select2"  name="subject_id[]" disable="">
                                                                <option selected="" disabled="">Choose Subjects</option>
                                                                @foreach($subjects as $subject)
                                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                                @endforeach
                                                            </select>
														</div>
													</div>
													<div class="col-lg-3">
														<label> Teacher:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-user"></i></div>
															</div><!-- input-group-prepend -->
                                                            <select class="form-control select2"  name="teacher_id[]">
                                                                <option selected="" disabled="">Choose Teachers</option>
                                                                @foreach($teachers as $teacher)
                                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                @endforeach
                                                            </select>
														</div>
													</div>
													<div class="col-lg-2">
														<label> Full Mark:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-pencil"></i></div>
															</div><!-- input-group-prepend -->
                                                            <input type="number" name="full_mark[]"  class="form-control" placeholder="Full mark" require>
														</div>
													</div>  
                                                    <div class="col-lg-2">
														<label> Pass Mark:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-pencil"></i></div>
															</div><!-- input-group-prepend -->
                                                            <input type="number" name="pass_mark[]"  class="form-control" placeholder="Pass mark" require>
														</div>
													</div>  
													<div class="col-lg-2">
														<span class="btn btn-info addeventmore" style="margin-top:25px;"><i class="fa fa-plus"></i></span>
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
											right: 110px;
											bottom: 60px;
											z-index: 100;
											transition: background 0.25s;
											outline: blue;
											border: none;
											cursor: pointer;"><span class="fa fa-save"></span></button> 
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
                <div style="visibility:hidden">
                    <div class="add_whole_extra_item" id="add_whole_extra_item">
                        <div class="delete_whole_extra_item" id="delete_whole_extra_item">
							<!--Start row-->
							<div class="row">
								<div class="col-lg-3">
									<label> Subject:</label>										
                                    <div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-home"></i></div>
										</div><!-- input-group-prepend -->
                                        <select class="form-control select2"  name="subject_id[]" disable="">
                                            <option selected="" disabled="">Choose Subjects</option>
                                            @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<div class="col-lg-3">
									<label> Teacher:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-user"></i></div>
										</div><!-- input-group-prepend -->
                                       <select class="form-control select2"  name="teacher_id[]" disable="">
                                            <option selected="" disabled="">Choose Teachers</option>
                                            @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<div class="col-lg-2">
									<label> Full Mark:</label>											
                                    <div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-pencil"></i></div>
										</div><!-- input-group-prepend -->
                                        <input type="number" name="full_mark[]"  class="form-control" placeholder="Full mark" require>
									</div>
								</div>  
                                <div class="col-lg-2">
									<label> Pass Mark:</label>
									<div class="input-group">
										<div class="input-group-prepend">
									        <div class="input-group-text"><i class="fa fa-pencil"></i></div>
										</div><!-- input-group-prepend -->
                                        <input type="number" name="pass_mark[]"  class="form-control" placeholder="Pass mark" require>
									</div>
								</div>  
								<div class="col-lg-2" style="margin-top:25px;">
									<span class="btn btn-info addeventmore"><i class="fa fa-plus"></i></span>
                                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                </div>
							</div>
							<!--End row-->													
					    </div>
                    </div>
                </div>
            </div>
        </div>




	<script type="text/javascript">
 		$(document).ready(function(){
 		var counter = 0;
 		$(document).on("click",".addeventmore",function(){
 			var whole_extra_item_add = $('#add_whole_extra_item').html();
 			$(this).closest(".add_item").append(whole_extra_item_add);
 			counter++;
 		});
 		$(document).on("click",'.removeeventmore',function(event){
 			$(this).closest(".delete_whole_extra_item").remove();
 			counter -= 1
 		});

 	});
 </script>

@endsection