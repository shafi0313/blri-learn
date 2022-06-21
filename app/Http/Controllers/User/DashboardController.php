<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use App\Models\CompletedCourse;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::count();
        $course = CourseEnroll::with('course')->whereUser_id(auth()->user()->id);
        $runningCourse = $course->whereStatus(0)->get()->groupBy('course_id');
        $uncompletedCourses = $course->whereStatus(1)->get()->groupBy('course_id');
        $completeCourses = CompletedCourse::with('course')->whereUser_id(auth()->user()->id)->get();
        return view('user.dashboard', compact('runningCourse','completeCourses','uncompletedCourses'));
    }
}
