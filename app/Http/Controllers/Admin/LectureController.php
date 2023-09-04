<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Chapter;
use App\Models\Lecture;
use App\Models\LectureText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        if($request->filled('lectureText')){
            LectureText::create([
                'lecture_id' => $lecture->id,
                'text' => $request->lectureText,
            ]);
        }
        try {
            toast('Success!', 'success');
            return redirect()->route('lecture.index');
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
        return view('admin.lecture.lecture_play', compact('chapters','lecturePlay'));
    }

    public function chapter(Request $request)
    {
        $chapters = Chapter::where('course_id', $request->courseId)->get();
        $chapterName = '';
        $chapterName .= '<option selected value disable>Select</option>';
        foreach ($chapters as $chapter) {
            $chapterName .= '<option value="'.$chapter->id.'">'.$chapter->name.'</option>';
        }
        return json_encode(['chapterName'=>$chapterName]);
    }
}
