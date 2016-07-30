 @extends('admin.layout.index')

 @section('content')
 <div class="container-fluid">
 	<div class="row">
 		<div class="col-lg-12">
 			<h1 class="page-header">Users
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
 					<th>Name</th>
 					<th>Email</th>
 					<th>Avatar</th>
 					<th>Level</th>
 					<th>Delete</th>
 					<th>Edit</th>
 				</tr>
 			</thead>
 			<tbody>
 			@foreach($user as $row)
 				<tr class="odd gradeX" align="center">
 					<td>{{ $row->id }}</td>
 					<td>{{ $row->fullname }}</td>
 					<td>{{ $row->email }}</td>
					<td>
					<img src="uploads/media/{{ $row->media['name'] }}" width="120"></td>
					<td>{{ $row->level }}</td>
 					<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{ $row->id }}"> Delete</a></td>
 					<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{ $row->id }}">Edit</a></td>
 				</tr>
			@endforeach
 			</tbody>
 		</table>
 	</div>
 	<!-- /.row -->
 </div>
 <!-- /.container-fluid -->
 @endsection