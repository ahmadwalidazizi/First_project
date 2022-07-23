<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudents extends Model
{
    public function student(){
        return $this->belongsTo(User::class, 'student_id','id');
    }
    
    public function studentClass(){
        return $this->belongsTo(StudentClass::class, 'class_id','id');
    }

    public function studentYear(){
        return $this->belongsTo(StudentYear::class, 'year_id','id');
    }

    public function studentGrade(){
        return $this->belongsTo(StudentGroup::class, 'group_id','id');
    }

    public function discountStudent(){
        return $this->belongsTo(StudentDiscount::class,'id','assign_students_id');
    }

    public function studentShift(){
        return $this->belongsTo(StudentShift::class, 'shift_id','id');
    }
    
    public function transport(){
        return $this->belongsTo(Transportation::class, 'transport_id','id');
    }

    //timetable models relationship

    public function class(){
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function subjects(){
        return $this->belongsTo(Subject::class, 'subject_1' , 'id');
    }

    public function subjects2(){
        return $this->belongsTo(Subject::class, 'subject_2', 'id');
    }

    public function subjects3(){
        return $this->belongsTo(Subject::class, 'subject_3', 'id');
    }

    public function subjects4(){
        return $this->belongsTo(Subject::class, 'subject_4', 'id');
    }

    public function subjects5(){
        return $this->belongsTo(Subject::class, 'subject_5', 'id');
    }

    public function subjects6(){
        return $this->belongsTo(Subject::class, 'subject_6', 'id');
    }

    public function subjects7(){
        return $this->belongsTo(Subject::class, 'subject_7', 'id');
    }

    public function teacher1(){
        return $this->belongsTo(AssignEmployee::class, 'teacher_1', 'id');
    }

    public function teacher2(){
        return $this->belongsTo(AssignEmployee::class, 'teacher_2', 'id');
    }

    public function teacher3(){
        return $this->belongsTo(AssignEmployee::class, 'teacher_3', 'id');
    }

    public function teacher4(){
        return $this->belongsTo(AssignEmployee::class, 'teacher_4', 'id');
    }

    public function teacher5(){
        return $this->belongsTo(AssignEmployee::class, 'teacher_5', 'id');
    }

    public function teacher6(){
        return $this->belongsTo(AssignEmployee::class, 'teacher_6', 'id');
    }

    public function teacher7(){
        return $this->belongsTo(AssignEmployee::class, 'teacher_7', 'id');
    }
}
