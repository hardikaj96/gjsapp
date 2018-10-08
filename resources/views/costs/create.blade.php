@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1>GJS</h1>
        <p>You can Login and start getting product costs</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">LOGIN</a>  <a class="btn btn-primary btn-lg" href="/register" role="button">REGISTER</a></p>
    </div>
    {!! Form::open(['action' => 'CostsController@create','method'=>'POST']) !!}
                <div class='form-group'>
                    {{Form::label('finger size','Finger_size')}}
                </div>
    {!! Form::close() !!}
@endsection