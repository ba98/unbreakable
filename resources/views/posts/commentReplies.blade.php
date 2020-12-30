<style>
    .commentimg{
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2) !important;
        border-radius: 50% !important;
        object-fit: cover;
        width: 55px;
        height: 55px;
    }
</style>
@foreach($comments as $comment)
    <div class="display-comment" style="color:#000; background-color:#fff; padding-left:10px;">
        <br>
        <div class="row">
            <div class="col-md-">
                <img class="commentimg" style="margin-left: 10px" src="../storage/images/{{$comment->user->image}}" alt="{{$comment->user->name}}">
            </div>
            <div class="col-md-2" style="margin-top:20px;">
                <strong>{{$comment->user->name}}</strong>
            </div>
        </div><br>

        <p style=" width:80%;">{{$comment->body}}</p>
        <a href="" id="reply"></a>
        @if(Auth::user()->id == $comment->user_id)
            {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'DELETE', 'class' => 'float-right', 'style' => 'margin:-50px 10px 0px 0px'])!!}
            <button type="submit" class=" btn btn-danger" onclick="return confirm('Are you sure you want to delete this comment permanently?');"><i class="far fa-trash-alt"></i></button>
            {!!Form::close()!!}
        @endif

        {!!Form::open(['action' => 'CommentsController@replyStore', 'method' => 'GET'])!!}
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" placeholder="Write a reply...">
                <input type="hidden" name="post_id" value="{{ $post_id }}"/>
                <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>

            {{Form::hidden('_method', 'PUT')}}
            <button class=" btn btn-light" type="submit" style="background-color:#60779c"><i class="fas fa-comment-alt"></i></button>
        </div>
        {!!Form::close()!!}
        @include('posts.commentReplies', ['comments' => $comment->replies])
    </div>
@endforeach
