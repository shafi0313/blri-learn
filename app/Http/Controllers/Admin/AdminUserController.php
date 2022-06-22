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
use Spatie\Permission\Models\Role;
class AdminUserController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('user-manage')) {
            return $error;
        }
        $users = User::all();
        return view('admin.admin_user.index', compact('users'));
    }

    public function create()
    {
        if ($error = $this->authorize('user-add')) {
            return $error;
        }
        $roles = Role::all();
        return view('admin.admin_user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('user-add')) {
            return $error;
        }
        $data = $request->validate([
            'name' => 'required|max:100',
            'designation' => 'nullable',
            'role_permission' => 'required',
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
        $data['permission'] = '1';
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        if($request->role_permission){
            $permission = [
                'role_id' =>  $request->permission,
                'model_type' => "App\Models\User",
                'model_id' =>  $user->id,
            ];
            ModelHasRole::create($permission);
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
