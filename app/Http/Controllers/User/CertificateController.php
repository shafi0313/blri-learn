<?php

namespace App\Http\Controllers\User;


use PDF;
use App\Models\AnsSheet;
use App\Models\CerSignature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CertificateController extends Controller
{
    public function index()
    {
        // $ansSheets = AnsSheet::whereUser_id(auth()->user()->id)->where('mark','>=',4)->get();
        $ansSheets = AnsSheet::whereUser_id(auth()->user()->id)->get();
        return view('user.certificate.index', compact('ansSheets'));
    }
    public function show($courseId)
    {
        $ansSheet = AnsSheet::whereUser_id(auth()->user()->id)->whereCourse_id($courseId)->first();
        $signatures = CerSignature::all();
        return view('user.certificate.certificate', compact('ansSheet','signatures'));
    }

    public function pdf($courseId)
    {
        $ansSheet = AnsSheet::whereUser_id(auth()->user()->id)->whereCourse_id($courseId)->first();
        // if(!$ansSheet->name_cer){
        //     Alert::info('Goto profile and input certificate name');
        //     return back();
        // }else if(!$ansSheet->fa_name){
        //     Alert::info('Goto profile and input father name');
        //     return back();
        // }else if(!$ansSheet->mo_name){
        //     Alert::info('Goto profile and input mother name');
        //     return back();
        // }else if(!$ansSheet->text){
        //     Alert::info('Goto profile and input address');
        //     return back();
        // }
        $signatures = CerSignature::all();
        $pdf = PDF::loadView('user.certificate.pdf', compact('ansSheet','signatures'),[],[
            'title' => 'Certificate',
            'format' => 'A4-L',
            'orientation' => 'L'
          ]);
        $pdf->mpdf->SetWatermarkImage(
            public_path('uploads/images/icon/breeding_logo.png'),
            0.1,
            180,180,
        );
        $pdf->mpdf->showWatermarkImage = true;
        return $pdf->stream('certificate.pdf');
        // return view('user.certificate.pdf', compact('ansSheet'));
    }
}
