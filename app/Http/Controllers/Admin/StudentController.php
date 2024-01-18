<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function list()
    {
        $students = User::select('id', 'name', 'email', 'phone', 'gender', 'district_id', 'address')->with([
            'district' => fn ($q) => $q->select('id', 'name')
        ])->wherePermission('2')->get();
        return view('admin.student.list', compact('students'));
    }
}
