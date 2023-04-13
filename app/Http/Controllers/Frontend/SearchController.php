<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SearchController extends Controller
{
    public function search()
    {
        // if(request('search')){
            $datum = Course::search(request('search'))->paginate();            
            return view('frontend.search', compact('datum'));
        // }
        // else{
        //     $datum = Course::all();            
        //     return view('frontend.search', compact('datum'));
        //     return view('frontend.search');
        //     Alert::info('Oops', 'No Data Found');
        //     return redirect()->back();
        // }
    }
    
}
