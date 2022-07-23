<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFinanceFee extends Model
{
    public function student(){
        return $this->belongsTo(User::class, 'student_id','id');
    }

    public function assginStudent(){
        return $this->belongsTo(AssignStudents::class, 'assgin_student_id','id');
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

    public function feecatagory(){
        return $this->belongsTo(FeeCatagory::class, 'fee_catagory_id','id');
    }
}

