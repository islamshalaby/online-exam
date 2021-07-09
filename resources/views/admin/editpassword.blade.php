@extends('layouts.app')

@section('content')

<form method="post" action="/admin/{{$user->id}}">

    <h1>Edit Users</h1>
    <input type="hidden" name="_method" value="PUT">
    <div class="col-sm-9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminController@update', $user->id], 'files'=>true]) !!}
   
    	{{ csrf_field() }}


      

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-6 control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>


        <div class="form-group">
            {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-2']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::close() !!}

    </div>
    </form>


@endsection