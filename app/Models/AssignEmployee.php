<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignEmployee extends Model
{
    public function employee(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
    public function designation(){
        return $this->belongsTo(Designation::class,'disgnation_id','id');
    }

    public function SalaryLog(){
        return $this->belongsTo(EmployeeSalaryLog::class,'employee_id','id');
    }

}
