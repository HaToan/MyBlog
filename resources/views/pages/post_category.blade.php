@extends('layout.index')
@section('content')
<div>

           <section id="most-recent">
        <div class="container center" id="most-recent">
            <h2 class="section-title">Posts - {{ $category->name }}</h2>
            <div class="meddivide"></div>
            <div class="mr-content">
<?php $posts = $category->posts()->select(['id', 'title', 'description', 'slug', 'created_at', 'media_id', 'user_id'])->get();?>
@foreach($posts as $post)
<?php $user       = $post->users()->select('id', 'fullname', 'username', 'media_id')->get()[0];?>
<?php $media_user = $user->media()->select('name')->get()[0];?>
<?php $media_post = $post->media()->select('name')->get()[0];?>
<div class="mr-box wcol col4">
                <div class="mr-box-a">
                    <div class="img-thumnail ">
                        <div class="img" style=' background-image: url("{{  $path_images . $media_post->name }}")  '></div>
                        <a href="{{ $uri_category . $category->id . '/' . $category->slug .$html}}">
                            <span class="mr-category">{{ $category->name }}</span>

                        </a>
                    </div>

                    <a href="{{ $uri_post . $post->id . '/' . $post->slug .$html}}" >
                        <div class="ms-text">
                            <h3 class="mr-title">{{ $post->title }}</h3>
                            <p class="mr-desp">{!! $post->description !!}</p>
                        </div>
                    </a>

                    <div class="mr-author-img">
                        <a href="{{ $uri_author . $user->id . '/' . $user->username .$html}}">
                            <figure>
                                <img  src="{{ $path_images . $media_user->name }}">
                            </figure>
                            <figcaption>{{ $user->fullname }}</figcaption>
                        </a>

                        <p class="mr-date-update">{{ $post->created_at }}</p>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
        </div>
@endsection


@section('title')
<title>Category - {{ $category->name }} </title>

@endsection


@section('feature-img')
<?php
if (!empty($category->media_id)) {
	$media_cate = $category->media()->select('name')->get()[0];
}
?>
        <section id="feature-img" style="height:300px; padding-top:130px; background-image: url('{{ $path_images .  $media_cate->name }}')">
            <div class="container center">
                <p class="content-msg" style="margin-bottom:10px;">Showing all posts in</p>

                <p class="title-msg" style="margin-bottom:40px;">{{ $category->name }}
                </p>

            </div>

        </section>
}
@endsection


@section('nav-category')
<nav id="category">
            <div class="container">
                <ul class="category-ul">
                @foreach($cate as $value)
                    <li><a href="{{asset('category')}}/{{ $value->id }}/{{ $value->slug . $html}}">{{ $value->name }}</a></li>
                @endforeach
                </ul>
            </div>
        </nav>
@endsection