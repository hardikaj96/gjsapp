@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1>GJS</h1>
        <p> <?php echo $type = Auth::user()->type;
            ?></p>
    </div>
   
   


    
    
@endsection