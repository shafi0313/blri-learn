<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Course;
use App\Models\Slider;
use App\Models\Chapter;
use App\Models\Lecture;
use App\Models\CourseCat;
use App\Models\CourseReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class IndexController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('BLRI E-Learning Platform | Livestock Management & Agriculture Courses');
        $courses    = Course::with(['category','user','courseReviews','enrollCounts'])->get();
        $sliders    = Slider::whereStatus(1)->get();
        $student    = User::wherePermission(2)->count();
        $categories = CourseCat::all();
        return view('frontend.index', compact('courses','sliders','student','categories'));
    }

    public function courseDetails($id)
    {
        $course         = Course::with(['enrollCounts','user'])->find($id);
        $chapters       = Chapter::with('lectures')->whereCourse_id($id)->get();
        $coursesReviews = CourseReview::whereCourse_id($id)->get();
        $courseCount    = User::whereId($course->user_id)->count();
        $lectureCount   = Lecture::whereCourse_id($id)->count();

        return view('frontend.course_details', compact('course','chapters','coursesReviews','courseCount','lectureCount'));
    }



}
