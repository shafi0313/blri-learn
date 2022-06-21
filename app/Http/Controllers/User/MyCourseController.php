<?php

namespace App\Http\Controllers\User;

use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use App\Models\CompletedCourse;
use App\Http\Controllers\Controller;

class MyCourseController extends Controller
{
    public function index(){
        $runningCourse = CourseEnroll::with('course')->whereUser_id(auth()->user()->id)->whereStatus(0)->get()->groupBy('course_id');
        $completeCourses = CompletedCourse::whereUser_id(auth()->user()->id)->get();
        $uncompletedCourses  = CompletedCourse::whereUser_id(auth()->user()->id)->get();
        return view('user.my_course.index', compact('runningCourse','completeCourses','uncompletedCourses'));
    }
}
