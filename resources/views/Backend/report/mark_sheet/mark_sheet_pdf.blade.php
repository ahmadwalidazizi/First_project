@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }
  #customer {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
</style>
        <div class="container app-content">
            <div class="">
				<div class="page-header">
                    <!-- PAGE-HEADER -->
                    <div>
                        <h1 class="page-title">Exams</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('mark.sheet.view')}}">Mark Sheet Get</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Students MarkSheet Generate</li>
                        </ol>
                    </div>
                    <!-- PAGE-HEADER END -->
                </div>
                    <!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="custome">
											@php
												$assign_student = App\Models\AssignStudents::where('class_id', $all_marks['0']->class_id)->first();
											@endphp 
											<thead>
												<tr>
													<td>
														<img src="{{ (!empty($all_marks['0']['student']['image']))? url('upload/student_images/'.$all_marks['0']['student']['image']):url('upload/user.png') }}" 
														style="width: 120px; width: 120px;"> 
													</td>  
													<td style="text-align:center;">
														<h3>Azizi Academy</h3>
														<h4>Students Transcript</h4>
														<h5>{{$all_marks['0']['examtype']['name']}} Mark Sheet</h5>
													</td>    
													<td>
														<img src="{{asset('upload/user.png')}}" alt="" style="float:right; width: 120px; width: 120px;">
													</td>   
												</tr>
                            				</thead>
                                        </table>
										<table>
											<thead>
												<tr style="text-align:center;">
													<td><h4><span style="font-weight:bold;">Student/Id_No:</span>  {{$all_marks['0']['student']['id_no']}} </h5></td>
													<td><h4><span style="font-weight:bold;">Student/Name:</span>  {{$all_marks['0']['student']['name']}} </h5></td>
													<td><h4><span style="font-weight:bold;">Student/F_Name:</span>{{$assign_student->father_name}}  </h5></td>
													<td><h4><span style="font-weight:bold;">Student/G_F_Name:</span> {{$assign_student->grand_father_name}}</h5></td>
													<td><h4><span style="font-weight:bold;">Student/Class:</span>  {{$all_marks['0']['class']['name']}} </h5></td>
												</tr>
											</thead>
											
										</table>
										<div class="row">
											<div class="col-lg-12">
												<table class="table table-striped table-hover" id="custome">
													<thead class="bg-success">
														<th>SL</th>
														<th>Subject</th>
														<th>Full Mark</th>
														<th>Get Mark</th>
														<th>Grade</th>
													</thead>
													<tbody>
													@php
														$total_marks = 0;
														$total_point = 0;
													@endphp
														@foreach($all_marks as $key => $mark)
														@php
														$get_mark = $mark->marks;
														$total_marks = (float)$total_marks+(float)$get_mark;
														$total_subject = App\Models\StudentMarks::where('class_id',$mark->class_id)
														->where('exam_type_id',$mark->exams)->where('student_id',$mark->student_id)->get()->count();
														@endphp
														<tr>
															<td width="5%"> {{$key+1}} </td>
															<td> {{$mark ['subject']['student_subject']['name']}} </td>
															<td> {{$mark ['subject']['full_mark']}} </td>
															<td> {{$get_mark}} </td>
															@php
															$grade_marks = App\Models\MarksGrade::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
															$gradename = $grade_marks->grade_name;
															@endphp
															<td class="text-center">{{$gradename}}</td>
														</tr>
													@endforeach
													<tr>
														<td colspan="3"><strong style="padding-left: 30px;">Total Marks</strong></td>
														<td colspan="3"><strong style="padding-left: 38px;">{{ $total_marks }}</strong></td>
													</tr>
													
													</tbody>
												</table>
											</div>
										</div>
										
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
    $(document).on('change','#class_id','#grade_id',function(){
      var class_id = $('#class_id').val();

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
