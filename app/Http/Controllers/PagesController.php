<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cost;
use JavaScript;

class PagesController extends Controller
{
    public function about(){
        return view('pages.about');
    }
    public function index(){
        $title = 'Welcome to GJS portal';
        return view('pages.index')->with('title',$title);
    }
    public function users(){
        $users =  DB::table('users')->get();
        return view('pages.users')->with('users',$users);
    }
    public function delete($id)
    {
        DB::delete('delete from users where id = ?',[$id]);
        $res = "User Deleted Successfully";
        $users =  DB::table('users')->get();
        return view('pages.users')->with('users',$users)->with('res',$res);
    }
}