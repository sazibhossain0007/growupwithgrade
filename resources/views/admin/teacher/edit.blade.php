@extends('layouts.dashboard')

@section('title') teacher Create @endsection
@section('style') 
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>teacher Update</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('teacher.index')}}">teachers</a></li>
					<li class="breadcrumb-item active">teacher Update</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

	@include('partials.notification')

	<div class="card card-primary">
		<!-- /.card-header -->

		<!-- form start -->
		<form role="form" action="{{ route('teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="card-body">
				<div class="form-group">
					<label for="name">Id: </label>
					<input type="text" value="{{ $teacher->id }}" disabled class="form-control" id="id" name="id" placeholder="Enter name">
					@error('id')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="name">Name: </label>
					<input type="text" value="{{ $teacher->name }}" class="form-control" id="name" name="name" placeholder="Enter name">
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="name">Email: </label>
					<input type="text" value="{{ $teacher->email }}" disabled class="form-control" id="email" name="email" placeholder="Enter name">
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="name">Phone: </label>
					<input type="text" value="{{ $teacher->phone }}" class="form-control" id="phone" name="phone" placeholder="Enter name">
					@error('phone')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="profile_pic">Profile Pic (160x160): </label>
					<input type="file" class="form-control @error('profile_pic') is-invalid @enderror" id="profile_pic" name="profile_pic" value="{{ old('profile_pic') }}">

					@error('profile_pic')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label>Assigned Courses</label>
					<select class="select2" multiple="multiple" name="courses[]" data-placeholder="Select Course" style="width: 100%;">
						@foreach($courses as $course)
						<option value="{{ $course->id }}" {{ $teacher->by_course_id($course->id) ? "selected" : ""}}>{{ $course->course_title }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="name">Password: </label>
					<input type="text" class="form-control" id="password" name="password" placeholder="Enter name">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>

</section>
<!-- /.content -->
@endsection


@section('script')

<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endsection