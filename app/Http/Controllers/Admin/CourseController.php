<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\CourseCat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        // if ($error = $this->authorize('course-manage')) {
        //     return $error;
        // }
        // $courses = Course::whereUser_id(auth()->user()->id)->get();
        if ($request->ajax()) {
            $courses = Course::whereUser_id(auth()->user()->id);
            return DataTables::of($courses)
                ->addIndexColumn()
                ->addColumn('description', function ($row) {
                    return Str::limit($row->description, 50);
                })
                ->addColumn('image', function ($row) {
                    return '<img src="' . imagePath('course', $row->image) . '" width="60px">';
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
                ->rawColumns(['description', 'image', 'created_at', 'action'])
                ->make(true);
        }

        return view('admin.course.index');
    }

    public function create()
    {
        if ($error = $this->authorize('course-add')) {
            return $error;
        }
        $courseCats = CourseCat::all();
        return view('admin.course.create', compact('courseCats'));
    }

    public function store(StoreCourseRequest $request)
    {
        if ($error = $this->authorize('course-add')) {
            return $error;
        }
        $data = $request->validated();
        $data['user_id'] = user()->id;

        if ($request->hasFile('image')) {
            $image = Image::make($request->file('image'));
            if ($image->width() > 270 || $image->height() > 180) {
                $image->fit(270, 180);
            }
            $dir = public_path('/uploads/images/course');
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $imageName = 'course-' . uniqueId(10) . '.webp';
            $image->encode('webp', 80)->save($dir . '/' . $imageName);
            $data['image'] = $imageName;
        }

        try {
            Course::create($data);
            toast('Success!', 'success');
            return redirect()->route('admin.course.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('course-edit')) {
            return $error;
        }
        $course     = Course::find($id);
        $courseCats = CourseCat::all();
        return view('admin.course.edit', compact('course', 'courseCats'));
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        if ($error = $this->authorize('course-edit')) {
            return $error;
        }
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $oldImage = Course::find($id)->image;
        if ($request->hasFile('image')) {
            $image = Image::make($request->file('image'));
            if ($image->width() > 270 || $image->height() > 180) {
                $image->fit(270, 180);
            }
            $dir = public_path('/uploads/images/course');
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $imageName = 'course-' . uniqueId(10) . '.webp';
            $image->encode('webp', 80)->save($dir . '/' . $imageName);

            $checkPath = public_path("uploads/images/course/{$oldImage}");
            if ($oldImage && file_exists($checkPath)) {
                unlink($checkPath);
            }
            $data['image'] = $imageName;
        }

        try {
            Course::find($id)->update($data);
            toast('Success!', 'success');
            return redirect()->route('admin.course.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
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
