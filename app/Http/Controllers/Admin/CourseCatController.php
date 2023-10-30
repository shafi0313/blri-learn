<?php

namespace App\Http\Controllers\Admin;

use App\Models\CourseCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseCatController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('course-cat-manage')) {
            return $error;
        }
        $courseCats = CourseCat::all();
        return view('admin.course_cat.index', compact('courseCats'));
    }

    public function create()
    {
        if ($error = $this->authorize('course-cat-add')) {
            return $error;
        }
        return view('admin.course_cat.create');
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('course-cat-add')) {
            return $error;
        }
        $data = $request->validate([
            'name' => 'required|max:191',
            'image' => 'nullable|image|mimes:png|max:500',
        ]);

        $data['image'] = imageStore($request, 'course_cat', 'uploads/images/course/');

        try {
            CourseCat::create($data);
            toast('Success!', 'success');
            return redirect()->route('admin.courser-categories.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('Error', 'error');
            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('course-cat-edit')) {
            return $error;
        }
        $courseCat = CourseCat::find($id);
        return view('admin.course_cat.edit', compact('courseCat'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('course-cat-edit')) {
            return $error;
        }
        $data = $request->validate([
            'name' => 'required|max:191',
            'image' => 'nullable|image|mimes:png|max:500',
        ]);

        $image = CourseCat::find($id)->image;
        if ($request->hasFile('image')) {
            $data['image'] = imageUpdate($request, 'course_cat', 'uploads/images/course/', $image);
        }

        try {
            CourseCat::find($id)->update($data);
            toast('Success', 'success');
            return redirect()->route('admin.courser-categories.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('Error', 'error');
            return back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->authorize('course-cat-delete')) {
            return $error;
        }
        $data = CourseCat::find($id);
        fileDestroy('uploads/images/course/', $data);
        return back();
    }
}
