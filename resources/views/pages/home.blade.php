@extends('layout.index')
 @section('content')
 <div>
    <section id="feature-post">
        <div class="container center" id="Latest-posts">
            <h2 class="section-title">Featured Posts</h2>
            <div class="meddivide"></div>
            <div class="row">
            @foreach($featured_post as $post)
<?php $categories = $post->categories()->select(['id', 'name', 'slug'])->take(1)->get();?>
<?php $user       = $post->users()->select(['id', 'username', 'fullname', 'media_id'])->get()[0];?>
<?php $media_user = $user->media()->select(['name'])->get()[0];?>
<?php $media_post = $post->media()->select(['name'])->get()[0];?>
<div class="fp-box ">
                @foreach($categories as $c)
                    <a href="{{ $uri_category . $c->id .'/' . $c->slug . $html }}">
                        <span class="fp-category">{{ $c->name }}</span>
                     </a>
                @endforeach
                     <a href="{{ $uri_post . $post->id . '/' . $post->slug . $html  }}">
                        <div class="featuredtext">
                            <h3 class="fp-title">{{ $post->title }} </h3>
                            <p class="desp">{{ $post->description }} </p>
                        </div>
                    </a>
                    <div class="fp-img" style='background-image: url("{{  $path_images . $media_post->name }}")'></div>
                    <div class="author-img">
                        <a href="{{ $uri_author . $user->id . '/' . $user->username . $html}}">
                            <figure>
                                <img  src="{{ $path_images . $media_user->name }}">
                            </figure>
                            <figcaption>{{ $user->fullname }}</figcaption>
                        </a>
                        <p class="date-update">{{ $post->created_at }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

    <section id="most-recent">
        <div class="container center" id="most-recent">
            <h2 class="section-title">Most Recent</h2>
            <div class="meddivide"></div>
            <div class="mr-content">
            @foreach($most_post as $post)
<?php $categories = $post->categories()->select(['id', 'name', 'slug'])->take(1)->get();?>
<?php $user       = $post->users()->select(['id', 'username', 'fullname', 'media_id'])->get()[0];?>
<?php $media_user = $user->media()->select(['name'])->get()[0];?>
<?php $media_post = $post->media()->select(['name'])->get()[0];?>
                <div class="mr-box wcol col4">
                <div class="mr-box-a">
                    <div class="img-thumnail ">
                        <div class="img" style='background-image: url("{{ $path_images . $media_post->name  }}")'></div>
                        @foreach($categories as $c)
                            <a href="{{ $uri_category . $c->id .'/' . $c->slug . $html }}">
                              <span class="fp-category">{{ $c->name }}</span>
                            </a>
                         @endforeach
                    </div>

                    <a href="{{ $uri_post . $post->id . '/' . $post->slug . $html }}" >
                        <div class="ms-text">
                            <h3 class="mr-title">{{ $post->title }}</h3>
                            <p class="mr-desp">{{ $post->description }}</p>
                        </div>
                    </a>

                    <div class="mr-author-img">
                        <a href="{{ $uri_author . $user->id . '/' . $user->username . $html }} ">
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
<title>HaToan</title>
@endsection


@section('feature-img')

        <section id="feature-img">
            <div class="container center">
                <p class="title-msg">Let's do it together.
                </p>
                <p class="content-msg">We travel the world in search of stories. Come along for the ride</p>
                <a class="button-msg" href="#Latest-posts">View Latest Posts</a>
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