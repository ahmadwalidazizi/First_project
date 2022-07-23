<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\setup\StudentClassController;
use App\Http\Controllers\Backend\setup\StudentYearController;
use App\Http\Controllers\Backend\setup\StudentGroupController;
use App\Http\Controllers\Backend\setup\StudentShiftController;
use App\Http\Controllers\Backend\setup\FeeCatagoryController;
use App\Http\Controllers\Backend\setup\FeeAmountController;
use App\Http\Controllers\Backend\setup\ExamTypeController;
use App\Http\Controllers\Backend\setup\SubjectController;
use App\Http\Controllers\Backend\setup\AssignSubjectController;
use App\Http\Controllers\Backend\setup\AssignClassesController;
use App\Http\Controllers\Backend\setup\DesignationController;
use App\Http\Controllers\Backend\students\StudentsRegistrationsController;
use App\Http\Controllers\Backend\students\StudentRollController;
use App\Http\Controllers\Backend\students\FeeRegistrationController;
use App\Http\Controllers\Backend\students\MonthlyFeeController;
use App\Http\Controllers\Backend\students\StudentAttendanceController;
use App\Http\Controllers\Backend\students\StudentTimetableController;
use App\Http\Controllers\Backend\employee\EmployeeRegistrationController;
use App\Http\Controllers\Backend\employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\employee\EmployeeMonthlySalaryController;
use App\Http\Controllers\Backend\employee\TeacherTimetableController;
use App\Http\Controllers\Backend\Marks\StudentMarksController;
use App\Http\Controllers\Backend\Marks\StudentGradeController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\Finance\StudentFeeController;
use App\Http\Controllers\Backend\Finance\EmployeeFinanceController;
use App\Http\Controllers\Backend\Finance\OtherCostController;
use App\Http\Controllers\Backend\report\ProfitController;
use App\Http\Controllers\Backend\report\MarkSheetController;
use App\Http\Controllers\Backend\report\EmployeeAttendanceReportController;
use App\Http\Controllers\Backend\setup\TransportController;

Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('Admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'],function(){

Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'ViewUser'])->name('view.user');
    Route::get('/add',[UserController::class,'AddUser'])->name('add.users');
    Route::post('/store',[UserController::class,'StoreUser'])->name('store.users');
    Route::get('/edit/{id}',[UserController::class, 'EditUser'])->name('edit.users');
    Route::post('/update/{id}',[UserController::class, 'UpdateUser'])->name('update.users');
    Route::get('/delete/{id}',[UserController::class,'DeleteUser'])->name('delete.users');
});
   
Route::prefix('profile')->group(function(){
    Route::get('profile/edit',[ProfileController::class,'UpdateProfile'])->name('edit.profile');
    Route::post('profile/store',[ProfileController::class,'StoreProfile'])->name('store.profile');
    Route::post('profile/update/password',[ProfileController::class,'UpdatePassword'])->name('update.password');
    
});

