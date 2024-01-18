<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\District;
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
            ])->wherePermission('2');
            return DataTables::eloquent($students)
                ->addIndexColumn()
                ->addColumn('gender', function ($row) {
                    return $row->gender == 1 ? 'Male' : 'Female';
                })
                ->rawColumns(['gender', 'action'])
                ->make(true);
        }
        return view('admin.student.list');
    }

    public function locationWiseList()
    {
        $districts = District::select('id', 'name')->withCount(['users' => fn ($q) => $q->wherePermission('2')])->orderBy('name')->get();
        return view('admin.student.location-wise-list', compact('districts'));
    }
}
