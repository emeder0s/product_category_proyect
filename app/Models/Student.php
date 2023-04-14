<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Student extends Model
{
    use HasFactory;

    public function subjects(){
        return $this->belongsToMany(Subject::class,'student_subject');
    }
}
