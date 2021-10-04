<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countUn = Post::wherePostLive('0')->count();
        $countPo = Post::wherePostLive('1')->count();
        $countUs = User::whereIsAdmin('0')->count();

        return view('admin', compact('countPo', 'countUn', 'countUs'));
    }
}
