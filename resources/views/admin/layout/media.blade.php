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
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            <script type="text/javascript" src="admin_asset/js/sendfile_FormData_XHR.js"></script>
