<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ChapterController extends Controller
{
    public function store(Request $request)
    {
        if ($error = $this->authorize('chapter-add')) {
            return $error;
        }
        $data = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'name'      => ['required', 'string', 'min:1', 'max:255']
        ]);

        try {
            Chapter::create($data);
            Alert::success('Success', 'This information has been added successfully');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
            return back();
        }
    }

    public function edit(Chapter $chapter)
    {
        if ($error = $this->authorize('chapter-edit')) {
            return $error;
        }
        $courses = Course::all();
        return view('admin.chapter.edit', compact('chapter', 'courses'));
    }

    public function update(Request $request, Chapter $chapter)
    {
        if ($error = $this->authorize('chapter-edit')) {
            return $error;
        }
        $data = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'name'      => ['required', 'string', 'min:1', 'max:255']
        ]);

        try {
            $chapter->update($data);
            Alert::success('Success', 'This information has been updated successfully');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong, please try again later');
            return back();
        }
    }
}
