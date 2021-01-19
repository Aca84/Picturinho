<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show','search']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10); // This will return last created post on top
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $request->validate(
        //     ['search'=>'required|min:1']
        // );
        $search = $request->input('searchQuery');
        $posts = Post::where('title', 'like', "%$search%")->get();
        
        return view('search')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            // 'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);      

        $user = auth()->user()->name; // User name for naming the image folder
        // Check if request has image in form
        if ($request->hasFile('image')) {
            // Working upload shorter
            $fileNameToStore = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore); // All images in one folder
            // $path = $request->file('image')->storeAs('public/images/'.$user, $fileNameToStore); // For every user create his (name) folder     
        }else{

            $fileNameToStore = 'noimage.jpg';
        }

        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->image = $fileNameToStore;
        $post->save();
  
        return redirect('/posts')->with('success', 'You have successfully crated a post.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        // Check for correct user 
        if(Auth::user()->id !== $posts->user_id){
            return redirect('/posts')->with('error', 'Nije moguce');
        } 
        return view('posts/edit')->with('posts',$posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);      
        // Check if request has image in form
        $user = auth()->user()->name; // what user it is
        if ($request->hasFile('image')) {

            $fileNameToStore = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images/'.$user, $fileNameToStore);
        }
        // Update post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('image')) {
            $post->image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Check for correct user 
        if(Auth::user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Nije moguce');
        } 
        // Delete image from folder
        $user = auth()->user()->name;
        $destinationPath = 'public/images/'.$user;
        if ($post->image != 'noimage.jpg') {
            // Storage::delete('public/images/'.$post->image); //Working if img is in images folder
            // Storage::delete(Storage::path($post->image));
            Storage::delete('public/images/'.$user, $post->image); // Not deleting anything           
        }
        $post->delete();

        return redirect('/posts')->with('success','You have successfully deleted a post.');
    }
}
