<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentHistoryController extends Controller
{
    public function index()
    {
        $students = User::with(['district','courseEnrolls'])->wherePermission('2')->get();
    //    return District::all();
        return view('admin.student_history.index', compact('students'));
    }
}
