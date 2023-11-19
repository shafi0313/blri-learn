<?php

namespace App\Http\Controllers\User;

use App\Models\Quiz;
use App\Models\AnsSheet;
use App\Models\QuizOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class QuizController extends Controller
{
    public function quiz(Request $request)
    {
        if(AnsSheet::whereUser_id(user()->id)->whereCourse_id($request->course_id)->first()){
            $time = AnsSheet::whereUser_id(user()->id)->whereCourse_id($request->course_id)->first()->times;
            if($time && $time > 3){
                Alert::info('আপনি তিনবার চেষ্টা করে ফেলেছেন');
                return back();
            }
        }

        $quizzes = Quiz::with(['options' => function ($q) {
                return $q->select(['id','quiz_id','option','correct']);
            }])->withCount('correctOptions')
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
        $correctAns        = QuizOption::inRandomOrder()->limit(10)->whereIn('id', $quizId)->whereCorrect(1)->count();
        $times             = AnsSheet::whereUser_id($userId)->whereCourse_id($request->course_id)->max('times') + 1;
        $data['user_id']   = $userId;
        $data['course_id'] = $request->course_id;
        $data['mark']      = $correctAns;
        $data['times']     = $times;

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
        $result = AnsSheet::whereUser_id($userId)->whereCourse_id($courseId)->first();
        return view('user.quiz.result', compact('result'));
    }
}
