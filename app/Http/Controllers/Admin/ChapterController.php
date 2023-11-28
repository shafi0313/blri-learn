<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
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
        $data = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'name'      => ['required', 'string', 'min:1', 'max:255']
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

    public function edit(Chapter $chapter)
    {
        if ($error = $this->authorize('chapter-edit')) {
            return $error;
        }
        $courses = Course::all();
        return view('admin.chapter.edit', compact('chapter','courses'));
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
            toast('success', 'Success!');
            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }
}
