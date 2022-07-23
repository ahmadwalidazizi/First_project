<!DOCTYPE html>
<html>
<head>
  <title>Employee Monthly Salary</title>
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
   <img src="{{ (!empty($details['0']['user']['image']))? url('upload/employee_images/'.$details['0']['user']['image']):url('upload/user.png') }}" 
    style="width: 120px; width: 120px;"> 

</td>
    <td>
    <h1 style="padding-left:;">Azizi Academy</h1>
    <h2 style="padding-left:-100px;">Employee Salary Information</h2>
    </td> 
  </tr>
  <td>
  <img src="{{asset('upload/user.png')}}" alt="" style="float:right; margin-left:-100px; width:100px; height:100px;">
  </td>
   
</table>

@php

    $date = date('Y-m',strtotime($details['0']->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	 }
       $totalattend = App\Models\EmployeeAttendance::with(['user','salary'])->where($where)->where('employee_id',$details['0']->employee_id)->get();
       $salary = (float)$details['0']['salary']['salary'];
    	 	$salaryperday = (float)$salary/30;
        $absentcount = count($totalattend->where('attend_status','Absent'));
        $presentcount = count($totalattend->where('attend_status','Present'));
    	 	$leavecount = count($totalattend->where('attend_status','Leave'));
    	 	$totalsalaryminus = (float)$absentcount*(float)$salaryperday;
    	 	$totalsalary = (float)$salary-(float)$totalsalaryminus;

@endphp 

<table id="customers">
  <tr>
   
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td><b> ID No</b></td>
    <td>{{ $details['0']['user']['id_no'] }}</td>
  </tr>
  <tr>
  <tr>
    <td><b> Name</b></td>
    <td>{{ $details['0']['user']['name'] }}</td>
  </tr>
  <tr>
    <td><b> Total Absent fot this month</b></td>
    <td>{{ $absentcount}}</td>
  </tr>
  <tr>
    <td><b> Total Present fot this month</b></td>
    <td>{{ $presentcount}}</td>
  </tr>
  <tr>
    <td><b> Total Leave fot this month</b></td>
    <td>{{ $leavecount}}</td>
  </tr>
  <tr>
    <td><b> Month</b></td>
    <td>{{ date('M-Y',strtotime($details['0']->date))}}</td>
  </tr>
  <tr>
    <td><b>Salary of this Month</b></td>
    <td>{{ $totalsalary }}</td>
  </tr>
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

  <table id="customers">
  <tr>
   
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td><b> ID No</b></td>
    <td>{{ $details['0']['user']['id_no'] }}</td>
  </tr>
  <tr>
  <tr>
    <td><b> Name</b></td>
    <td>{{ $details['0']['user']['name'] }}</td>
  </tr>
  <tr>
    <td><b> Total Absent fot this month</b></td>
    <td>{{ $absentcount}}</td>
  </tr>
  <tr>
    <td><b> Total Present fot this month</b></td>
    <td>{{ $presentcount}}</td>
  </tr>
  <tr>
    <td><b> Total Leave fot this month</b></td>
    <td>{{ $leavecount}}</td>
  </tr>
  <tr>
    <td><b> Month</b></td>
    <td>{{ date('M-Y',strtotime($details['0']->date))}}</td>
  </tr>
  <tr>
    <td><b>Salary of this Month</b></td>
    <td>{{ $totalsalary }}</td>
  </tr>
</table>
</body>
</html>
