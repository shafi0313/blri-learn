<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lecture;
use App\Models\LectureText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LectureController extends Controller
{
    public function index()
    {
        if ($error = $this->authorize('lecture-manage')) {
            return $error;
        }
        $user     = auth()->user();
        $lectures = Lecture::whereUser_id($user->id)->get();
        return view('admin.lecture.index', compact('lectures'));
    }

    public function create()
    {
        if ($error = $this->authorize('lecture-add')) {
            return $error;
        }
        $user    = auth()->user();
        $courses = Course::whereUser_id($user->id)->get();
        return view('admin.lecture.create', compact('courses'));
    }

    public function store(Request $request)
    {
        if ($error = $this->authorize('lecture-add')) {
            return $error;
        }
        $data = $this->validate($request, [
            'course_id'  => 'required',
            'chapter_id' => 'required',
            'type'       => 'required',
            'name'       => 'required',
            'text'       => 'required',
            'time'       => 'required_if:type,==,2',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['type'] = $request->type;
        $lecture = Lecture::create($data);
        if ($request->filled('lectureText')) {
            LectureText::create([
                'lecture_id' => $lecture->id,
                'text' => $request->lectureText,
            ]);
        }
        try {
            toast('Success!', 'success');
            return redirect()->route('admin.lecture.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('Error', 'error');
            return back();
        }
    }

    public function show($id)
    {
        $user     = auth()->user();
        $chapters = Chapter::with('lectures')->whereCourse_id($id)->get();
        return view('admin.lecture.show', compact('chapters'));
    }

    public function lecturePlay($course_id, $lecture_id)
    {
        $user        = auth()->user();
        $chapters    = Chapter::with('lectures')->whereCourse_id($course_id)->get();
        $lecturePlay = Lecture::whereId($lecture_id)->first();
        return view('admin.lecture.lecture_play', compact('chapters', 'lecturePlay'));
    }

    public function getChapter(Request $request)
    {
        if ($request->ajax()) {
            $chapters = Chapter::where('course_id', $request->course_id)->get();
            return response()->json(['chapters' => $chapters, 'status' => 200]);
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }


    public function edit(Lecture $lecture)
    {
        if ($error = $this->authorize('lecture-edit')) {
            return $error;
        }
        $user    = auth()->user();
        $courses = Course::whereUser_id($user->id)->get();
        $chapters = Chapter::whereCourse_id($lecture->course_id)->get();
        return view('admin.lecture.edit', compact('lecture', 'courses', 'chapters'));
    }

    public function destroy(Lecture $lecture)
    {
        // return 'ok';
        if ($error = $this->authorize('lecture-delete')) {
            return $error;
        }
        // $path = public_path('uploads/images/lecture/'.$lecture->video);
        // $path = public_path('uploads/pdf/'.$lecture->video);
        // if()
        try {
            $lecture->delete();
            Alert::success('Success', 'Lecture Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Something Went Wrong, Please Try Again');
            return back();
        }
    }
}
