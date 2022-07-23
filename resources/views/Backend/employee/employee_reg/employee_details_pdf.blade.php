<!DOCTYPE html>
<html>
<head>
  <title>Employee Registration Information</title>
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
   <img src="{{ (!empty($details['employee']['image']))? url('upload/employee_images/'.$details['employee']['image']):url('upload/user.png') }}" 
    style="width: 120px; width: 120px;"> 

</td>
    <td>
    <h1 style="padding-left:;">Azizi Academy</h1>
    <h2 style="padding-left:-100px;">Employee Information</h2>
    </td> 
  </tr>
  <td>
  <img src="{{asset('upload/user.png')}}" alt="" style="float:right; margin-left:-100px; width:100px; height:100px;">
  </td>
   
</table>






<table id="customers">
  <tr>
   
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td><b> ID No</b></td>
    <td>{{ $details['employee']['id_no'] }}</td>
  </tr>
  <tr>
  <tr>
    <td><b> Joining_date Date</b></td>
    <td>{{ $details -> joining_date }}</td>
  </tr>
  <tr>
    <td><b> Name</b></td>
    <td>{{ $details['employee']['name'] }}</td>
  </tr>
  <tr>
    <td><b>Father's Name</b></td>
    <td>{{ $details ->father_name }}</td>
  </tr>
  <tr>
    <td><b>Mobile Number </b></td>
    <td>{{ $details['employee']['mobile'] }}</td>
  </tr>
  <tr>
    <td><b>Email </b></td>
    <td>{{ $details['employee']['email'] }}</td>
  </tr>
  <tr>
    <td><b>Address</b></td>
    <td>{{ $details['employee']['address'] }}</td>
  </tr>
  <tr>

    <td><b>Gender</b></td>
    <td>{{ $details['employee']['gender'] }}</td>
  </tr>
    <tr>
    <td><b>Date of Birth</b></td>
    <td>{{ $details  -> dob; }}</td>
  </tr>
    <tr>
    <td><b>Position </b></td>
    <td>{{ $details['designation']['name'] }}</td>
  </tr>
    <tr>
    <tr>
    <td><b>salary </b></td>
    <td>{{ $details -> salary }}</td>
  </tr>
    <tr>
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
