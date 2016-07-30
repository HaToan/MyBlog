  <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">HaToan - Blog</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        @if(Auth::check())
                        {{  Auth::user()->name }}
                        @endif
                          <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>
                         @if(Auth::check())
                        {{  Auth::user()->username }}
                        @endif

                        </a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>


                        {{-- media --}}
                        <li>
                            <a data-target="#myModal" data-toggle="modal"><i class="fa fa-cloud-upload" aria-hidden="true" ></i> Media<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        {{-- /media--}}

                        {{-- category --}}
                        <li>
                            <a href="#"><i class="fa fa-code-fork" aria-hidden="true"></i> Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/category">List Categories</a>
                                </li>
                                <li>
                                    <a href="admin/category/add">Add Categories</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        {{-- /category--}}


{{-- Tag --}}
                        <li>
                            <a href="#"><i class="fa fa-tags" aria-hidden="true"></i> Tag<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/tag">List Tag</a>
                                </li>
                                <li>
                                    <a href="admin/tag/add">Add Tag</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        {{-- /Tag--}}


                        {{-- Users --}}
                        <li>
                            <a href="#"><i class="fa fa-users" aria-hidden="true"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user">List User</a>
                                </li>
                                <li>
                                    <a href="admin/user/add">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        {{-- /Users--}}



                        {{-- comment --}}
                        <li>
                            <a href="#"><i class="fa fa-comments" aria-hidden="true"></i> Comment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/comment">List Comment</a>
                                </li>
                                <li>
                                    <a href="admin/comment/add">Add Comment</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        {{-- /comment--}}

                        {{-- post --}}
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/post">List Post</a>
                                </li>
                                <li>
                                    <a href="admin/post/add">Add Post</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        {{-- /Post--}}


                        {{-- slider --}}
                        <li>
                            <a href="#"><i class="fa fa-sliders" aria-hidden="true"></i> Slider<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/slider">List Slider</a>
                                </li>
                                <li>
                                    <a href="admin/slider/add">Add Slider</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        {{-- /slider--}}


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>