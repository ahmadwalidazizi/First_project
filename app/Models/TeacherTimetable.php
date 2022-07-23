<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherTimetable extends Model
{
    public function Teachers(){
        return $this->belongsTo(AssignEmployee::class, 'employee_id', 'id');
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

    public function class1(){
        return $this->belongsTo(StudentClass::class, 'class_1', 'id');
    }

    public function class2(){
        return $this->belongsTo(StudentClass::class, 'class_2', 'id');
    }
    public function class3(){
        return $this->belongsTo(StudentClass::class, 'class_3', 'id');
    }
    
    public function class4(){
        return $this->belongsTo(StudentClass::class, 'class_4', 'id');
    }
    
    public function class5(){
        return $this->belongsTo(StudentClass::class, 'class_5', 'id');
    }
    
    public function class6(){
        return $this->belongsTo(StudentClass::class, 'class_6', 'id');
    }

    public function class7(){
        return $this->belongsTo(StudentClass::class, 'class_7', 'id');
    }
}
