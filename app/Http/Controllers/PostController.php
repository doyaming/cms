<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::all();
        // $posts = Post::get();
        $posts = Post::orderBy('id','DESC')->get();
        return view('index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //驗證 validate
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'cover'     => 'image'
            // 'cover'     => 'required | image'
        ]);

        //上傳
        // return $request->file('cover')->store('images');
        // return $request->file('cover')->store('images','public');
        // $cover_name = $request->file('cover')->getClientOriginalName();
        if($request->file('cover')){
            $cover_ext = $request->file('cover')->getClientOriginalExtension();
            $cover_name = md5(time()).'.'.$cover_ext;
            $request->file('cover')->storeAs('public/images',$cover_name);
        }else{
            $cover_name = 'no-pic.png';
        }

        //
        // 方法一
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        // 方法二
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        $post->cover = $cover_name;
        $post->save();

        // 方法三
        // Post::create($request->all());


        return redirect('/');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('posts.show',compact('post'));

        // $post = Post::where('id',$post->id)->first();
        // $post = Post::find($post->id);
        // $post = Post::findOrFail($post->id);
        // return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        // $post = Post::findOrFail($post->id);
        // $post->fill([
        //     'title'     => $request->title,
        //     'content'   => $request->content
        // ]);

        // $post = Post::findOrFail($post->id);
        // $post->fill($request->all());
        // $post->save();

        $post->fill($request->all());
        $post->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        // $post = Post::findOrFail($post->id);
        // $post->delete();

        // $post->delete();
        // Storage::delete('public/images/'.$post->cover);
        Post::destroy($post->id);
        return redirect('/');
    }
    public function getAllTrash(){

        $posts = Post::onlyTrashed()->get();

        return view('posts.trash',compact('posts'));

    }
}
