<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Layout;
use App\Models\Chapter;
use App\Models\Lecture;
use App\Models\LectureText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LectureController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $layout = Layout::where('user_id', $user->id)->first(['tbl','tbl_bg','tbl_text','create_btn']);
        $lectures = Lecture::whereUser_id($user->id)->get();
        return view('admin.lecture.index', compact('layout','lectures'));
    }

    public function create()
    {
        $user = auth()->user();
        $layout = Layout::whereUser_id($user->id)->first(['submit_btn']);
        $courses = Course::whereUser_id($user->id)->get();
        return view('admin.lecture.create', compact('layout','courses'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'course_id' => 'required',
            'chapter_id' => 'required',
            'type' => 'required',
            'name' => 'required',
            'text' => 'required',
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
        // return $id;
        $user = auth()->user();
        $layout = Layout::whereUser_id($user->id)->first(['submit_btn']);
        $chapters = Chapter::with('lectures')->whereCourse_id($id)->get();
        // $chapters = Lect::whereCourse_id($id)->get();
        return view('admin.lecture.show', compact('layout','chapters'));
    }

    public function lecturePlay($course_id, $lecture_id)
    {
        $user = auth()->user();
        $layout = Layout::whereUser_id($user->id)->first(['submit_btn']);
        $chapters = Chapter::whereCourse_id($course_id)->get();
        $lecturePlay = Lecture::whereId($lecture_id)->first();
        // $chapters = Lect::whereCourse_id($id)->get();
        return view('admin.lecture.lecture_play', compact('layout','chapters','lecturePlay'));
    }

    public function lectureComplete(Request $request)
    {
        return $request;
        // return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
