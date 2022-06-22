<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChapterController extends Controller
{
    public function store(Request $request)
    {
        if ($error = $this->authorize('chapter-add')) {
            return $error;
        }
        $data = $this->validate($request, [
            'course_id' => 'required',
            'name' => 'required',
        ]);

        try {
            Chapter::create($data);
            toast('success', 'Success!');
            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }
}
