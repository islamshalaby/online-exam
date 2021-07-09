<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\examinfo;
use App\Student;
use App\User;
use Mail;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($this->amIteacher() ) { return redirect ('/home');}

        if ($request->ajax()) {
            $answer=Answer::create([
                'stu_id' => $request->input('student_id'),
                'question' => $request->input('question'),
                'given_answer' => $request->input('answer'),
                'true_answer' => $request->input('true_answer')

            ]);
            // dd($answer);
            $exam = examinfo::where('uniqueid', $request->uniqueid)->first();
            // dd($request->uniqueid);
            if ($request->input('answer')==$request->input('true_answer')) {
                $insert=Student::where('id',$request->input('student_id'))->where('uniqueid', $request->uniqueid)->increment('score');
            }
            $student = Student::where('student_id', auth()->user()->id)->where('uniqueid', $request->uniqueid)->first();
            // if ($exam->type == 2) {
                $parentExam = examinfo::where('id', $exam->exam_id)->first();
                if ($student->score >= $exam->score) {
                    $student->status = 1;
                }
                $student->test_score = $student->score;
                $student->save();
            // }else {
            //     if ($student->score >= $exam->score) {
            //         $student->status = 1;
            //     }
            //     $student->score = $student->score;
            //     $student->save();
            // }
            
            return response($answer);
        }else{
            return "ajax not done";
        }
    }


    public function submit($tudent_id, $course_id) {
        
        $student = Student::where('student_id',$tudent_id)->where('uniqueid', $course_id)->first();
        $course = Examinfo::where('uniqueid', $course_id)->first();
        
        
        if ($student->score == 0) {
            $answers = $student->answers()->where('given_answer', '!=', '0')->get();
            $score = 0;
            $rounded_score = number_format($score, 2, '.', '');
        }else {
            $score = ($student->score / count($student->answers)) * 100;
            $answers = $student->answers()->where('given_answer', '!=', '0')->get();
            $score = ($student->score / count($course->questions)) * 100;
            $rounded_score = number_format($score, 2, '.', '');
        }
        $user = User::where('id', $tudent_id)->first();
        
        $data = ["name" => $user->name, "score" => $rounded_score, "course" => $course];
        Mail::send('mail', $data, function($message) use($user, $course) {
            $message->to($user->email, $user->name)->subject
               ($course->Course . ' Exam Result');
            $message->from('masteronlineexam@gmail.com','Master Online Exam');
         });

         return view('welcome', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
