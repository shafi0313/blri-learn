<?php

namespace App\Http\Controllers\Admin;

use App\Models\CourseCat;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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
            'name'  => 'required|max:191',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = Image::make($request->file('image'));
            if ($image->width() > 140 || $image->height() > 140) {
                $image->fit(140, 140);
            }
            $dir = public_path('/uploads/images/course');
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $imageName = 'course-cat-' . uniqueId(10) . '.webp';
            $image->encode('webp', 80)->save($dir . '/' . $imageName);
            $data['image'] = $imageName;
        }

        try {
            CourseCat::create($data);
            toast('Success!', 'success');
            return redirect()->route('admin.courser-categories.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
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

        $oldImage = CourseCat::find($id)->image;
        if ($request->hasFile('image')) {
            $image = Image::make($request->file('image'));
            if ($image->width() > 140 || $image->height() > 140) {
                $image->fit(140, 140);
            }
            $dir = public_path('/uploads/images/course');
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $imageName = 'course-cat-' . uniqueId(10) . '.webp';
            $image->encode('webp', 80)->save($dir . '/' . $imageName);

            $checkPath = public_path("uploads/images/course/{$oldImage}");
            if ($oldImage && $checkPath) {
                unlink($checkPath);
            }
            $data['image'] = $imageName;
        }

        try {
            CourseCat::find($id)->update($data);
            toast('Success', 'success');
            return redirect()->route('admin.courser-categories.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
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
