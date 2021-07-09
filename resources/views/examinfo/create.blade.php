@extends('layouts.app')

@section('content')

<!-- @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor -->

<form method="post" action="{{route('examinfo.store')}}">
	{{ csrf_field() }}

	<div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-3">
	  <div class="form-group">
	    <label class="col-form-label" for="formGroupExampleInput2">Course Name</label>
	    <input type="text" name="Course" class="form-control" id="formGroupExampleInput2" placeholder="example:SWE111" required>
	  </div>
	  <div class="form-group">
		<label for="examType">Exam Type</label>
		<select required name="type" class="form-control" id="examType">
			<option value="1">Final Exam</option>
			<option value="2">Test Exam</option>
		</select>
	  </div>
	  <div style="display : none" class="form-group">
		<label for="parentExam">Exam</label>
		<select disabled required name="exam_id" class="form-control" id="parentExam">
			@if (count($parentExams) > 0)
			@foreach ($parentExams as $exam)
			<option value="{{ $exam->id }}">{{ $exam->Course }}</option>
			@endforeach
				
			@endif
		</select>
	  </div>
	  <div class="form-group">
	    <label class="col-form-label" for="scorePass">score pass</label>
	    <input type="text" name="score" class="form-control" id="scorePass" placeholder="Score pass" required>
	  </div>
	  {{-- <div class="form-group">
	    <label class="col-form-label" for="level">Level</label>
	    <input type="text" name="level" class="form-control" id="level" placeholder="Level" required>
	  </div> --}}
	  <div class="form-group">
	    <label class="col-form-label" for="formGroupExampleInput2">Number Of Question</label>
	    <input type="text" name="question_lenth" class="form-control" id="formGroupExampleInput2" placeholder="E.g 10" required>
	  </div>
	  <div class="form-group">
	    <label class="col-form-label" for="formGroupExampleInput2">Set time</label>
	    <input type="text" name="time" class="form-control" id="formGroupExampleInput2" placeholder="Enter In Minite" required>
	  </div>
	  <div class="form-group">
	    <input type="hidden" value="{{substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5)}}" name="uniqueid" class="form-control" id="formGroupExampleInput2">
	  </div>
	  <button type="Submit" class="btn btn-success btn-block">Submit</button>
	</div>

</form>

@endsection
