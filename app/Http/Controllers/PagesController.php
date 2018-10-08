<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        return view('pages.about');
    }

    public function index(){
        $title = 'Welcome to GJS portal';
        return view('pages.index')->with('title',$title);
    }
}