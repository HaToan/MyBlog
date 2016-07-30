 @extends('admin.layout.index')

 @section('content')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Users
                            <small>Edit</small>
                        </h1>
                    </div>
                     @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{ $err }} <br />
                            @endforeach
                        </div>
                    @endif

                     @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('messages'))
                        <div class="alert alert-success">
                            {{ session('messages') }}
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        <form action="admin/user/edit/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" name="fullname" placeholder="Please Enter Users Name"  value="{{ $user->fullname }}" />
                            </div>
                         <div class="form-group">
                                <label>UserName</label>
                                <input class="form-control" name="username" placeholder="Please Enter Users Name"  value="{{ $user->username }}"/>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter  Email "  type="email" value="{{ $user->email }}"/>
                            </div>

                            <div class="form-group">
                        <label> Description</label>
                        <textarea class="form-control" rows="3" name="description">{!! $user->description !!}</textarea>
                    </div>


                            <div class="form-group">
                                <label>Level</label>
                                <input class="form-control" name="level"  placeholder="Please Enter Level" value="{{ $user->level }}" />
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password"  />
                            </div>

                            <div class="form-group">
                                <label>Confirm Your Password</label>
                                <input class="form-control" name="confirmpassword" type="password"  />
                            </div>



                    <div id="featured-images">
                            <span class="label label-info label-size-14">Featured Images</span> <br />
                            <img id="featured-images-img" src="{{ 'uploads/media/' . $user->media['name'] }}" alt="" width="120px" height="120px" /> <br />
                            <input type="hidden" name="avatar" id="images-id">
                            <a  data-toggle="modal" data-target="#myModal">Set Featured Images</a>

                        </div>

                            <input type="hidden" name="_token" value="{{  csrf_token() }}">
                            <button type="submit" class="btn btn-default">Users Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

@endsection

 @section('uploads')
            <!-- Trigger the modal with a button -->
            <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-size">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Upload</a></li>
                                <li><a id="click_menu1" data-toggle="tab" href="#menu1" onclick="loadImages()">List</a></li>

                            </ul>
                        </div>

                        <div class="tab-content" id="drag-drop">
                            <div id="home" class="tab-pane fade in active">
                                <div  class="mr-center">
                                    <form action="#">

                                        <input class="file-upload" type="file" id="files"  multiple />
                                        <input value="Select Files" type="button" onclick="openFileDialog();">
                                        <input id="csrf-token" value="{{ csrf_token() }}" type="hidden" />
                                        <h2>    Drop files here</h2>

                                    </form>
                                </div>
                            </div><!-- end home-->

                            <div id="menu1" class="tab-pane fade">
                                <div  class="list-images scrollbar-images" >
                                    <ul id="list-img">

                                    </ul>
                                </div>
                                <div class="info-images">
                                    <h3>Info Images</h3>
                                    <div id="info-img"></div>
                                    <a href="{{ asset('admin/media/delete') }}">Delelte</a>
                                </div>
                            </div><!-- end menu1 -->
                            <div class="clear"></div>

                        </div><!-- end tab-content-->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="chooseImg()">Choose</button>
                        </div>
                    </div>

                </div>
            </div>
            <script type="text/javascript" src="admin_asset/js/sendfile_FormData_XHR.js"></script>
            @endsection