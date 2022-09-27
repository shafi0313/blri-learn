<?php

namespace App\Http\Controllers\User;

use App\Models\Quiz;
use App\Models\Layout;
use App\Models\AnsSheet;
use App\Models\QuizOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class QuizController extends Controller
{
    public function quiz(Request $request)
    {
        // $userId = auth()->user()->id;
        // $ansSheetCheck = AnsSheet::whereUser_id($userId)->whereCourse_id($request->course_id);
        // if(!empty($ansSheetCheck->times) && $ansSheetCheck->times >= 3){
        //     Alert::info('আপনি তিনবার চেষ্টা করে ফেলেছেন');
        //     return back();
        // }
        // if($ansSheetCheck){
        //     $ansSheetCheck->update(['temp_mark' => 0]);
        // }

        // $sessionQuizId = [];
        // if($request->quiz_id){
        //     $sessionQuizId = array_merge([$request->quiz_id],session('qz_'.auth()->user()->id)??[]);
        //     session()->put('qz_'.auth()->user()->id, $sessionQuizId);
        // }

        // $quiz = Quiz::with(['options' => function ($q) {
        //     return $q->select(['id','quiz_id','option','correct']);
        // }])->whereNotIn('id', $sessionQuizId)
        // ->inRandomOrder()
        // ->first();

        // $correctAns = QuizOption::where('quiz_id', $request->quiz_id)->whereId($request->option_id)->whereCorrect(1)->count();
        // if($correctAns == 1){
        //     $total = session('mark_'.auth()->user()->id)??0;
        //     session()->put('mark_'.auth()->user()->id, $total+1);
        // }

        // return session('mark_'.auth()->user()->id);
        // $previousMark = $ansSheetCheck->max('mark');
        // $times = $ansSheetCheck->max('times') + 1;
        // $tempMark = $ansSheetCheck->first()->temp_mark;

        // $data['user_id'] = $userId;
        // $data['course_id'] = $request->course_id;
        // $data['mark'] = $previousMark + $correctAns;
        // $data['temp_mark'] = $previousMark + $correctAns;

        // if($ansSheetCheck->count() > 0){
        //     $ansSheetCheck->update($data);
        // }else{
        //     AnsSheet::create($data);
        // }

        // if(count($sessionQuizId) > 4){
        //     session()->put('qz_'.auth()->user()->id, []);
        //     try {
        //         AnsSheet::whereUser_id($userId)->whereCourse_id($request->course_id)->update(["times" => $times, "mark" => session('mark_'.auth()->user()->id)]);
        //         session()->forget('mark_'.auth()->user()->id);
        //         session()->put('mark_'.auth()->user()->id, 0);
        //         Alert::success('Done');
        //         return redirect()->route('user.quiz.result', [$userId,$request->course_id]);
        //     } catch (\Exception $e) {
        //         return $e->getMessage();
        //         Alert::error('Failed');
        //         return back();
        //     }
        // }

        if(AnsSheet::whereUser_id(user()->id)->whereCourse_id($request->course_id)->first()){
            $time = AnsSheet::whereUser_id(user()->id)->whereCourse_id($request->course_id)->first()->times;
            if($time && $time > 3){
                Alert::info('You have tried three times');
                return back();
            }
        }

        $quizzes = Quiz::with(['options' => function ($q) {
                return $q->select(['id','quiz_id','option','correct']);
            }])
            ->whereCourse_id($request->course_id)
            ->inRandomOrder()
            ->take(10)
            ->get();
        if($quizzes->count() < 1){
            Alert::info('No Data Found');
            return back();
        }
        return view('user.quiz.index', compact('quizzes'));
    }

    public function ans(Request $request)
    {
        $userId = auth()->user()->id;
        $quizId = [];
        foreach ($request->quiz_id as $q) {
            $quizId[] = $request->get('qz_'.$q);
        }
        $correctAns = QuizOption::inRandomOrder()->limit(10)->whereIn('id', $quizId)->whereCorrect(1)->count();
        $times = AnsSheet::whereUser_id($userId)->whereCourse_id($request->course_id)->max('times') + 1;
        $data['user_id'] = $userId;
        $data['course_id'] = $request->course_id;
        $data['mark'] = $correctAns;
        $data['times'] = $times;

        try {
            AnsSheet::whereUser_id($userId)->whereCourse_id($request->course_id)->update($data) || AnsSheet::create($data);
            Alert::success('Done');
            return redirect()->route('user.quiz.result', [$userId,$request->course_id]);
        } catch (\Exception $e) {
            return $e->getMessage();
            Alert::error('Failed');
            return back();
        }
    }

    public function result($userId, $courseId)
    {
        $layout = Layout::where('user_id', auth()->user()->id)->first(['tbl','tbl_bg','tbl_text','create_btn']);
        $result = AnsSheet::whereUser_id($userId)->whereCourse_id($courseId)->first();
        return view('user.quiz.result', compact('layout','result'));
    }
}
