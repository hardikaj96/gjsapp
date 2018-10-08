@extends('layouts.app')
@section('content')
        <div class="jumbotron text-center">
                <h1><?php echo $title ?></h1>
                <p>You havew to wait</p>
                <p><a class="btn btn-primary btn-lg" href="/login" role="button">LOGIN</a>  <a class="btn btn-primary btn-lg" href="/register" role="button">REGISTER</a></p>
        </div>
@endsection

