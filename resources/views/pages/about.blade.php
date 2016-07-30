@extends('layout.index')
@section('content')
<section id="content-about">
        <div class="container">
            <div class="row" >
                <div class="col4 ">
                    <img src="{{ $path_images . $user->media()->select(['name'])->get()[0]->name }}" width="344">
                </div>

                <div class="col8 about-right">
                    <p>
                        {!! $user->description !!}
                    </p>
                </div>
            </div>
            </div>
        </section>
@endsection

@section('title')
<title>HaToan | About</title>
@endsection


@section('feature-img')

        <section id="feature-img" style="height:300px; padding-top:130px; ">
            <div class="container center">
                <p class="content-msg" style="margin-bottom:10px;"></p>

                <p class="title-msg" style="margin-bottom:40px;">About
                </p>

            </div>

        </section>
@endsection


