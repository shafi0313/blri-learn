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
        $layout = Layout::where('user_id', auth()->user()->id)->first(['tbl','tbl_bg','tbl_text','create_btn']);
        $courseCats = CourseCat::all();
        return view('admin.course_cat.index', compact('layout','courseCats'));
    }

    public function create()
    {
        $layout = Layout::where('user_id', auth()->user()->id)->first(['submit_btn']);
        return view('admin.course_cat.create', compact('layout'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'sometimes|max:191',
        ]);

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
        $layout = Layout::where('user_id', auth()->user()->id)->first(['submit_btn']);
        $slider = CourseCat::find($id);
        return view('admin.course_cat.edit', compact('layout','slider'));
    }

    public function update(Request $request, $id)
    {
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
