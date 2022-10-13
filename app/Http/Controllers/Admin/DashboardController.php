<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseCat;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['admin'] = User::wherePermission('1')->count();
        $data['student'] = User::wherePermission('2')->count();
        $data['courseCat'] = CourseCat::count();
        $data['course'] = Course::count();
        return view('admin.dashboard', compact('data'));
    }
}
