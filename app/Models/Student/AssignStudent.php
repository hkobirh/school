<?php

namespace App\Models\Student;

use App\Models\StudentClass;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function year(){
        return $this->belongsTo(Year::class,'year_id','id');
    }
    public function discount(){
        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }
}
