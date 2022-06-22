<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layout;
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
        $layout = Layout::where('user_id', auth()->user()->id)->first(['tbl','tbl_bg','tbl_text','create_btn']);
        $courseCats = CourseCat::all();
        return view('admin.course_cat.index', compact('layout','courseCats'));
    }

    public function create()
    {
        if ($error = $this->authorize('course-cat-add')) {
            return $error;
        }
        $layout = Layout::where('user_id', auth()->user()->id)->first(['submit_btn']);
        return view('admin.course_cat.create', compact('layout'));
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
            toast('success', 'Success!');
            return redirect()->route('admin.courseCat.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('course-cat-edit')) {
            return $error;
        }
        $layout = Layout::where('user_id', auth()->user()->id)->first(['submit_btn']);
        $slider = CourseCat::find($id);
        return view('admin.course_cat.edit', compact('layout','slider'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('course-cat-edit')) {
            return $error;
        }
        $data = $this->validate($request, [
            'title' => 'sometimes|max:80',
            'text' => 'sometimes',
            'link' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            // 'image' => 'required|dimensions:max_width=1920,max_height=718',
        ]);
        if($request->hasFile('image')){
            $files = Slider::where('id', $id)->first();
            $path =  public_path('uploads/images/slider/'.$files->image);
            file_exists($path)?unlink($path):false;

            $image = $request->file('image');
            $imageName = "slider".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/images/slider/');
            $img = Image::make($image->getRealPath());
            $img->resize(1920, 718)->save($destinationPath.'/'.$imageName);
            $data['image'] = $imageName;
        }

        try {
            Slider::find($id)->update($data);
            toast('success', 'Success!');
            return redirect()->route('admin.course_cat.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->authorize('chapter-delete')) {
            return $error;
        }
        $slider = Slider::find($id);
        $path =  public_path('uploads/images/slider/'.$slider->image);
        if(file_exists($path)){
            unlink($path);
            $slider->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }else{
            $slider->delete();
            toast('Successfully Deleted','success');
            return redirect()->back();
        }
    }
}
