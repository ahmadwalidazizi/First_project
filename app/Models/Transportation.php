<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    public function drive(){
        return $this->belongsTo(AssignEmployee::class, 'employee_id','id');
    }
}
