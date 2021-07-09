@extends('layouts.app')
@section('content')

<form method="get" action="{{route('result.create')}}">
	{{ csrf_field() }}

	<div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-3">
		<h1>Search Your Result</h1>
	  <div class="form-group">
		<label for="sel1">Exam Code</label>
		<select  name="exam_code" class="form-control" id="sel1">
			@if (count($codes) > 0)
			@foreach ($codes as $code)
			<option value="{{ $code->uniqueid }}">{{ $code->Course }}</option>
			@endforeach
				
			@endif
		  
		</select>
	  </div>
	  <button type="Submit" class="btn btn-success btn-block">Search</button>
	</div>

</form>

@endsection