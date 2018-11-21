@extends('layouts.app')
@section('content')
        <div class="jumbotron text-center">
            @if (Auth::user() && Auth::user()->is_admin == 1)
             <div class="form-group">
                @isset($res)
                    <div class="alert alert-success">
                        {{ $res }}
                    </div>
                @endif
                    <div class='text-center'>
                        <div class="border rounded">
                            <H3>USERS</H3>
                            <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                            <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Created at</th>
                                            <th scope="col">Modify</th>
                                            </tr>
                                    </thead>
                                    <tbody id="userss">
                                            @foreach ($users as $us)
                                            <tr>
                                                <td>{{ $us->name}}</td>
                                                <td>{{ $us->email}}</td>
                                                @if( $us->is_admin == '1')
                                                    <td>Admin</td>
                                                @else
                                                    <td>User</td>
                                                @endif
                                                <td>{{ $us->created_at}}</td>
                                                <TD>
                                                <form action="{{action('PagesController@delete', $us->id)}}" method="get">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                  </form></TD>
                                            </tr>
                                            @endforeach
                                    </tbody>
                            </table>  
                        </div>
                    </div>
                </div>
                @else
                    Admin Only Page  
                @endif   
        </div>
@endsection

