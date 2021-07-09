@extends('layouts.app')

@section('script')

<!-- script for time limitation of exam -->
<script type="text/javascript">
var timeoutHandle;
function countdown(minutes) {
    var seconds = 60;
    var mins = minutes
    function tick() {
        var counter = document.getElementById("timer");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML =
        current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            timeoutHandle=setTimeout(tick, 1000);
        } else {

            if(mins > 1){

               // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
               setTimeout(function () { countdown(mins - 1); }, 1000);

            }
        }
    }
    tick();
}

countdown('<?php echo $time; ?>');

</script>

<!-- script for disable url -->
<script type="text/javascript">
    var time= '<?php echo $time; ?>';
    var realtime = time*60000;
    setTimeout(function () {
        alert('Time Out');
        window.location.href= '/submit/' + "{{ $stud_id }}" + "/" + "{{ $course_id }}"},
   realtime);
    
</script>

@endsection




@section('content')
<body style="background-color: #e8e8e8">
    <div>
        <nav class="col-lg-1 pull-right">
          <div class="sidebar-nav-fixed affix">
            <h1><b>Time <span id="timer" style="color: #c1bfbf">0.00</span></b></h1><br>
          </div>
        </nav>
        <h1 class="col-lg-offset-5" ><span style="color: #c1bfbf;"class="hero-content text-center"><b>  {{$course}} Exam </b></span></h1>
        <div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-3" style="background-color: #e8e8e8">
            
        @foreach($questions as $question)
            <div style="border: 1px solid;
            padding: 10px;
            border-radius: 5px;margin-bottom : 20px" class="col-md-6 col-lg-8 col-sm-6 col-lg-offset-2">
                <form method="post" action="{{route('answer.store')}}" class="ansform">
                	{{ csrf_field() }}

                    <h3 style="margin-top: 0;">{{$question->question}} ?</h3>
                    <div class="col-lg-offset-1">
                        <input type="hidden" name="question" value="{{$question->question}}">
                        <input type="hidden" name="uniqueid" value="{{$question->exam->uniqueid}}">
                        <input type="hidden" name="student_id" value="{{$student_id}}">
                        <input type="hidden" name="true_answer" value="{{$question->answer}}">
                        <input name="answer" value="{{$question->choice1}}" type="radio"> {{$question->choice1}} <br>
                        <input name="answer" value="{{$question->choice2}}" type="radio">{{$question->choice2}}<br>
                        <input name="answer" value="{{$question->choice3}}" type="radio">{{$question->choice3}}<br>
                        <input name="answer" value="{{$question->choice4}}" type="radio">{{$question->choice4}}<br>
                        <input type="submit" name="submit" value="submit" class="btn btn-primary" id="submitbtn">
                    </div>
                 </form>
            </div>
         @endforeach
         <div class="col-md-6 col-lg-8 col-sm-6 col-lg-offset-2">
            <a href="{{ route('submit', [$stud_id, $course_id]) }}" class="btn btn-primary">Finish</a>
         </div>
        </div>
    </div>
   
</body>




@endsection

	 
