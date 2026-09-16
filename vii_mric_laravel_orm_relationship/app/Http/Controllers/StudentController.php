<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = StudentModel::orderBy('id')->with('courses')->get();
        return $students;
    }
}
