<!DOCTYPE html>
<html>
<head>
  <title>Student Registration Information</title>
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
#customer {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
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
</style>
</head>
<body>

<table id="customer">
  <tr>
   <td>
   <img src="{{ (!empty($details['student']['image']))? url('upload/student_images/'.$details['student']['image']):url('upload/user.png') }}" 
    style="width: 120px; width: 120px;"> 
  
</td>
    <td>
    <h1 style="padding-left:;">Azizi Academy</h1>
    <h2 style="padding-left:-100px;">Students Information</h2>
    </td> 
  </tr>
  <td>
  <img src="{{asset('upload/user.png')}}" alt="" style="float:right; margin-left:-100px; width:100px; height:100px;">
  </td>
   
</table>






<table id="customers">
  <tr>
   
    <th width="60%">Student Details</th>
    <th width="40%">Student Data</th>
  </tr>
  <tr>
    <td><b> Registration Date: تاریخ مراجعه به مکتب</b></td>
    <td>{{ date('D-M-Y', strtotime($details ->registration_date)) }}</td>
  </tr>
  <tr>
    <td><b> Base Number: نمبر اساس</b></td>
    <td>{{ $details ->base_number }}</td>
  </tr>
  <tr>
    <td><b> ID No: آدی نمبر </b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td><b> Name: اسم مکمل</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>
  <tr>
    <td><b>Father's Name: اسم پدر</b></td>
    <td>{{ $details ->father_name }}</td>
  </tr>
  <tr>
    <td><b>Father's Name: اسم پدرکلان</b></td>
    <td>{{ $details ->grand_father_name }}</td>
  </tr>
  <tr>
    <td><b>National ID: نمبر تذکره</b></td>
    <td>{{ $details ->tazkira_no }}</td>
  </tr>
  <tr>
    <td><b>Mobile Number: نمیر مبایل </b></td>
    <td>{{ $details['student']['mobile'] }}</td>
  </tr>
  <tr>
    <td><b>Address: آدرس </b></td>
    <td>{{ $details['student']['address'] }}</td>
  </tr>
  <tr>
    <td><b>Email-Address: آدرس الکترونیکی </b></td>
    <td>{{ $details['student']['email'] }}</td>
  </tr>
  <tr>
    <td><b>Gender: جنسیت</b></td>
    <td>{{ $details['student']['gender'] }}</td>
  </tr>
    <tr>
    <td><b>Date of Birth: تاریخ تولد</b></td>
    <td>{{ $details  -> dob; }}</td>
  </tr>
  <tr>
    <td><b>Discount: مقدار نخفیف درنظر گرفته شده </b></td>
    <td>{{ $details['discountStudent']['discount'] }}%</td>
  </tr>
    <tr>
    <td><b>Year: سال شمولیت </b></td>
    <td>{{ $details['studentYear']['name'] }}</td>
  </tr>
  <tr>
    <td><b>Class: صنف مورد نظر  </b></td>
    <td>{{ $details['studentClass']['name'] }}</td>
  </tr>
    <tr>
    <td><b>Shift: تایم مورد نظر </b></td>
    <td>{{ $details['studentShift']['name'] }}</td>
  </tr>
  <tr>
    <td><b>Transportation path: مسیر ترانسپورت و مقدار مالی آن </b></td>
    <td>{{ $details['transport']['title'] }} , {{$details['transport']['amount']}} Afn</td>
  </tr>
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>
  <img src="{{ (!empty($details -> tazkira_image))? url('upload/student_images/students_tazkira_images/'.$details->tazkira_image):url('upload/user.png') }}"> 
</body>
</html>
