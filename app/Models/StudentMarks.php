<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    public function student(){
        return $this->belongsTo(User::class, 'student_id','id');
    }

    public function studentAssign(){
        return $this->belongsTo(AssignStudents::class, 'assign_id', 'id');
    }

    public function subject(){
        return $this->belongsTo(AssignSubject::class, 'assign_subject_id', 'id');
    } 

    public function grade(){
        return $this->belongsTo(StudentGroup::class, 'group_id', 'id');
    }

    public function class(){
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function examtype(){
        return $this->belongsTo(Examtype::class, 'exam_type_id', 'id');
    }
    
}