Route::prefix('setups')->group(function(){
    Route::get('/student/class/view',[StudentClassController::class,'ViewStudentClass'])->name('student.class.view');
    Route::get('/student/class/add',[StudentClassController::class,'AddStudentClass'])->name('add.student.class');
    Route::post('/student/class/store',[StudentClassController::class,'StoreStudentClass'])->name('student.class.restore');
    Route::get('/student/class/edit/{id}',[StudentClassController::class,'UpdateStudentClass'])->name('edit.student.class');
    Route::post('/student/class/update/{id}',[StudentClassController::class,'StudentClassUpdate'])->name('student.class.update');
    Route::get('/student/class/delete/{id}',[StudentClassController::class,'DeleteClassStudent'])->name('delete.student.class');
    
    //student year managment

    route::get('/student/year/view',[StudentYearController::class,'StudentYearView'])->name('student.year.view');
    route::get('/student/year/add',[StudentYearController::class,'StudentYearAdd'])->name('add.student.year');
    route::post('/student/year/store',[StudentYearController::class,'StudentYearStore'])->name('student.year.restore');
    route::get('/student/year/edit/{id}',[StudentYearController::class,'StudentYearEdit'])->name('edit.student.year');
    route::post('/student/year/update/{id}',[StudentYearController::class,'StudentYearUpdate'])->name('student.year.update');
    route::get('/student/year/delete/{id}',[StudentYearController::class,'StudentYearDelete'])->name('delete.student.year');

    // student grade management

    Route::get('/student/grade/view',[StudentGroupController::class,'StudentGroupView'])->name('student.group.view');
    Route::get('/student/grade/add',[StudentGroupController::class,'StudentGroupAdd'])->name('add.student.group');
    Route::post('/student/grade/store',[StudentGroupController::class,'StudentGroupStore'])->name('student.group.restore');
    Route::get('/studet/grade/edit/{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('edit.student.group');
    Route::post('/student/grade/update/{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('student.group.update');
    Route::get('/student/grade/delete/{id}',[StudentGroupController::class,'StudentGroupDelete'])->name('delete.student.group');

    // Student shift management

    Route::get('/student/shift/view',[StudentShiftController::class,'StudentShiftView'])->name('student.shift.view');
    Route::get('/student/shift/add',[StudentShiftController::class,'StudentShiftAdd'])->name('add.student.shift');
    Route::post('/student/shift/store',[StudentShiftController::class,'StudentShiftStore'])->name('student.shift.restore');
    Route::get('/student/shift/edit/{id}',[StudentShiftController::class,'StudentShiftEdit'])->name('edit.student.shift');
    Route::post('/student/shift/update/{id}',[StudentShiftController::class,'StudentShiftUpdate'])->name('student.shift.update');
    Route::get('/student/shift/delete/{id}',[StudentShiftController::class,'StudentShiftDelete'])->name('delete.student.shift');

    // Student Fee Catagory

    Route::get('/student/fee/view',[FeeCatagoryController::class,'FeeCatagoryView'])->name('fee.catagory.view');
    Route::get('/student/fee/add',[FeeCatagoryController::class,'FeeCatagoryAdd'])->name('add.fee.catagory');
    Route::post('/student/fee/add',[FeeCatagoryController::class,'FeeCatagoryStore'])->name('fee.catagory.restore');
    Route::get('/student/fee/edit/{id}',[FeeCatagoryController::class,'FeeCatagoryEdit'])->name('edit.fee.catagory');
    Route::post('/student/fee/update/{id}',[FeeCatagoryController::class,'FeeCatagoryUpdate'])->name('fee.catagory.update');
    Route::get('/student/fee/delete/{id}',[FeeCatagoryController::class,'FeeCatagoryDelete'])->name('delete.fee.catagory');

    // Student fee catagory amount routes

    Route::get('/fee/amount/view',[FeeAmountController::class,'FeeAmountView'])->name('fee.amount.view');
    Route::get('/fee/amount/add',[FeeAmountController::class,'FeeAmountAdd'])->name('add.fee.amount');
    Route::post('/fee/amount/store',[FeeAmountController::class,'FeeAmountStore'])->name('fee.amount.restore');
    Route::get('/fee/amount/edit/{class_id}',[FeeAmountController::class,'EditFeeAmount'])->name('edit_fee_amount');
    Route::post('/fee/amount/update{class_id}',[FeeAmountController::class,'FeeAmountUpdate'])->name('fee.amount.update');
    Route::get('/fee/amount/details',[FeeAmountController::class,'FeeAmountDetails'])->name('detail_fee_amount');

    // Registration Fee Amount routes 

    Route::get('/registration/fee/amount', [FeeAmountController::class, 'RegistrationFeeAmountView'])->name('regis.fee.amount');
    Route::get('/registration/fee/amount/add', [FeeAmountController::class, 'RegistrationFeeAmountAdd'])->name('add.registration.fee.amount');
    Route::post('/registration/fee/amount/store', [FeeAmountController::class, 'RegistrationFeeAmountStore'])->name('registration.fee.amount.restore');
    Route::get('/registration/fee/amount/edit/{class_id}', [FeeAmountController::class, 'RegistrationFeeAmountEdit'])->name('edit_registration_fee_amount');
    Route::post('/registration/fee/amount/update/{class_id}', [FeeAmountController::class, 'RegistrationFeeAmountUpdate'])->name('registration.fee.amount.update');
    Route::get('/registration/fee/amount/detail', [FeeAmountController::class, 'RegistrationFeeAmountDetail'])->name('detail_registration_fee_amount');


    // Student Exam Type routes

    Route::get('/exam/type/view',[ExamTypeController::class,'ExamTypeView'])->name('exam.type.view');
    Route::get('/exam/type/add',[ExamTypeController::class,'AddExamType'])->name('add.exam.type');
    Route::post('/exam/type/store',[ExamTypeController::class,'StoreExamType'])->name('exam.type.restore');
    Route::get('/exam/type/edit/{id}',[ExamTypeController::class,'EditExamType'])->name('edit.exam.type');
    Route::post('/exam/type/update/{id}',[ExamTypeController::class,'UpdateExamType'])->name('exam.type.update');
    Route::get('/exam/type/delete/{id}',[ExamTypeController::class,'DeleteExamType'])->name('delete.exam.type');

    // All Subject Routes

    Route::get('/subject/view',[SubjectController::class,'SubjectView'])->name('subject.view');
    Route::get('/subject/add',[SubjectController::class,'SubjectAdd'])->name('add.subject');
    Route::post('/subject/store',[SubjectController::class,'SubjectStore'])->name('subject.store');
    Route::get('/subject/edit{id}',[SubjectController::class,'SubjectEdit'])->name('edit.subject');
    Route::post('/subject/update{id}',[SubjectController::class,'SubjectUpdate'])->name('subject.update');
    Route::get('/subject/delete{id}',[SubjectController::class,'SubjectDelete'])->name('delete.subject');

    // Assgin subjects routes

    Route::get('/subject/assign/view',[AssignSubjectController::class,'AssignSubjecttView'])->name('assign.subject.view');
    Route::get('/subject/assign/add',[AssignSubjectController::class,'SubjectAssignAdd'])->name('add.assign.subject');
    Route::post('/subject/assign/store',[AssignSubjectController::class,'SubjectAssignStore'])->name('assign.subject.store');
    Route::get('/assign/subject/edit/{class_id}',[AssignSubjectController::class,'EditAssignSubject'])->name('assign.subject.edit');
    Route::post('/assign/subject/update{class_id}',[AssignSubjectController::class,'AssignSubjectUpdate'])->name('assign.subject.update');
    Route::get('/assign/subject/details{class_id}',[AssignSubjectController::class,'SubjectAssignDetails'])->name('assign.subject.detail');

    // Negaran list routs

    Route::get('/negaran/list/view', [AssignSubjectController::class, 'NegaranListView'])->name('negaran.list');

    // Designation all routes

    Route::get('/designation/view',[DesignationController::class,'DesignationView'])->name('designation.view');
    Route::get('/designation/add',[DesignationController::class,'DesignationAdd'])->name('add.designation');
    Route::post('/designation/store',[DesignationController::class,'DesignationStore'])->name('store.designation');
    Route::get('/designation/edit/{id}',[DesignationController::class,'DesignationEdit'])->name('edit.designation');
    Route::post('/designation/update/{id}',[DesignationController::class,'DesignationUpdate'])->name('designation.update');
    Route::get('/designation/delete/{id}',[DesignationController::class,'DesignationDelete'])->name('delete.designation');

    // All transportation routes 
    Route::get('/transportation/view', [TransportController::class, 'TransportationView'])->name('transportation.view');
    Route::get('/transportation/add', [TransportController::class, 'TransportationAdd'])->name('add.transport');
    Route::post('/transportation/store', [TransportController::class, 'TransportationStore'])->name('transport.restore');
    Route::get('/transportation/edit/{id}', [TransportController::class, 'TransportationEdit'])->name('transport.edit');
    Route::post('/transportation/update/{id}', [TransportController::class, 'TransportationUpdate'])->name('transport.update');
    Route::get('/transportation/delete/{id}', [TransportController::class, 'TransportationDelete'])->name('transport.delete');


});

    // All Students route
Route::prefix('Students')->group(function(){
    Route::get('/register/view',[StudentsRegistrationsController::class,'StudentRegistrationView'])->name('student.registration.view');
    Route::get('/register/add',[StudentsRegistrationsController::class,'StudentRegistrationAdd'])->name('add.student');
    Route::post('/register/store',[StudentsRegistrationsController::class,'StudentRegistrationStore'])->name('student.registration.store');
    Route::get('/year/class/agrade/wise',[StudentsRegistrationsController::class,'StudentYearClassGradeWise'])->name('student.year.class.grade.wise');
    Route::get('/registration/edit/{student_id}',[StudentsRegistrationsController::class,'StudentRegistrationEdit'])->name('student.registration.edit');
    Route::post('/registration/update/{student_id}',[StudentsRegistrationsController::class,'StudentRegistrationUpdate'])->name('student.registration.update');
    Route::get('/promotion/{student_id}',[StudentsRegistrationsController::class,'StudentPromotion'])->name('student.promotion');
    Route::post('/promotion/update/{student_id}',[StudentsRegistrationsController::class,'StudentPromotionUpdate'])->name('student.reg.promotion');
    Route::get('/details/{student_id}',[StudentsRegistrationsController::class,'StudentDetails'])->name('student.details');

    // Students Change status all routes
    Route::get('/change/status', [StudentsRegistrationsController::class, 'StudentsChangeStatus'])->name('student.change.status');

    // Fee Registration Fee all routes
    Route::get('/fee/registration/view',[FeeRegistrationController::class,'FeeRegistrationView'])->name('fee.registration.view');
    Route::get('/fee/registration/wise',[FeeRegistrationController::class,'FeeRegClassData'])->name('student.registration.fee.classwise.get');
    Route::get('/fee/registration/payslip',[FeeRegistrationController::class,'FeeRegPaySlip'])->name('student.registration.fee.payslip');

    // Monthly fee all routes
    Route::get('/monthly/fee/view',[MonthlyFeeController::class,'MonthlyFeeView'])->name('fee.monthly.view');
    Route::get('/monthly/fee/wise',[MonthlyFeeController::class,'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
    Route::get('/monthly/fee/payslip',[MonthlyFeeController::class,'MonthlyFeePaySlip'])->name('student.monthly.fee.payslip');

    // Stundents pay fee routes

    Route::get('monthly/pay/fee/{student_id}', [StudentsRegistrationsController::class, 'StudentMonthlyFee'])->name('student.pay.fee');

    // All students attendance routes
    Route::get('/attendance/view',[StudentAttendanceController::class, 'StudentAttendanceView'])->name('student.attendance.view');
    Route::get('/attendance/add',[StudentAttendanceController::class, 'StudentAttendanceAdd'])->name('add.students.attendance');

    // All students timetable routes
    Route::get('/timetable/view',[StudentTimetableController::class, 'StudentTimetableView'])->name('student.timetable.view');
    Route::get('/timetable/add',[StudentTimetableController::class, 'StudentTimetableAdd'])->name('student.timetable.add');
    Route::post('/timetable/store',[StudentTimetableController::class, 'StudentTimetableStore'])->name('student.timetable.store');
    Route::get('/timetable/edit/{class_id}',[StudentTimetableController::class, 'StudentTimetableEdit'])->name('student.timetable.edit');
    Route::post('/timetable/update/{class_id}',[StudentTimetableController::class, 'StudentTimetableUpdate'])->name('student.timetable.update');
    Route::get('/timetable/details/{class_id}',[StudentTimetableController::class, 'StudentTimetableDetails'])->name('student.timetable.detail');

    Route::get('/timetables/view/{class_id}', [StudentsRegistrationsController::class, 'StudentTimetableDetails'])->name('students.timetable');
}); 

Route::prefix('employee')->group(function(){
    Route::get('/registration/view',[EmployeeRegistrationController::class,'EmployeeRegistrationView'])->name('employee.registration.view');
    Route::get('/registration/add',[EmployeeRegistrationController::class,'EmployeeRegistrationAdd'])->name('add.employee');
    Route::post('/register/store',[EmployeeRegistrationController::class,'EmployeeRegistrationStore'])->name('employee.registration.store');
    Route::get('/registration/edit/{employee_id}',[EmployeeRegistrationController::class,'EmployeeRegistrationEdit'])->name('employee.registration.edit');
    Route::post('/register/update/{employee_id}',[EmployeeRegistrationController::class,'EmployeeRegistrationUpdate'])->name('employee.registration.update');
    Route::get('/details/{employee_id}',[EmployeeRegistrationController::class,'EmployeeDetails'])->name('employee.registration.details');
    Route::get('/registration/delete/{employee_id}',[EmployeeRegistrationController::class,'EmployeeDelete'])->name('employee.registration.delete');

    // All Employee salary route 
    Route::get('/salary/view',[EmployeeSalaryController::class,'EmployeeSalaryView'])->name('employee.salary.view');
    Route::get('/salary/increment/{id}',[EmployeeSalaryController::class,'EmployeeSalaryIncrement'])->name('employee.salary.incerement');
    Route::post('/salary/increment/update/{id}',[EmployeeSalaryController::class,'EmployeeSalaryIncrementUpdate'])->name('employee.increment.update');
    Route::get('/salary/details/{id}',[EmployeeSalaryController::class,'EmployeeSalaryDetails'])->name('employee.salary.details');

    // All Employee Decrement routes
    Route::get('/salary/decrement/{employee_id}',[EmployeeSalaryController::class, 'EmployeeSalaryDecrement'])->name('employee.salary.decrement');
    Route::post('/salary/decrement/update/{employee_id}',[EmployeeSalaryController::class, 'EmployeeSalaryDecrementUpdate'])->name('employee.decrement.update');
    Route::get('/salary/decremented/details/{id}', [EmployeeSalaryController::class, 'EmployeeDecrementdSalaryDetails'])->name('employee.decrement.salary.details');

    // All Employee leave routes
    Route::get('/leave/view',[EmployeeLeaveController::class, 'EmployeeLeaveView'])->name('employee.leave.view');
    Route::get('/leave/add',[EmployeeLeaveController::class, 'EmployeeLeaveAdd'])->name('add.leave');
    Route::post('/leave/store',[EmployeeLeaveController::class, 'EmployeeLeaveStore'])->name('employee.leave.store');
    Route::get('/leave/edit/{id}',[EmployeeLeaveController::class, 'EmployeeLeaveEdit'])->name('edit.employee.leave');
    Route::post('/leave/update/{id}',[EmployeeLeaveController::class, 'EmployeeLeaveUpdate'])->name('employee.leave.update');
    Route::get('/leave/delete/{id}',[EmployeeLeaveController::class, 'EmployeeLeaveDelete'])->name('delete.employee.leave');

    // All Employee Attendance routes

    Route::get('/attendance/view',[EmployeeAttendanceController::class, 'EmployeeAttendanceView'])->name('employee.attendance.view');
    Route::get('/attendance/add',[EmployeeAttendanceController::class, 'EmployeeAttendanceAdd'])->name('add.attendance');
    Route::post('/attendance/store',[EmployeeAttendanceController::class, 'EmployeeAttendanceStore'])->name('store.employee.attendance');
    Route::get('/attendance/edit/{date}',[EmployeeAttendanceController::class, 'EmployeeAttendanceEdit'])->name('employee.attendance.edit');
    Route::get('/attendance/details/{date}',[EmployeeAttendanceController::class, 'EmployeeAttendanceDetails'])->name('employee.attendance.details');

    // All Employee Monthly Salary routes

    Route::get('/employee/salary/view', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalaryView'])->name('employee.monthly.salary.view');
    Route::get('/employee/salary/get', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalaryGet'])->name('employee.monthly.salary.get');
    Route::get('/employee/salary/slip/{employee_id}', [EmployeeMonthlySalaryController::class, 'EmployeeMonthlySalarySlip'])->name('employee.monthly.salary.payslip');

    // All Teachers Timetable routes
    Route::get('/timetable/view',[TeacherTimetableController::class, 'TeacherTimetableView'])->name('teacher.timetable.view');
    Route::get('/timetable/add',[TeacherTimetableController::class, 'TeacherTimetableAdd'])->name('teacher.timetable.add');
    Route::post('/timetable/store',[TeacherTimetableController::class, 'TeacherTimetableStore'])->name('teacher.timetable.store');
    Route:: get('/timetable/edit/{employee_id}',[TeacherTimetableController::class, 'TeacherTimetableEdit'])->name('teacher.timetable.edit');
    Route::post('/timetable/update/{employee_id}', [TeacherTimetableController::class, 'TeacherTimetableUpdate'])->name('teacher.timetable.update');
    Route::get('/timetable/details/{employee_id}', [TeacherTimetableController::class, 'TeacherTimetableDetails'])->name('teacher.timetable.details');
}); 

Route::prefix('marks')->group(function(){
    Route::get('/view',[StudentMarksController::class, 'MarkView'])->name('marks.view');
    Route::get('/Add',[StudentMarksController::class,'MarksAdd'])->name('student.marks.view');
    Route::post('/entry/store',[StudentMarksController::class,'MarksEntryStore'])->name('marks.entry.store');
    Route::get('/entry/edit',[StudentMarksController::class,'MarksEntryEdit'])->name('student.marks.edit');
    Route::get('/getstudent/edit',[StudentMarksController::class,'MarksEntryGetStudent'])->name('student.edit.getstudents');
    Route::post('/entry/update',[StudentMarksController::class,'MarksEntryUpdate'])->name('marks.entry.update');
    Route::get('/details/{class_id}', [StudentMarksController::class, 'MarksDetails'])->name('marks.details');
 
    // All marks grade routes 

    Route::get('/grade/view', [StudentGradeController::class, 'MarksGradeView'])->name('marks.grade.view');
    Route::get('/grade/add', [StudentGradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');
    Route::post('/grade/store', [StudentGradeController::class, 'MarksGradeStore'])->name('marks.grade.store');
    Route::get('/grade/edit/{id}', [StudentGradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
    Route::post('/grade/update/{id}', [StudentGradeController::class, 'MarksGradeUpdate'])->name('marks.grade.update');
    Route::get('/grade/delete/{id}', [StudentGradeController::class, 'MarksGradeDelete'])->name('marks.grade.delete');

});
    Route::get('students/marks/getsubjects',[DefaultController::class,'GetSubject'])->name('marks.getsubject');
    Route::get('students/marks/getstudents',[DefaultController::class,'GetStudents'])->name('student.marks.getstudents');

    // All student fee from finance management routes 
Route::prefix('finance')->group(function(){
    Route::get('/student/view',[StudentFeeController::class,'StudentsFeeView'])->name('student.fee.view');
    Route::get('/student/add',[StudentFeeController::class,'StudentsFeeAdd'])->name('student.fee.add');
    Route::get('/student/fee/getstudent',[StudentFeeController::class,'FianceFeeGetStsudent'])->name('finance.fee.getstudent');
    Route::post('/student/fee/store',[StudentFeeController::class,'FianceFeeStore'])->name('finance.fee.store');
    
    // All Finance employee monthly salary routes
    Route::get('/employee/view',[EmployeeFinanceController::class,'EmployeeSalaryView'])->name('finance.employee.salary');
    Route::get('/employee/add',[EmployeeFinanceController::class,'EmployeeSalaryAdd'])->name('employee.salary.add');
    Route::get('/salary/getemployee',[EmployeeFinanceController::class,'EmployeeSalaryGetEmployee'])->name('finance.salary.getemployee');
    Route::post('/salary/store',[EmployeeFinanceController::class,'EmployeeSalaryStore'])->name('finance.salary.store');

    // All Other Cost here
    Route::get('/other/cost/view',[OtherCostController::class,'OtherCostView'])->name('other.cost.view');
    Route::get('/other/cost/add',[OtherCostController::class,'OtherCostAdd'])->name('other.cost.add');
    Route::post('/other/cost/store',[OtherCostController::class,'OtherCostStore'])->name('other.cost.store');
    Route::get('/other/cost/edit/{id}',[OtherCostController::class,'OtherCostEdit'])->name('other.cost.edit');
    Route::post('/other/cost/update/{id}',[OtherCostController::class,'OtherCostUpdate'])->name('other.cost.update');
    Route::get('/other/cost/delete/{id}',[OtherCostController::class,'OtherCostDelete'])->name('other.cost.delete');
    });
    
Route::prefix('report')->group(function(){
        Route::get('Monthly/profit/view',[ProfitController::class,'MonthlyProfitView'])->name('monthly.profit.view');
        Route::get('Monthly/profit/dateget',[ProfitController::class,'MonthlyProfitDateGet'])->name('profit.datewise.get');
        Route::get('/profit/pdf',[ProfitController::class,'ReprotProfitPdf'])->name('reports.profit.pdf');

        // All Mark sheet routes
        Route::get('/mark/sheet/view',[MarkSheetController::class,'MarkSheetGenerateView'])->name('mark.sheet.view');
        Route::get('/mark/sheet/get',[MarkSheetController::class,'MarkSheetGet'])->name('mark.sheet.get');

        // All Employee Attendance Reports routes
        Route::get('/employee/attendance/view',[EmployeeAttendanceReportController::class,'EmployeeAttendanceView'])->name('monthly.employee.attendance.view');
        Route::get('/employee/attendance/get',[EmployeeAttendanceReportController::class,'EmployeeAttendanceGet'])->name('employee.attendance.get');
    });
});

});