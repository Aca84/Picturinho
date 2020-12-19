<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
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
        // $posts = Post::search($search)->get(); // This will return search  result
        // $posts = Post::search('title')->where('title', $search)->get(); // This will return search  result
        $posts = Post::where('title', 'like', "%$search%")->get();
        // $posts = Post::search("%$search%")->get();
        // return dd($posts);
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

        //Image upload
        // if ($request->hasFile('image')) {
            # code...
            // return $fileNameToStore = $request->file('image')->getClientOriginalName();
            // $fileNameToStore = $request->file('image')->store('gallery');
            // return dd($fileNameToStore);
            // return $path = Storage::put('gallery',$fileNameToStore);
            // Storage::disk('local')->put('galleryies', $fileNameToStore);
            // $fileNameToStore = $img.'_'.time().'.'.$path;
            // $path = Storage::makeDirectory('gallery');
            // return $path;
            // $fileNameToStore = $request->file('image')->getClientOriginalName();
            // Storage::disk('local')->put('images', $fileNameToStore);
            // Storage::put('public', $fileNameToStore);
            // $path = $request->file('image')->store('public/images');
            // $fileNameToStore = $request->image->store('images');
            
        // }
        // else{
            // $fileNameToStore = 'noimage.jpg';
        // }
        
        // Check if request has image in form
        if ($request->hasFile('image')) {
            // Working upload shorter
            $fileNameToStore = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            // Storage::put($fileNameToStore, $resource);
            // $image_path = Storage::disk('public')->putFile('folders/inside/public', $request->file('image'));
            // return $request->$name->store('images');
            // $img = $request->file('image')->store('images');
            // $request->image->storeAs('images', $request->logo->getClientOriginalName());

            // Working upload
            // $img = $request->file('image')->getClientOriginalName();
            // $filename = pathinfo($img, PATHINFO_FILENAME);      
            // $extension = $request->file('image')->extension();
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // $path = $request->file('image')->storeAs('public/gallery',$fileNameToStore);

        }else{

            $fileNameToStore = 'noimage.jpg';
        }

        //Create post
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
        //check for correct user 
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
        if ($request->hasFile('image')) {

            $fileNameToStore = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }

        //Update post
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
        //check for correct user 
        if(Auth::user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Nije moguce');
        } 
        // Delete image from folder
        if ($post->image != 'noimage.jpg') {
            Storage::delete('public/images/'.$post->image);
        }
        $post->delete();

        return redirect('/posts')->with('success','You have successfully deleted a post.');
    }
}
