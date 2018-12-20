@extends('layouts.main')

@section('content')
    <div class="full-height ">
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <div class="post_title">{{$post->post_title}}</div>
                    <div class="post_content">
                        <div class="post_img">
                            @if(!empty($terminal->img_path))
                                <img src="{{ URL::asset('public/img/'. $terminal->img_path .'') }}"  alt='photo'>
                            @else
                                <img src="{{ URL::asset('public/img/no_photo.png') }}"  alt='no fhoto'>
                            @endif
                        </div>
                        <div class="post_description">{{$post->description}}</div>
                        <div class="clear"></div>
                    </div>
                    <div class="post_author">{{$post->author_name}}</div>
                    <div class="post_date">{{$post->created_at}}</div>
                    <div class="clear"></div>
                </div>
            @endforeach
        </div>
        <div class="post-create">
            <form class="create-post-form" onsubmit="return false" action="#" method="post">
                <h2>Post Create</h2>
                <label>Post Title</label>
                <input class="form-control" name="title" required type="text">
                <label>Post Description</label>
                <input class="form-control" name="description" required type="text">
                <label>Author name</label>
                <input class="form-control" name="author" required type="text">
                <button class="btn btn-success btn-create">Create</button>
            </form>
        </div>
        <div class="clear"></div>
    </div>
@endsection