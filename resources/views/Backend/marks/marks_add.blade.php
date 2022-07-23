@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
	.d-none{visibility:hidden;}
</style>
		<div class="container app-content">
            
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Exams</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('marks.view')}}">Marks List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Marks Entry</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
				</div>
		
			 <!-- ROW-1 OPEN -->
				 <div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Subjects Mark Entry</h3>
							</div>
                            <div class="card-body">									
								<form action="{{route('marks.entry.store')}}" method="post" class="form-group">
    								@csrf
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
											<div class="card-body">
											<!--Start row-->
												<div class="row">
													<div class="col-lg-4">
														<label>Class:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-home"></i></div>
															</div><!-- input-group-prepend -->
															<select class="form-control select2"  name="class_id" id="class_id">
																<option value="" selected="" disabled="">Class</option>
																@foreach($classes as $class)
																<option value="{{$class -> id}}"> {{$class -> name}} </option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-lg-4">
														<label>Subjects:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-user"></i></div>
															</div><!-- input-group-prepend -->
															<select class="form-control select2"  name="assign_subject_id" id="assign_subject_id">
																<option selected="">Subject</option>
															</select>
														</div>
													</div>
													<div class="col-lg-2">
														<label>Exams type:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-book"></i></div>
															</div><!-- input-group-prepend -->
															<select class="form-control select2"  name="exam_type_id" id="exam_type_id">
																<option value="" selected="" disabled="">Exam Type</option>
																@foreach($exams as $exam)
																<option value="{{$exam -> id}}"> {{$exam -> name}} </option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-lg-2">
														<a class="btn btn-info" id="search" name="search" value="Search" style="margin-top:24px;"><i class="fa fa-search"></i></a>
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
										<div class="row d-none" id="marks-entry">
											<div class="col-md-12 col-lg-12">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
															<table id="example" class="table table-striped table-bordered table-hover">
																<thead>
																	<tr>
																		<th>Id No</th>
																		<th>Student Name</th>
																		<th>Father Name</th>
																		<th>Gender</th>
																		<th>Marks</th>
																	</tr>
																</thead>
																<tbody id="marks-entry-tr">

																</tbody>
															</table>
														</div>
													</div>
												<!-- TABLE WRAPPER -->
												</div>
												<!-- SECTION WRAPPER -->
											</div>
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
            
            </div>
        </div>




		<script type="text/javascript">
  $(document).on('click','#search',function(){
    var class_id = $('#class_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'class_id':class_id},
      success: function (data) {
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.father_name+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="number" class="form-control " name="marks[]" ></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });

</script>


<!--   // for get Student Subject  -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#class_id',function(){
      var class_id = $('#class_id').val();
      $.ajax({
        url:"{{route('marks.getsubject')}}",
        type:"GET",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.student_subject.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    });
  });
</script>


@endsection