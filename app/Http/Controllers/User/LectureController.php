<?php

namespace App\Http\Controllers\User;

use App\Models\Course;
use App\Models\Layout;
use App\Models\Chapter;
use App\Models\Lecture;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use App\Models\CompletedCourse;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::whereUser_id(auth()->user()->id)->get();
        return view('admin.lecture.index', compact('lectures'));
    }

    public function create()
    {
        $user = auth()->user();
        $courses = Course::whereUser_id($user->id)->get();
        return view('admin.lecture.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'course_id'  => 'required',
            'chapter_id' => 'required',
            'type'       => 'required',
            'name'       => 'required',
            'text'       => 'required',
            // 'video' => 'sometimes',
            // 'text' => 'sometimes|mimes:pdf|max:4096',
        ]);

        if($request->hasFile('text')){
            $pdf     = $request->file('text');
            $pdfName = "lecture".rand(0, 1000000).'.'.$pdf->getClientOriginalExtension();
            $request->text->move('uploads/pdf/lecture', $pdfName);
            $data['text'] = $pdfName;
        }
        $data['user_id'] = auth()->user()->id;
        $data['type']    = $request->type;


        try {
            Lecture::create($data);
            toast('success', 'Success!');
            return redirect()->route('lecture.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            toast('error', 'Error');
            return back();
        }
    }

    public function show($id)
    {
        $chapters = Chapter::with('lectures','lectures.enroll')->whereCourse_id($id)->get();
        return view('user.lecture.show', compact('chapters'));
    }

    public function lecturePlay($course_id, $lecture_id)
    {
        $user         = auth()->user();
        $chapters     = Chapter::with('lectures','lectures.enroll')->whereCourse_id($course_id)->get();
        $lecturePlay  = Lecture::with(['enroll', 'lectureText'])->whereId($lecture_id)->whereCourse_id($course_id)->first();
        $courseEnroll = CourseEnroll::whereUser_id($user->id)->whereCourse_id($course_id)->whereLecture_id($lecture_id)->first();
        return view('user.lecture.lecture_play', compact('chapters','lecturePlay','courseEnroll'));
    }

    public function lectureComplete(Request $request)
    {
        // return $request;
        $userId       = auth()->user()->id;
        $courseId     = $request->course_id;
        $lectureId    = $request->lecture_id;
        $courseEnroll = CourseEnroll::whereUser_id($userId)->whereCourse_id($courseId)->whereLecture_id($lectureId)->first();
        if($courseEnroll != null){
            // return 'd';
            $courseEnroll->update(['status' => 1]); // complete
        }else{
            $data = [
                'user_id'    => $userId,
                'course_id'  => $courseId,
                'lecture_id' => $lectureId,
                'status'     => 1,
            ];
            CourseEnroll::create($data);
        }

        $courseComplete = CourseEnroll::whereUser_id($userId)->whereCourse_id($courseId)->whereStatus(0)->get();
        if($courseComplete->count() < 1){
            $complete = [
                'user_id'   => $userId,
                'course_id' => $courseId,
                'complete'  => 1,
            ];
            CompletedCourse::updateOrCreate($complete);
        }
        
        $nextLectureId = Lecture::where('id','>',$lectureId)->orderBy('id')->first(['id','course_id']);
        if($nextLectureId){
            toast('Success','success');
            return redirect()->route('user.lecture.lecturePlay',[$nextLectureId->course_id, $nextLectureId->id]);
        }else{
            Alert::success('Success', 'Course Completed');
            // toast('Success','success');
            return back();
        }
    }

    public function chapter(Request $request)
    {
        $chapters     = Chapter::where('course_id', $request->courseId)->get();
        $chapterName  = '';
        $chapterName .= '<option selected value disable>Select</option>';
        foreach ($chapters as $chapter) {
            $chapterName .= '<option value="'.$chapter->id.'">'.$chapter->name.'</option>';
        }
        return json_encode(['chapterName'=>$chapterName]);
    }
}
