<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    public function courses(){
        return $this->belongsToMany(CourseModel::class, 'student_courses', 'student_id', 'course_id');
    }
}
