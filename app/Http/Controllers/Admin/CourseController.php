<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\CourseCat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        if ($error = $this->authorize('course-manage')) {
            return $error;
        }
        $courses = Course::whereUser_id(auth()->user()->id)->get();
        if ($request->ajax()) {
            return DataTables::of($courses)
                ->addIndexColumn()
                ->addColumn('description', function ($row) {
                    return Str::limit($row->description, 50);
                })
                ->addColumn('image', function ($row) {
                    return '<img src="'.imagePath('course',$row->image).'" width="60px">';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= view('button', ['type' => 'edit', 'route' => 'admin.course', 'row' => $row]);
                    $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.course.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                    return $btn;
                })
                ->rawColumns(['description','image','created_at', 'action'])
                ->make(true);
        }

        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        if ($error = $this->authorize('course-add')) {
            return $error;
        }
        $courseCats = CourseCat::all();
        return view('admin.course.create', compact('courseCats'));
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
            return redirect()->route('admin.course.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }


    public function edit($id)
    {
        if ($error = $this->authorize('course-edit')) {
            return $error;
        }
        $course = Course::find($id);
        $courseCats = CourseCat::all();
        return view('admin.course.edit', compact('course','courseCats'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('course-edit')) {
            return $error;
        }
        $data = $request->validate([
            'course_cat_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'video_des' => 'nullable',
            'skill_level' => 'required',
            'language' => 'required',
            'status' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1000',
        ]);
        $data['user_id'] = auth()->user()->id;
        $image = Course::find($id)->image;
        if($request->hasFile('image')){
            $data['image'] = imageUpdate($request, 'course', 'uploads/images/course/', $image);
        }

        try {
            Course::find($id)->update($data);
            toast('Success!', 'success');
            return redirect()->route('admin.course.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->authorize('course-delete')) {
            return $error;
        }
        $data = Course::find($id);
        fileDestroy('uploads/images/course/', $data);
        return back();
    }
}
