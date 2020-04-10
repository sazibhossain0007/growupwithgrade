@extends('layouts.dashboard')

@section('title') courses @endsection

@section('style') 
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection



@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>courses</h1>
				<a href="{{ route('course.create') }}" class="btn btn-primary">Create</a>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Blank Page</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

	<div class="card">
		<div class="card-header">
			<h3 class="card-title">DataTable with default features</h3>
		</div>
		<!-- /.card-header -->

		@include('partials.notification')

		<div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($courses as $course)
					<tr>
						<td>{{ $course->id }}</td>
						<td>{{ $course->course_title }}</td>
						
						<td>
							<a href="{{ route('course.edit', $course->id)}}" class="btn btn-primary">Edit</a>

							<form role="form" action="{{ route('course.destroy', $course->id) }}" method="post">
								@csrf
								@method('delete')
									<button onclick="return confirm('Are you sure to delete this course?')" type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
		<!-- /.card-body -->
	</div>

</section>
<!-- /.content -->
@endsection


@section('script') 

<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
		});
	});
</script>

@endsection