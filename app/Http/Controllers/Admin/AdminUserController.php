<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Layout;
use App\Models\ModelHasRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.admin_user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.admin_user.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:100',
            'designation' => 'nullable',
            'permission' => 'required',
            'phone' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'd_o_b' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'password' => ['required', 'confirmed', Password::min(6)
                                                            // ->letters()
                                                            // ->mixedCase()
                                                            // ->numbers()
                                                            // ->symbols()
                                                            // ->uncompromised()
                                                        ],
        ]);

        DB::beginTransaction();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = "user_photo".rand(0,1000000).'.'.$image->getClientOriginalExtension();
            $request->image->move('uploads/images/users/',$image_name);
            $data['image'] = $image_name;
        }
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        if($request->permission){
            $permissionData = [
                'role_id' =>  $request->permission,
                'model_type' => "App\Models\User",
                'model_id' =>  $user->id,
            ];
            ModelHasRole::create($permissionData);
        }

        try{
            DB::commit();
            toast('Success!','success');
            return redirect()->route('admin.adminUser.index');
        }catch(\Exception $ex){
            DB::rollBack();
            toast('error','Error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.admin_user.edit', compact('user'));
    }

    public function update(Request $request)
    {

    }


    public function destroy($id)
    {

    }
}
