<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examinfo;

class ExaminfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(! $this->amIteacher() ) { return redirect ('/');}

        return view('examinfo.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(! $this->amIteacher() ) { return redirect ('/');}
        $parentExams = Examinfo::where('exam_id', 0)->has('children', '=', 0)->orderBy('id', 'desc')->get();
        return view('examinfo.create', compact('parentExams'));
    }

    public function show_students($exam_id) {
        $exam = Examinfo::where('id', $exam_id)->first();
        $students = $exam->students;

        // dd($students[0]->user->name);
        return view('student.exam_students', ['students' => $students, 'exam' => $exam]);
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
        if(! $this->amIteacher() ) { return redirect ('/');}
// dd($request->all());
        $examinfo= new Examinfo;
        $examId = 0;
        $score = 0;
         if ($request->exam_id) {
            $examId = $request->exam_id;
         }

         if ($request->score) {
            $score = $request->score;
         }

        $examinfo = Examinfo::create([
                'Teacher_id' => auth()->user()->id,
                'user_id' => auth()->user()->id,
                'Course' => $request->input('Course'),
                'question_lenth' => $request->input('question_lenth'),
                'uniqueid' => $request->input('uniqueid'),
                'time' => $request->input('time'),
                'type' => $request->type,
                'exam_id' => $examId,
                'score' => $score,
                'level' => $request->level
            ]);

        return view('makequestion.create', ['examinfo' => $examinfo]);

        // $examinfo->Teacher_id = $request->Teacher_id;
        // $examinfo->Course = $request->Course;
        // $examinfo->question_lenth = $request->question_lenth;

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
