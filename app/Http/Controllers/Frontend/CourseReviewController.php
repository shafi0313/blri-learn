<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseReview;
use Illuminate\Http\Request;

class CourseReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'course_id' => 'required',
            'name' => 'required|max:80',
            'email' => 'required|max:50',
            'subject' => 'required|max:255',
            'msg' => 'required',
            'ratings' => 'required',
        ]);
        // return $data;

        try {
            CourseReview::create($data);
            Alert::success('Success', 'This information has been added successfully');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
            return back();
        }
    }
}
