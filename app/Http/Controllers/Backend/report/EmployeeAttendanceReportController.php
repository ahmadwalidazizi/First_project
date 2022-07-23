<?php

namespace App\Http\Controllers\Backend\report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;
use PDF;

class EmployeeAttendanceReportController extends Controller
{
    public function EmployeeAttendanceView(){
        $data ['employees'] = User::where('usertype','Employee')->get();
        return view('Backend.report.employee_attendance.employee_attendance_view',$data);
    }

    public function EmployeeAttendanceGet(Request $request){
        $employee_id = $request -> employee_id;
        if ($employee_id != '') {
            $where[] = ['employee_id', $employee_id];
        }
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like',$date.'%'];
        }
        $single_attendance = EmployeeAttendance::with(['user'])->where($where)->get();
        if ($single_attendance == true) {
            $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
            //dd($data['allData']->toArray());
            $data['absent'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
            $data['leave'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
            $data['present'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Present')->get()->count();
            
            $data['month'] = date('m-Y', strtotime($request->date));

            $pdf = PDF::loadView('Backend.report.employee_attendance.employee_attendance_pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        }
        else{
            $notification = array(
                'message' => 'Sorry These Criteria Donse not match',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    }
}
