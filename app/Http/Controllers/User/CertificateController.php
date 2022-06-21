<?php

namespace App\Http\Controllers\User;

use App\Models\AnsSheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    public function index()
    {
        $ansSheets = AnsSheet::whereUser_id(auth()->user()->id)->where('mark','>=',4)->get();
        return view('user.certificate.index', compact('ansSheets'));
    }
    public function show($courseId)
    {
        $ansSheet = AnsSheet::whereUser_id(auth()->user()->id)->whereCourse_id($courseId)->first();
        return view('user.certificate.certificate', compact('ansSheet'));
    }
}
