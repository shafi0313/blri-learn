<?php

namespace App\Http\Controllers\User;

use App\Models\Lecture;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseEnrollController extends Controller
{
    public function enroll(Request $request)
    {
        $courseId = $request->course_id;
        $lectures = Lecture::whereCourse_id($courseId)->get(['id','course_id']);
        foreach($lectures as $key => $lecture){
            $data = [
                'user_id' => auth()->user()->id,
                'course_id' => $lecture->course_id,
                'lecture_id' => $lecture->id,
            ];
            CourseEnroll::create($data);
        }
        toast('Success','success');
        return redirect()->route('user.lecture.show',$courseId);

    }
}
