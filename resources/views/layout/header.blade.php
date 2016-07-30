<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @yield('title')
    <base href="{{asset('')}}">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div>
        <header id="header">
            <div class="w-nav header-nav">
                <div class="container">
                    <div class="header-nav-logo">
                        <a href="#">HaToan</a>
                    </div>
                    <nav class="header-nav-menu">
                        <ul>
                            <li><a href="{{ asset('home').$html }}">HOME</a></li>
                            <li><a href="{{ asset('category/categorys').$html }}">CATEGORIES</a></li>
                            <li><a href="{{ asset('about').$html }}">ABOUT</a></li>
                            <li><a href="{{ asset('contact').$html }}">CONTACT</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        @yield('feature-img')

        @yield('nav-category')