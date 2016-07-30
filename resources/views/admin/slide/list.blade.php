 @extends('admin.layout.index')

 @section('content')
 <div class="container-fluid">
 	<div class="row">
 		<div class="col-lg-12">
 			<h1 class="page-header">Categorys
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
 					<th>slug</th>
 					<th>Delete</th>
 					<th>Edit</th>
 				</tr>
 			</thead>
 			<tbody>
 			@foreach($categorys as $row)
 				<tr class="odd gradeX" align="center">
 					<td>{{ $row->id }}</td>
 					<td>{{ $row->name }}</td>
					<td>{{ $row->slug }}</td>
 					<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/{{ $row->id }}"> Delete</a></td>
 					<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{ $row->id }}">Edit</a></td>
 				</tr>
			@endforeach
 			</tbody>
 		</table>
 	</div>
 	<!-- /.row -->
 </div>
 <!-- /.container-fluid -->
 @endsection