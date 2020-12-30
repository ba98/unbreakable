<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment_body' => 'required'
        ]);

        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $this->validate($request, [
            'comment_body' => 'required'
        ]);

        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($reply);

        return back();

    }

    public function destroy($id)
    {

        $comment = Comment::find($id);
        $comment->deleteRelatedData();

        return back()->with('success','Your comment was deleted successfully!');
    }
}
