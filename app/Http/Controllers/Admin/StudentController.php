<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $students = User::select('id', 'name', 'email', 'phone', 'gender', 'district_id', 'address')->with([
                'district' => fn ($q) => $q->select('id', 'name')
            ])->wherePermission('2')->get();
            return DataTables::eloquent($students)
                ->addIndexColumn()
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('admin.student.list');
    }
}
