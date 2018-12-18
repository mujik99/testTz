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
    </div>
@endsection