<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Examinfo;
use App\Question;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::where('student_id', auth()->user()->id)->pluck('uniqueid')->toArray();
        $codesTest = Examinfo::where("type", 2)->whereNotIn('uniqueid', $students)->orderBy('id', 'desc')->get();
        $codes = [];

        if (count($codesTest) > 0) {
            for ($i = 0; $i < count($codesTest); $i ++) {
                array_push($codes, $codesTest[$i]);
            }
        }
        $codesLive = Examinfo::where('type', 1)->orderBy('id', 'desc')->get();
        if (count($codesLive) > 0) {
            for ($l = 0; $l < count($codesLive); $l ++) {

                if (count($codesLive[$l]->children) > 0) {
                    for ($c = 0; $c < count($codesLive[$l]->children); $c ++) {
                        $std = Student::where('student_id', auth()->user()->id)->where('uniqueid', $codesLive[$l]->children[$c]->uniqueid)->first();
                        $stdL = Student::where('student_id', auth()->user()->id)->where('uniqueid', $codesLive[$l]->uniqueid)->where('status', 1)->first();
                        if ($std->id) {
                            if ($std->status == 1) {
                                if (!$stdL) {
                                    array_push($codes, $codesLive[$l]->children[$c]->parent);
                                }
                            }else {
                                array_push($codes, $codesLive[$l]->children[$c]);
                            }
                        }
                    }
                }else {
                    array_push($codes, $codesLive[$l]);
                }
            }
        }

        return view('student.create', compact('codes'));
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
        $student= new Student;

        $sIdForValidate=auth()->user()->id;
        $examCodeForValidate=$request->input('exam_code');
        
        $initialScore=0;

        $checker=Student::where('student_id','=',$sIdForValidate)->where('uniqueid','=',$examCodeForValidate)->where("status", 1)->count();
       
        if ($checker>0) {
            return "YOU ALREADY DONE THIS EXAM";
        }else{
            $prevExam = Student::where('student_id', auth()->user()->id)->where('uniqueid', $request->input('exam_code'))->first();
            if ($prevExam) {
                $prevExam->delete();
            }
            $student = Student::create([
            'student_id' => auth()->user()->id,
            'uniqueid' => $request->input('exam_code'),
            'score' =>$initialScore
            ]);

            $id=$request->input('exam_code');
            $studentRealId=auth()->user()->id;
            $student_id=Student::where('student_id',$studentRealId)->where('uniqueid', $request->input('exam_code'))->value('id');
            $findcourse= Examinfo::where('uniqueid',$id)->value('id');
            $findtime= Examinfo::where('uniqueid',$id)->value('time');
            $course= Examinfo::where('uniqueid',$id)->value('Course');
            $questions=Question::where('quiz_id',$findcourse)->get();
            return view('answer.show')->with('questions', $questions)->with('student_id',$student_id)->with('course',$course)->with('time',$findtime);
        }
        

        //return $this->show($request->input('exam_code'));
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
