<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\Layout;
use App\Models\QuizOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class QuizController extends Controller
{
    public function course()
    {
        $courses = Course::whereUser_id(auth()->user()->id)->get();
        return view('admin.quiz.course', compact('courses'));
    }

    public function addQuiz($course_id)
    {
        $quizzes = Quiz::with(['options' => function($q){
            return $q->select(['id','quiz_id','option','correct']);
        }])->whereCourse_id($course_id)->get(['id','ques']);
        return view('admin.quiz.create', compact('course_id','quizzes'));
    }

    public function quesStore(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required',
            'ques' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;

        try{
            Quiz::create($data);
            toast('Success!', 'success');
            return back();
        }catch(\Exception $e){
            toast('Failed', 'error!');
            return back();
        }
    }

    public function quesUpdate(Request $request, $quesId)
    {
        $data = $request->validate([
            'ques' => 'required',
        ]);

        try{
            Quiz::find($quesId)->update($data);
            toast('Success!', 'success');
            return back();
        }catch(\Exception $e){
            toast('Failed', 'error');
            return back();
        }
    }

    public function quesDestroy($quizId)
    {
        $data = Quiz::find($quizId);
        QuizOption::whereQuiz_id($quizId)->delete();
        destroy($data);
        return back();
    }

    public function optionStore(Request $request)
    {
        $optionCheck = QuizOption::whereQuiz_id($request->quiz_id);

        if($optionCheck->count() > 3){
            Alert::info("You can add maximum 4 options");
            return back();
        }
        if($request->correct && $optionCheck->whereCorrect(1)->count() > 0){
            Alert::info("You can add maximum 1 correct answer");
            return back();
        }
        $data = $request->validate([
            'quiz_id' => 'required',
            'option' => 'required',
            'correct' => 'sometimes',
        ]);
        $data['user_id'] = auth()->user()->id;
        try{
            QuizOption::create($data);
            toast('Success!', 'success');
            return back();
        }catch(\Exception $e){
            return $e->getMessage();
            toast('Failed', 'error!');
            return back();
        }
    }

    public function optionUpdate(Request $request, $optionId, $quizId)
    {
        // $optionCheck = QuizOption::whereQuiz_id($quizId);

        // if($optionCheck->count() > 3){
        //     Alert::info("You can add maximum 4 options");
        //     return back();
        // }

        // if($request->correct && $optionCheck->whereCorrect(1)->count() > 0){
        //     Alert::info("You can add maximum 1 correct answer");
        //     return back();
        // }
        $data = $request->validate([
            'option' => 'required',
        ]);
        if($request->correct || $request->correct == '0'){
            $data['correct'] = 1;
        }else{
            $data['correct'] = 0;
        }

        try{
            QuizOption::find($optionId)->update($data);
            toast('Success!', 'success');
            return back();
        }catch(\Exception $e){
            return $e->getMessage();
            toast('Failed', 'error!');
            return back();
        }
    }

    public function optionDestroy($id)
    {
        $data = QuizOption::find($id);
        destroy($data);
        return back();
    }
}
