<?php

namespace App\Http\Controllers\Admin\MyProfile;

use App\Models\Layout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function create()
    {
        return view('admin.my_profile.layout.create');
    }

    public function layoutLight(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'tbl' => 'light',
            'tbl_bg' => 'light',
            'tbl_text' => 'dark',
            'logo_header' => 'purple2',
            'navbar_header' => 'purple2',
            'sidebar' => 'light',
            'background' => 'light',
            'submit_btn' => 'primary',
            'create_btn' => 'primary',
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function layoutDark(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'tbl' => 'dark',
            'tbl_bg' => 'dark',
            'tbl_text' => 'light',
            'logo_header' => 'dark',
            'navbar_header' => 'dark',
            'sidebar' => 'dark',
            'background' => 'dark',
            'submit_btn' => 'dark',
            'create_btn' => 'dark',
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function submitBtn(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'submit_btn' => $request->submit_btn,
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function createBtn(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'create_btn' => $request->create_btn,
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function table(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'tbl' =>$request->tbl,
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function tableBg(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'tbl_bg' =>$request->tbl_bg,
            'tbl_text' =>$request->tbl_bg=='light'?'dark':'light',
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }
    public function tableText(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'tbl_text' =>$request->tbl_text,
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function logoHeaderStore(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'logo_header' =>$request->logo_header,
        ];
        // $user = Layout::where('user_id', $user_id)->get();
        // if($user){
        //     Layout::where('user_id', $user_id)->update($data);
        //     toast('Sucscess','success');
        //     return redirect()->back();
        // }

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast($ex->getMessage().'Failed','error');
            return redirect()->back();
        }
    }

    public function navbarHeaderStore(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'navbar_header' =>$request->navbar_header,
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function sidebarStore(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'sidebar' =>$request->sidebar,
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }

    public function backgroundStore(Request $request)
    {
        $user_id = $request->user_id;
        $data = [
            'user_id' => $user_id,
            'background' =>$request->background,
        ];

        try{
            Layout::where('user_id', $user_id)->update($data) || Layout::create($data);
            toast('Success','success');
            return redirect()->back();
        }catch(\Exception $ex){
            toast('Failed','error');
            return redirect()->back();
        }
    }
}
