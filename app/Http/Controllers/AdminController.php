<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
                       
        $users = User::latest()->get();
        $posts = Post::latest()->get();

        return view('admin.index')->with('users', $users)->with('posts', $posts);
        }

        return redirect('/posts')->with('error', 'Only Admin');
    }
}
