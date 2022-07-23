<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model 
{
    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function Student_group(){
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }

    public function student_subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function teachers(){
        return $this->belongsTo(User::class, 'teacher_id','id');
    }

    public function negarans(){
        return $this->belongsTo(User::class, 'negaran','id');
    }
}
