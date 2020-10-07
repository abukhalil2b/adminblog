<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
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
        return view('home');
    }

    

    public function postIndex()
    {
        
        $posts = Post::all();

        $user=auth()->user();
        if($user->user_type=='normal'){
            $posts = Post::where('user_id',$user->id)->get();
        }
        
        return view('post.index',compact('posts'));
    }

    public function postShow($id)
    {
        $post = Post::find($id);
        return view('post.show',compact('post'));
    }


    public function postAccept($id)
    {
        Post::find($id)->update(['active'=>1]);
        $posts = Post::all();

        return view('post.index',compact('posts'));
    }

    public function postCreate()
    {
        return view('post.create');
    }

    public function postStore(Request $request)
    {
         
        $request->validate([

            'image' => 'required|mimes:jpg,jpeg,png|max:2048',

        ]);


       $fileName = time().'.'.$request->image->getClientOriginalExtension(); 


        $request->image->move(public_path('storage'), $fileName);

        $title = $request->title;
        $content = $request->content;

        $post = new Post;
        $user = auth()->user();

        $post->title=$title;
        $post->content=$content;
        $post->img=$fileName;
        $post->user_id=$user->id;

        $post->save();
        
        $posts = Post::all();
        if($user->user_type=='normal'){
            $posts = Post::where('user_id',$user->id)->get();
        }

        
        return redirect()->route('admin.post.index',compact('posts'));


    }



}
