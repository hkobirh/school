<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFeeAmount extends Model
{
    use HasFactory;
    protected $fillable = ['fee_category_id','class_id','amount'];

    public function fee_categoryis(){
        return $this->belongsTo(StudentFeeCategory::class ,'fee_category_id','id');
    }
    public function class_name(){
        return $this->belongsTo(StudentClass::class ,'class_id','id');
    }
}
