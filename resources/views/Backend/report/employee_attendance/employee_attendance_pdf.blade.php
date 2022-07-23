<!DOCTYPE html>
<html>
<head>
    <title>Employee Attendance Report</title>
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
</head>
<body>


<table id="customer">
  <tr>
   <td>
   <img src="{{ (!empty($details['user']['image']))? url('upload/student_images/'.$details['user']['image']):url('upload/user.png') }}" 
    style="width: 120px; width: 120px;"> 

</td>
    <td>
    <h1 style="padding-left:;">Azizi Academy</h1>
    <h3 style="padding-left:-100px;">Employee Attendance Report</h3>
    </td> 
  </tr>
  <td>
  <img src="{{asset('upload/user.png')}}" alt="" style="float:right; margin-left:-100px; width:100px; height:100px;">
  </td>

</table>
<br>
<strong>Id No: </strong> {{$allData ['0']['user']['id_no']}},
<strong>Employee Name: </strong> {{$allData ['0']['user']['name']}}, 
<strong>Date: </strong> {{$month}}
<br>
<table id="customers">
 <tr>
     <td width="50%"><h4>Date</h4></td>
     <td width="50%"><h4>Attendance Status</h4></td>
 </tr>
 @foreach($allData as $value)
 <tr>
     <td width="50%">{{date('d-m-Y', strtotime($value->date))}}</td>
     <td width="50%">{{$value -> attend_status}}</td>   
 </tr>
 @endforeach
<tr>
    <td colspan="2">
        <strong>Total Present:</strong> {{$present}}
        <strong>Total Absent : </strong> {{ $absent }}
        <strong>Total Leave : </strong> {{ $leave }}
    </td>
</tr>
</table>
<br><br>
  <i style="font-size: 10px; float:right;">Print Data : {{ date("d M Y") }}</i>


</body>
</html>
