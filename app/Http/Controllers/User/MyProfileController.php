<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Layout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MyProfileController extends Controller
{
    public function edit()
    {
        $user = User::find(auth()->user()->id);
        return view('user.my_profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_b' => 'nullable',
            'name_cer' => 'required',
            'fa_name' => 'nullable',
            'mo_name' => 'nullable',
            'd_o_b' => 'required|date',
            'gender' => 'required',
            'nid' => 'nullable',
            'text' => 'nullable',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        if($request->hasFile('image')){
            $path = public_path().'/uploads/images/users';
            if (!file_exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $image = $request->file('image');
            $imageName = "user_".rand(0, 10000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/users/', $imageName);
            $data['image'] = $imageName;
        }
        try{
            User::find(auth()->user()->id)->update($data);
            toast('Success','success');
            return back();
        }catch(\Exception $e){
            return $e->getMessage();
            toast('Failed','error');
            return back();
        }
    }
}
