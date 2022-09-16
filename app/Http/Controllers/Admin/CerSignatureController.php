<?php

namespace App\Http\Controllers\Admin;

use App\Models\CerSignature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CerSignatureController extends Controller
{
    public function index()
    {
        // if ($error = $this->authorize('course-cat-manage')) {
        //     return $error;
        // }
        $cerSignatures = CerSignature::all();
        return view('admin.cer_signature.index', compact('cerSignatures'));
    }

    public function create()
    {
        // if ($error = $this->authorize('course-cat-add')) {
        //     return $error;
        // }
        if(CerSignature::count() >= 2){
            Alert::info('You can add maximum two signature');
            return back();
        }
        return view('admin.cer_signature.create');
    }

    public function store(Request $request)
    {
        // if ($error = $this->authorize('course-cat-add')) {
        //     return $error;
        // }

        $data = $request->validate([
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:500',
        ]);
        $data['image'] = imageStore($request, 'signature', 'uploads/images/signature/');

        try {
            CerSignature::create($data);
            toast('Success', 'success!');
            return redirect()->route('certificate-signature.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function edit($id)
    {
        // if ($error = $this->authorize('course-cat-edit')) {
        //     return $error;
        // }
        $cerSignature = CerSignature::find($id);
        return view('admin.cer_signature.edit', compact('cerSignature'));
    }

    public function update(Request $request, $id)
    {
        // if ($error = $this->authorize('course-cat-edit')) {
        //     return $error;
        // }
        $data = $request->validate([
            'name' => 'sometimes|string|max:191',
            'designation' => 'sometimes|string|max:191',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:500',
        ]);

        $image = CerSignature::find($id)->image;
        if($request->hasFile('image')){
            $data['image'] = imageUpdate($request, 'signature', 'uploads/images/signature/', $image);
        }
        try {
            CerSignature::find($id)->update($data);
            toast('Success', 'success!');
            return redirect()->route('certificate-signature.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('Error', 'error');
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
