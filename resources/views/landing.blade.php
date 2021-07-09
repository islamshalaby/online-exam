@extends('layouts.front')
@section('content')

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(x1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">
                        <h2>Start Your Online Exam</h2>
                        <a href="{{route('examinfo.create')}}"  class="btn clever-btn">Create exam</a>
                        <a href="{{route('student.index')}}" class="btn clever-btn">Take exam</a>
                        <a href="{{route('result.index')}}" class="btn clever-btn">Show result</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

   



   
@endsection
