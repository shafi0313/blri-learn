<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCat;
use Illuminate\Http\Request;

class CourseByCatController extends Controller
{
    public function index($courseId)
    {
        $course = CourseCat::find($courseId);
        $courses = Course::whereId($courseId)->get();
        return view('frontend.course_by_cat', compact('courses','course'));
    }
}
