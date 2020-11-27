<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('type', '!=', 'Discussion')->orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('posts', $posts);
    }

    public function discussions()
    {
        $discussions = Post::where('type', '=', 'Discussion')->orderBy('created_at', 'desc')->get();
        return view('posts.discussions')->with('discussions', $discussions);
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
            'caption' => 'required|string',
            /* 'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' */
        ]);

        if($request->hasfile('images'))
        {

            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('images/', $name);
                $data[] = $name;
            }
        }

        //Store post
        $posts = new Post();
        $posts->user_id = Auth()->user()->id;
        $posts->user_name= Auth()->user()->name;
        $posts->type = $request->input("type");
        $posts->caption = $request->input("caption");
        if($request->hasfile('images')){
            $newImages = substr(json_encode($data),2,-2);
            $posts->images = $posts->images.$newImages;
        }
        $posts->save();

        return redirect('/posts')->with('success', 'Your post was added successfully (:');
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
        return view('posts.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
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
            'caption' => 'required|string',
            /* 'images' => 'required', */
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('images'))
         {

            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('images/', $name);
                $data[] = $name;
            }
         }


        //Update post
        $posts =  Post::find($id);
        $posts->user_id = Auth()->user()->id;
        $posts->user_name= Auth()->user()->name;
        $posts->caption = $request->input('caption');
        if($request->hasfile('images')){
            $newImages = substr(json_encode($data),2,-2);
            $posts->images = $posts->images.'","'.$newImages;
        }
        $posts->save();

        return redirect('/posts')->with('success', 'Your post was updated successfully (:');
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
        $post->delete();

        return redirect('/posts')->with('success', 'Your post was deleted successfully!');
    }
}
