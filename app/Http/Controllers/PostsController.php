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

        if($request->input("type") == "Discussion"){
            $this->validate($request, [
                'caption' => 'required|string',
            ]);
        }else{
            $this->validate($request, [
                'caption' => 'required|string',
                'images'=> 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }
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
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->user_name= auth()->user()->name;
        $post->type = $request->input("type");
        $post->caption = $request->input("caption");
        if($request->hasfile('images') && $request->input("type") == "Moment"){
            $newImages = substr(json_encode($data),2,-2);
            $post->images = $post->images.$newImages;
        }
        $post->save();

        $latest = Post::where('user_id', auth()->user()->id)->latest("id")->first();
        return redirect('/posts/'.$latest->id)->with('success', 'Your post was created successfully (:');
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
        if($request->input("type") == "Discussion"){
            $this->validate($request, [
                'caption' => 'required|string',
            ]);
        }else{
            $this->validate($request, [
                'caption' => 'required|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }
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
        $post =  Post::find($id);
        $post->user_id = Auth()->user()->id;
        $post->user_name= Auth()->user()->name;
        $post->caption = $request->input('caption');

        if($request->hasfile('images') && $post->type == "Moment"){
            $newImages = substr(json_encode($data),2,-2);
            if($post->images != Null){
                $post->images = $post->images.'","'.$newImages;
            }else{
                $post->images = $post->images.$newImages;
            }
        }

        $post->save();

        return redirect('/posts/'.$id)->with('success', 'Your post was updated successfully (:');
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
