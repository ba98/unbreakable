@extends('layouts.app')

@section('content')
    <style>
        #previmg {
            border-radius: 15px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
            margin-right: 2px;
            margin-top: 2px;
            width: 260px;
        }

        .hide {
            display: none !important
        }

    </style>
    @include('inc.sidebar')
    @php
        $imageName = strtr($post->images, "\"", " ");
        $imageName = explode(' , ',trim($imageName));
    @endphp

    <div class="container bg-light" style="border-radius: 20px"><br>
        <div class="row" style="justify-content:center;">
            <div class="col-md-6">
                <div class="page-header">
                    <h2>Edit post</h2>
                    <hr>
                </div>
                {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'PUT', 'enctype' =>
                'multipart/form-data']) !!}
                {{ csrf_field() }}
                <input type="radio" name="type" value="Moment" checked>
                <label for="">Moment</label>
                <label for="" style="float: right; padding-left:3px">Discussion</label>
                <input type="radio" name="type" value="Discussion" style="float: right; margin-top:3px">
                <br><br>
                {{ Form::label('caption', 'Caption|Discussion') }}
                {{ Form::textarea('caption', $post->caption, ['class' => 'form-control', 'placeholder' => '', 'rows' => 4, 'id' => 'counter']) }}<br>

                {{ Form::label('images', 'Add Images') }}
                <div class="input-group control-group increment">
                <input type="file" name="images[]" class="form-control" id="image" onchange="preview_image();" multiple>
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="button">Add <i class="fas fa-plus"></i></button>
                    </div>
                </div>

                <div class="clone hide">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input type="file" name="images[]" class="form-control" id="image" onchange="preview_image();"
                            multiple>
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="button">Remove <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div><br>

            </div>
        </div>

        <div class="container" style="justify-content:center; text-align:center;">
            <h4>Preview images</h4>
            <div id="image_preview">
                @if(Count($imageName) >= 1)
                @foreach ($imageName as $i => $imageName)
                    <img src="/images/{{$imageName}}" alt="" id="previmg">
                @endforeach
                @else
                <h2></h2>
                @endif
            </div>

        </div>

        {{ Form::reset('Reset', ['class' => 'float-right btn btn-danger', 'style' => '']) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-light', 'style' => 'background-color:#60779c']) }}
        {!! Form::close() !!}
        <br><br>
    </div><br><br>
    </div>
    </div>
    {{-- @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <script type="text/javascript">
        $(document).ready(function() {

            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });

        });

    </script>
@endsection
