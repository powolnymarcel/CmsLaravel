<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categories;
use App\Http\Requests;

class AdminController extends Controller
{
    public function getIndex(){
        //Chercher les posts
        $posts= Post::orderBy('created_at','desc')->take(3)->get();
        return view('admin.index',['posts'=>$posts]);
    }
}
