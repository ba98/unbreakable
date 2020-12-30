<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Post;

class PostsController extends Controller
{
    
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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'caption' => 'required|string',
        ]);

        if($request->hasfile('images'))
        {

            foreach($request->file('images') as $image)
            {
                $name = auth()->user()->id.'_image'.time().'.'.$image->getClientOriginalName();
                $image->move('images/', $name);
                $data[] = $name;
            }
        }

        //Store post
        $posts = new Post();
        $posts->user_id = auth()->user()->id;
        $posts->user_name= auth()->user()->name;
        $posts->type = $request->input("type");
        $posts->caption = $request->input("caption");
        if($request->hasfile('images')){
            $newImages = substr(json_encode($data),2,-2);
            $posts->images = $posts->images.$newImages;
        }
        $posts->save();

        return redirect('/posts')->with('success', 'Your post was added successfully (:');
    }

    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with('posts', $posts);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'caption' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('images'))
        {

            foreach($request->file('images') as $image)
            {
                $name = auth()->user()->id.'_image'.time().'.'.$image->getClientOriginalName();
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

    public function destroy($id)
    {
        $post = Post::find($id);
        $imageName = strtr($post->images, "\"", " ");
        $imageName = explode(' , ', trim($imageName));
        $post->delete();

        foreach($imageName as $img){
            File::delete('images/'. $img);
        }

        return redirect('/posts')->with('success', 'Your post was deleted successfully!');
    }
}
