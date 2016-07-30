@extends('layout.index')
@section('content')
<section id="content-category" >
    <div class="container center" id="categories">
     <h2  class="section-title">Categories</h2>
     <div class="meddivide"></div>
     <div class="mr-content">
        @foreach($categories as $c)
<?php $media_c = $c->media()->select('name')->get()[0];?>
        <div class="cate-box" style=' background-image: url("{{  $path_images . $media_c->name }}"); '>
            <a href="{{  $uri_category . $c->id . '/' . $c->slug .$html }}">
                {{ $c->name }}
            </a>
        </div>
        @endforeach
    </div>

</div>
</section>
@endsection

@section('title')
<title>Categories | HaToan</title>

@endsection


@section('feature-img')

<section id="feature-img" style="height:300px; padding-top:130px">
    <div class="container center">
        <p class="content-msg" style="margin-bottom:10px;">Showing all categories in</p>

        <p class="title-msg" style="margin-bottom:40px;">Categories
        </p>

    </div>

</section>
@endsection


@section('nav-category')
<nav id="category">
    <div class="container">
        <ul class="category-ul">
            @foreach($cate as $c)
            <li><a href="{{ $uri_category . $c->id . '/' . $c->slug . $html }}">{{ $c->name }}</a></li>
            @endforeach
        </ul>
    </div>
</nav>
@endsection