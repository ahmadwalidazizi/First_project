<?php

namespace App\Http\Controllers\Backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\AssignSubject;
use App\Models\AssignEmployee;
use App\Models\User;
 
class AssignSubjectController extends Controller
{
    public function AssignSubjecttView(){
        //$data ['allData'] = AssignSubject::all();
        $data ['allData'] = AssignSubject::select('class_id')->groupby('class_id')->get();
        return view('Backend.setup.assign_subject.view_assign_subject',$data);
   }
   public function SubjectAssignAdd(){
       $data ['subjects'] = Subject::all();
       $data ['classes'] = StudentClass::all();
       //$data ['groups'] = StudentGroup::all();
       $data ['teachers'] = User::where('usertype','Employee')->get();
       return view('Backend.setup.assign_subject.add_assign_subject',$data);
   }
   public function SubjectAssignStore(Request $request){
       $countSubject = count($request->subject_id);
       if ($countSubject != NULL) {
           for ($i=0; $i < $countSubject ; $i++) { 
               $assign_subject = new AssignSubject();
               $assign_subject  -> class_id = $request->class_id;
               //$assign_subject  -> group_id = $request->group_id;
               $assign_subject  -> negaran = $request->negaran;
               $assign_subject  -> subject_id = $request->subject_id[$i];
               $assign_subject  -> full_mark = $request->full_mark[$i];
               $assign_subject  -> pass_mark = $request->pass_mark[$i];
               $assign_subject  -> teacher_id = $request->teacher_id[$i];
               $assign_subject  -> save();
           }
       }
       $notification = array(
           'message' => 'Assign Subject inserted successfully',
           'alert-type' => 'success'
       );
       return redirect()->route('assign.subject.view')->with($notification);
   }
   public function EditAssignSubject($class_id){
       $data ['editData'] = AssignSubject::where('class_id',$class_id)->orderby('class_id','asc')->get();
       $data ['subjects'] = Subject::all();
       $data ['classes'] = StudentClass::all();
       //$data ['groups'] = StudentGroup::all();
       $data ['teachers'] = User::where('usertype','Employee')->get();
       return view('Backend.setup.assign_subject.edit_assgin_subject',$data);
   }

   public function AssignSubjectUpdate(Request $request, $class_id){
       if ($request -> subject_id == NULL) {
           $notification = array(
               'message' => 'Sorry you do not select any item',
               'alert-type' => 'error'
           );
           return redirect()->route('assign.subject.edit',$class_id)->with($notification);
       } else {
           
           $countClass = count($request->subject_id);
           AssignSubject::where('class_id',$class_id)->delete();
           for ($i=0; $i < $countClass ; $i++) { 
               $assign_subject = new AssignSubject();
               $assign_subject  -> class_id = $request->class_id;
               //$assign_subject  -> group_id = $request->group_id;
               $assign_subject  -> negaran = $request->negaran;
               $assign_subject  -> subject_id = $request->subject_id[$i];
               $assign_subject  -> full_mark = $request->full_mark[$i];
               $assign_subject  -> pass_mark = $request->pass_mark[$i];
               $assign_subject  -> teacher_id = $request->teacher_id[$i];
               $assign_subject  -> save();
           }
       $notification = array(
           'message' => 'Assign subject updated successfully',
           'alert-type' => 'info'
       );
       return redirect()->route('assign.subject.view')->with($notification);
       }

       $notification = array(
           'message' => 'Classes fee amount updated successfully',
           'alert-type' => 'info'
       );
       return redirect()->route('fee.amount.view',$fee_catagory_id)->with($notification);
       
   }

   public function SubjectAssignDetails($class_id){
       $data ['detailsData'] = AssignSubject::where('class_id',$class_id)->orderby('subject_id','asc')->get();
       return view('Backend.setup.assign_subject.assign_subject_detail',$data);
   }

   public function NegaranListView(){
       $data ['allData'] = AssignSubject::select('class_id','negaran')->groupby('class_id','negaran')->get();
       return view('Backend.setup.assign_subject.negaran_list', $data);
   }
}
