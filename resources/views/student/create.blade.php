@extends('layouts.app')

@section('content')

<!-- @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor -->

<form method="post" action="{{route('student.store')}}">
	{{ csrf_field() }}

	<div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-3">
	  <div class="form-group">
		<label for="sel1">Exam Code</label>
		<select  name="exam_code" class="form-control" id="sel1">
			<option disabled selected>Select</option>
			@if (count($codes) > 0)
			@foreach ($codes as $code)
			<option value="{{ $code->uniqueid }}">{{ $code->Course }}</option>
			@endforeach
				
			@endif
		  
		</select>
	  </div>
	  <button type="Submit" class="btn btn-success btn-block">Submit</button><br><br>
	  <h3 style="color: red">**Note**</h3>
	  <h4 style="color: blue">The question would be invalid after the limited exam time.</h4>
	</div>

</form>

    @endsection
