@extends('layouts.app')
@section('content')
<div>
    <div class="col-lg-offset-5">
        {{-- <h2>Id : {{$studentId}}</h2> --}}
        <h2>Course Name : {{$course}}</h2>
        <h3 >Your total mark : <b><span style="color: green">{{$getScore}} %</span></b></h3>
        <h4 >
            @if($getScore >= 80 && $getScore <= 100)
            <img width="150px" src="{{URL::to('/') }}/1111.jpg" />
            @elseif($getScore >= 50 && $getScore <= 79)
            <img width="150px" src="{{URL::to('/') }}/3333.jpg" />
            @else
            <img width="150px" src="{{URL::to('/') }}/2222.png" />
            @endif
        </h4>
    </div><hr>
            
        @foreach($answeredQuestion as $answerQ)
            <div class="col-md-6 col-lg-8 col-sm-6 col-lg-offset-4">
                <h3><span style="color: red">Question : </span> {{$answerQ->question}} ?</h3>
                <div class="col-lg-offset-2">  
                    <div class="form-group">
                        <p type="text" name="given_answer">Your Choice Was : {{$answerQ->given_answer}}</p>
                    </div>
                     <div class="form-group">
                        <p type="text" name="true_answer"><span style="color: green">True Answer : {{$answerQ->true_answer}}</span></p>
                    </div>

                </div>
            </div>
         @endforeach

    </div>
@endsection
