<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use DB;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts=Post::all()->paginate(1);
        //$posts=Post::all()->take(1);
        $posts=Post::orderBy('title', 'asc')->paginate(10);
        //$posts=DB::select('select * from posts');
        //Post::where('title', 'Post two')->get();
        return view('posts.index')->with('posts',$posts);
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
            '#editor'=> 'required'
        ]);
        $post = new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('#editor');
        $mytime = Carbon::now()->setTimezone('EEST');
        $post->created_at=$mytime->toDateTimeString();
        $post->save();

        return redirect('/posts')->with('success', 'Post added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details=Post::find($id);
        return view('posts.details')->with('details', $details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit')->with('post', $post);
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
            '#editor'=> 'required'
        ]);
        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('#editor');
        $mytime = Carbon::now()->setTimezone('EEST');
        $post->updated_at=$mytime->toDateTimeString();
        $post->save();

        return redirect('/posts/'.$id)->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post removed!');
    }
}
