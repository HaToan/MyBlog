 @extends('admin.layout.index')

 @section('content')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <form action="admin/category/edit/{{ $category->id }}" method="POST">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Category Name"  value="{{ $category->name }}"/>
                            </div>


                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" placeholder="Please Enter Category Slug Name"  value="{{ $category->slug }}"/>
                            </div>

                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea autofocus class="form-control" rows="3" name="description" >{{ $category->description }}</textarea>
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