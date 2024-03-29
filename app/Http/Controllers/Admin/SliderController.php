<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('slider-manage')) {
            return $error;
        }
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        if ($error = $this->authorize('slider-add')) {
            return $error;
        }
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('slider-add')) {
            return $error;
        }
        $data = $this->validate($request, [
            'title' => 'sometimes|max:80',
            'text' => 'sometimes',
            'link' => 'sometimes',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            // 'image' => 'required|dimensions:max_width=1920,max_height=718',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = "slider" . rand(0, 10000) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/images/slider/');
            $img = Image::make($image->getRealPath());
            $img->resize(1920, 1080)->save($destinationPath . '/' . $imageName);
            $data['image'] = $imageName;
        }

        try {
            Slider::create($data);
            toast('Success!', 'success');
            return redirect()->route('admin.slider.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
            return back();
        }
    }

    public function edit($id)
    {
        if ($error = $this->authorize('slider-edit')) {
            return $error;
        }
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        if ($error = $this->authorize('slider-edit')) {
            return $error;
        }
        $data = $this->validate($request, [
            'title' => 'sometimes|max:80',
            'text' => 'sometimes',
            'link' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            // 'image' => 'required|dimensions:max_width=1920,max_height=718',
        ]);
        if ($request->hasFile('image')) {
            $files = Slider::where('id', $id)->first();
            $path =  public_path('uploads/images/slider/' . $files->image);
            file_exists($path) ? unlink($path) : false;

            $image = $request->file('image');
            $imageName = "slider" . rand(0, 10000) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/images/slider/');
            $img = Image::make($image->getRealPath());
            $img->resize(1920, 718)->save($destinationPath . '/' . $imageName);
            $data['image'] = $imageName;
        }

        try {
            Slider::find($id)->update($data);
            toast('Success!', 'success');
            return redirect()->route('admin.slider.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
            return back();
        }
    }

    public function destroy($id)
    {
        if ($error = $this->authorize('slider-delete')) {
            return $error;
        }
        $slider = Slider::find($id);
        $path =  public_path('uploads/images/slider/' . $slider->image);
        try {
            if (file_exists($path)) {
                unlink($path);
            }
            $slider->delete();
            Alert::success('Success', 'Successfully Deleted');
            return redirect()->back();
        } catch (\Exception $ex) {
            Alert::error('Oops...', 'Delete Failed');
            return back();
        }
    }
}
