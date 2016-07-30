 @extends('admin.layout.index')

 @section('content')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
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

                    @if(session('messages'))
                        <div class="alert alert-success">
                            {{ session('messages') }}
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        <form action="admin/category/add" method="POST">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Category Name"  />
                            </div>


                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" placeholder="Please Enter Category Slug Name"  />
                            </div>

                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" rows="3" name="description" ></textarea>
                            </div>

                            <input type="hidden" name="_token" value="{{  csrf_token() }}">
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

@endsection