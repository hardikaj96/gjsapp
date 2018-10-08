@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1>GJS</h1>
        <p>You can Login and start getting product costs</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">LOGIN</a>  <a class="btn btn-primary btn-lg" href="/register" role="button">REGISTER</a></p>
    </div>
    @if(count($costs)>0)
                <ul class="list-group">
                        @foreach($costs as $cost)
                                <li class="list-group-item">{{$cost->finger_size}}</li>
                        @endforeach
                </ul>
        @else
                <p>NoT available</p>

    @endif
    
@endsection