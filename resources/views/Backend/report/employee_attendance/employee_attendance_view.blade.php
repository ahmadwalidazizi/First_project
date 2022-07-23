@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<div class="container app-content">
            
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Report/Employee Attendance</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Attendance</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
				</div>
		
			 <!-- ROW-1 OPEN -->
				 <div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Employee Attendance Report</h3>
							</div>
                            <div class="card-body">									
								<form action="{{route('employee.attendance.get')}}" method="get" class="form-group"  target="_blank">
    								@csrf
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
											<div class="card-body">
											<!--Start row-->
												<div class="row">
													<div class="col-lg-5">
														<label>Employee Name:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-home"></i></div>
															</div><!-- input-group-prepend -->
															<select class="form-control select2"  name="employee_id" id="employee_id">
																<option value="" selected="" disabled="">Select Employee</option>
																@foreach($employees as $employee)
																<option value="{{$employee -> id}}"> {{$employee -> name}} </option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-lg-5">
														<label>Date:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div><!-- input-group-prepend -->
															<input type="date" name="date" id="date" class="form-control" require>
														</div>
													</div>
													<div class="col-lg-2">
														<input type="submit" class="btn btn-info" id="search" name="search" value="Search" style="margin-top:24px;">
													</div>
												</div>
												<!--End row-->													
											</div>
										</div>
										
				
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
            
            </div>
        </div>



		<script type="text/javascript">
  $(document).on('click','#search',function(){
    var group_id = $('#group_id').val();
    var class_id = $('#class_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {'group_id':group_id,'class_id':class_id},
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
    $(document).on('change','#class_id','#grade_id',function(){
      var class_id = $('#class_id').val();
      var group_id = $('#group_id').val();

      $.ajax({
        url:"{{route('marks.getsubject')}}",
        type:"GET",
        data:{class_id:class_id, group_id:group_id},
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