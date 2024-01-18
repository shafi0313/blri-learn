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
            ])->wherePermission('2');
            return DataTables::eloquent($students)
                ->addIndexColumn()
                ->addColumn('gender', function ($row) {
                    return $row->gender == 1? 'Male':'Female';
                })
                // ->addColumn('action', function ($row) {
                //     $btn = '';
                //     if (userCan('class-name-edit')) {
                //         $btn .= view('button', ['type' => 'ajax-edit', 'route' => route('admin.class-names.edit', $row->id), 'row' => $row]);
                //     }
                //     if (userCan('class-name-delete')) {
                //         $btn .= view('button', ['type' => 'ajax-delete', 'route' => route('admin.class-names.destroy', $row->id), 'row' => $row, 'src' => 'dt']);
                //     }
                //     return $btn;
                // })
                ->rawColumns(['gender', 'action'])
                ->make(true);
        }
        return view('admin.student.list');
    }
}
