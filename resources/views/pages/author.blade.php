@extends('layout.index')
@section('content')
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