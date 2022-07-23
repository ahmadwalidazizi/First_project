<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksGrade extends Model
{

    public function examtypes(){
        return $this->belongsTo(Examtype::class,'examtype','id');
    }
}
