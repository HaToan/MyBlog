 @extends('admin.layout.index')

 @section('content')

 <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Post
                <small>Add</small>
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
                <form action="admin/post/add" method="POST" enctype="multipart/form-data">
                <div class="col-lg-9" style="padding-bottom:120px">


                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" placeholder="Please Enter Post Name" />
                    </div>


                    <div class="form-group">
                        <label>Post Description</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label> Content</label>
                        <textarea class="form-control ckeditor" rows="3" cols="10" name="content"></textarea>
                    </div>



                    <div class="form-group">
                        <label>Post Status</label>
                        <label class="radio-inline">
                            <input name="poststatus" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="poststatus" value="0" type="radio">Invisible
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <select class="form-control" name="author">
                            @foreach( $author as $value)
                            <option value="{{ $value->id }}">{{ $value->fullname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <button type="submit" class="btn btn-default">Post Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>



                    </div>

                    <div class="col-lg-3">


                        <div id="post-category">
                            <span class="label label-info label-size-14">Categories</span> <br />
                            <div class="scrollbar" id="style-default">

                            </div>

                            <form id="form-categories">
                                <input id="namecategory" type="text" name="category" class="input-cate">
                                <select  id="parent-cate" name="parentcategory" class="select-cate">
                                <option value="NULL" selected>-- No parent --</option>
                                </select>
                                <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input onclick="addCategory();" type="button" name="add-category" value="Add Category" class="button-cate">
                            </form>

                        </div>
                        <!-- TAGS-->
                        <div id="post-tags">
                            <span class="label label-info label-size-14">Tags</span> <br />
                            <form id="form-tag">
                                <input type="text" name="tag" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="button" name="add-tag" value="Add" onclick="addTag();" ">
                            </form>

                            <a onclick="showTags()">Show Tags</a>
                            <div id="show-tag" >

                            </div>

                        </div>

                        <div id="featured-images">
                            <span class="label label-info label-size-14">Featured Images</span> <br />
                            <img id="featured-images-img" src="" alt="" /> <br />
                            <input type="hidden" name="images" id="images-id">
                            <a  data-toggle="modal" data-target="#myModal">Set Featured Images</a>

                        </div>

                    </div>
                    <!-- /.col-log 3-->
                <form>

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