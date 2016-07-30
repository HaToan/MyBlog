@extends('layout.index')
@section('content')
<div class="content-post">
            <div class="container">
                <div class="sectionheading">
                    <a href="{{ $uri_post . $post->id . '/' . $post->slug . $html }}"><h1 class="post-title">{{ $post->title }}</h1></a>
                    <div class="blogdate">{{ $post->created_at }}</div>
<?php $categories = $post->categories()->select(['id', 'name', 'slug'])->take(3)->get();?>
<?php $user       = $post->users()->select(['id', 'fullname', 'username', 'media_id', 'description'])->get()[0];?>
<?php $media_user = $user->media()->select(['name'])->get()[0];?>
<?php $media_post = $post->media()->select(['name'])->get()[0];?>
@foreach( $categories as $c )
                        <a class="blogcategory" href="{{ $uri_category . $c->id . '/' . $c->slug . $html }}">{{ $c->name }}</a>
                    @endforeach
                </div>
                <div class="fulldivide"></div>
            <!-- headding -->

            <div class="blogpost">
                {!! $post->content !!}
            </div><!-- end content post-->

            <div class="fulldivide"></div>


            <div class="author-wrap">
                <a href="{{  $path_images . $media_user->name }}" class="author-link">
                    <img src="{{ $path_images . $media_user->name }}" class="author-photo">
                </a>
                <a href="{{ $uri_author . $user->id . '/' . $user->username . $html }}" class="author-name">{{ $user->fullname }}</a>

                <div class="smallestdivider"></div>

                <div class="author-text">
                    <p>{!! $user->description !!}</p>

                </div>

                <div class="sociallink">
                    <a href="#">
                        <img src="imgs/face.svg">
                    </a>
                    <a href="#">
                        <img src="imgs/face.svg">
                    </a>
                    <a href="#">
                        <img src="imgs/face.svg">
                    </a>
                </div>
            </div>

            </div>
        </div>


        <div><!-- start last post-->
            <section id="most-recent">
                <div class="container center" id="most-recent">
                    <h2 class="section-title">Latest Post</h2>
                    <div class="meddivide"></div>
                    <div class="row">
                @foreach($late_posts as $post)
<?php $user       = $post->users()->select(['id', 'fullname', 'username', 'media_id'])->get()[0];?>
<?php $media_user = $user->media()->select('name')->get()[0];?>
<?php $media_post = $post->media()->select('name')->get()[0];?>
<?php $c          = $post->categories()->select(['id', 'slug', 'name'])->take(1)->get()[0];?>
                        <div class="mr-box wcol col4">
                <div class="mr-box-a">
                    <div class="img-thumnail ">
                        <div class="img" style=' background-image: url("{{ $path_images . $media_post->name  }}") '></div>
                        <a href="{{ $uri_category . $c->id . '/' . $c->slug . $html }}">
                            <span class="mr-category">{{ $c->name }}</span>
                        </a>
                    </div>

                    <a href="{{ $uri_post . $post->id . '/' . $post->slug . $html }}" >
                        <div class="ms-text">
                            <h3 class="mr-title">{{ $post->title }}</h3>
                            <p class="mr-desp">{{ $post->description }}</p>
                        </div>
                    </a>

                    <div class="mr-author-img">
                        <a href="{{ $uri_author . $user->id . '/' . $html }}">
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
            </section> <!--end last post -->
        </div>
@endsection



@section('title')
<title>Blog Posts - {{ $post->title }}</title>

@endsection


@section('feature-img')

        <section id="feature-img" style="height:300px; padding-top:130px;    background-image: linear-gradient(135deg, rgba(30, 33, 33, 0.20) 1%, rgba(32, 32, 32, 0.09) 98%), url('{{ $path_images . $media_post->name }}');">
            <div class="container center">
                <p class="content-msg" style="margin-bottom:10px;"></p>

                <p class="title-msg" style="margin-bottom:40px;">
                </p>

            </div>

        </section>
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