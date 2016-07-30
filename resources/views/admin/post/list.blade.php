@extends('admin.layout.index')

 @section('content')
 <div class="container-fluid">
 	<div class="row">
 		<div class="col-lg-12">
 			<h1 class="page-header">Posts
 				<small>List</small>
 			</h1>
 		</div>
		@if(session('messages'))
			<div class="alert alert-success">
				{{ session('messages') }}
			</div>
		@endif



 		<!-- /.col-lg-12 -->
 		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
 			<thead>
 				<tr align="center">
 					<th>ID</th>
 					<th>Title</th>
 					<th>Images</th>
 					<th>Description</th>
 					<th>Categorys</th>
 					<th>Tags</th>
 					<th>Views</th>
 					<th>Status</th>
 					<th>Author</th>
 					<th>Delete</th>
 					<th>Edit</th>
 				</tr>
 			</thead>
 			<tbody>
 			@foreach($posts as $post)
 				<tr class="odd gradeX" align="center">
 					<td>{{ $post->id }}</td>
 					<td>{{ $post->title }}</td>
					<td>
						<img src="{{ 'uploads/media/' . $post->media['name'] }}" width="50px">
					</td>
					<td>{{ $post->description }}</td>
					<td>
					<select>
					@foreach($post->categories as $cate)
						<option value="{{ $cate->id }}"> {{   $cate->name  }} </option>
					@endforeach
					</select>
					</td>
					<td>
					<select>
					@foreach($post->tags as $tag)
						<option value="{{ $tag->id }}"> {{   $tag->name  }} </option>
					@endforeach
					</select>
					</td>
					<td>{{ $post->views }}</td>
					<td>
						@if($post->status == 1)
							 public
						@else
							private
						@endif
					</td>
					<td>{{ $post->users['fullname'] }}</td>
 					<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/post/delete/{{ $post->id }}"> Delete</a></td>
 					<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/edit/{{ $post->id }}">Edit</a></td>
 				</tr>
			@endforeach
 			</tbody>
 		</table>
 	</div>
 	<!-- /.row -->
 </div>
 <!-- /.container-fluid -->

 @endsection