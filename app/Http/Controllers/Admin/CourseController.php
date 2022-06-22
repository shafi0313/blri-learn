<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Layout;
use App\Models\CourseCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('course-manage')) {
            return $error;
        }
        $layout = Layout::where('user_id', auth()->user()->id)->first(['tbl','tbl_bg','tbl_text','create_btn']);
        $courses = Course::whereUser_id(auth()->user()->id)->get();
        return view('admin.course.index', compact('layout','courses'));
    }

    public function create()
    {
        if ($error = $this->authorize('course-add')) {
            return $error;
        }
        $user = auth()->user();
        $layout = Layout::where('user_id', $user->id)->first(['create_btn']);
        $courseCats = CourseCat::all();
        return view('admin.course.create', compact('layout','courseCats'));
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('course-add')) {
            return $error;
        }
        $data = $this->validate($request, [
            'course_cat_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'video_des' => 'nullable',
            'skill_level' => 'required',
            'language' => 'required',
            'status' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1000',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = "course".rand(0, 1000000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/course/', $imageName);
        }
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $imageName;

        try {
            Course::create($data);
            toast('Success!', 'success');
            return redirect()->route('course.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        if ($error = $this->authorize('course-delete')) {
            return $error;
        }
        $course = Course::find($id);
        $path =  public_path('uploads/images/course/'.$course->image);
        try {
            if (file_exists($path)) {
                unlink($path);
                $course->delete();
                toast('Successfully Deleted', 'success');
            } else {
                $course->delete();
                toast('Successfully Deleted', 'success');
            }
            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }
}
